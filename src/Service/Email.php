<?php 

namespace App\Service;

use App\Entity\Appointment;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mime\Email as MimeEmail;
use Symfony\Component\Mailer\MailerInterface;
use Twig\Environment;

class Email extends AbstractController {
        /**
     * @var MailerInterface
     */
    private $mailer;

    /**
     * @var Environment
     */
    private $renderer;

    public function __construct(MailerInterface $mailer, Environment $renderer)
    {
        $this->mailer = $mailer;
        $this->renderer = $renderer;
    }

    public function sendEmail(Appointment $contact)
    {
        $message = (new MimeEmail())
            ->subject('Request of appointment - (contact form - Radwan Eye Specialist)')
            ->from('contact@colchestereyedoctor.com')
            ->to('contact@colchestereyedoctor.com')
            ->replyTo($contact->getEmail())
            ->html($this->renderer->render('email/contact.html.twig', [
                'contact' => $contact
            ]), 'text/html')
        ;  
        $this->mailer->send($message);
    }
}
