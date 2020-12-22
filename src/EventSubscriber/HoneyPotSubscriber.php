<?php

namespace App\EventSubscriber;

use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\Exception\HttpException;

class HoneyPotSubscriber implements EventSubscriberInterface
{
    private $honeyPotLogger;

    private $requestStack;

    public function __construct(LoggerInterface $honeyPotLogger, RequestStack $requestStack)
    {
        $this->honeyPotLogger = $honeyPotLogger;
        $this->requestStack = $requestStack;
    }

    public static function getSubscribedEvents()
    {
        return [
            FormEvents::PRE_SUBMIT => 'checkHoneyJar'
        ];
    }

    public function checkHoneyJar(FormEvent $event): void
    {
        $request = $this->requestStack->getCurrentRequest();

        if (!$request) {
            return;
        }

        $data = $event->getData();

        if (!array_key_exists('landLinePhone', $data) || !array_key_exists('company', $data)) {
            throw new HttpException(400, "You are trying to modify the form, thank you for not touching it!");
        }

        [
            'landLinePhone' => $landLinePhone,
            'company' => $company
        ] = $data;

        if ($landLinePhone !== "" || $company !== "") {
            $this->honeyPotLogger->info(
                "A potential spam bot attempt with the following IP address: '{$request->getClientIp()}' has taken place. The field landLinePhone contained '{$landLinePhone}' and the flied company contained '{$company}'."
            );
            throw new HttpException(403, "Bad robot, go away !!");
        }
    }
}
