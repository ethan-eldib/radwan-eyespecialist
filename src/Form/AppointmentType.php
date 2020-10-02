<?php

namespace App\Form;

use App\Entity\Appointment;
use App\Form\ApplicationType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class AppointmentType extends ApplicationType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'firstName',
                TextType::class,
                $this->getConfiguration('First name', "Your fisrt name")
            )
            ->add(
                'lastName',
                TextType::class,
                $this->getConfiguration('Last name', "Your last name")
            )
            ->add(
                'email',
                EmailType::class,
                $this->getConfiguration('Email', "Your email")
            )
            ->add(
                'phone',
                TextType::class,
                $this->getConfiguration('Phone', "Your phone number")
            )
            ->add(
                'disease',
                ChoiceType::class,[
                    'label' => "",
                    'placeholder' => "-- Reason for appointment --",
                    'choices' => [
                        'Cataract'  => 'Cataract',
                        'Glaucoma'  => 'Glaucoma',
                        'Other'     => 'Other'
                    ]
            ])
            ->add(
                'message',
                TextareaType::class,
                $this->getConfiguration('Your message', "Your message here")
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Appointment::class,
        ]);
    }
}
