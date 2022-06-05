<?php

namespace App\Form;

use App\Entity\Appointment;
use App\Form\FormExtension\HoneyPotType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class AppointmentType extends HoneyPotType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder
            ->add(
                'firstName',
                TextType::class,
                [
                    'label' => 'First name',
                    'attr' => [
                        'placeholder' => 'First name'
                    ]
                ]

            )
            ->add(
                'lastName',
                TextType::class,
                [
                    'label' => 'Last name',
                    'attr' => [
                        'placeholder' => 'Last name'
                    ]
                ]
            )
            ->add(
                'email',
                EmailType::class,
                [
                    'label' => 'Email',
                    'attr' => [
                        'placeholder' => 'Email'
                    ]
                ]
            )
            ->add(
                'phone',
                TextType::class,
                [
                    'label' => 'Phone number',
                    'attr' => [
                        'placeholder' => 'Phone number'
                    ]
                ]
            )
            ->add(
                'disease',
                ChoiceType::class,
                [
                    'label' => "",
                    'placeholder' => "-- Select your choice --",
                    'choices' => [
                        'Cataract'  => 'Cataract',
                        'Glaucoma'  => 'Glaucoma',
                        'Laser'  => 'Laser',
                        'General ophthalmology'  => 'General ophthalmology',
                        'Other'     => 'Other'
                    ]
                ]
            )
            ->add(
                'methodContact',
                ChoiceType::class,
                [
                    'label' => "",
                    'placeholder' => "-- Select your choice --",
                    'choices' => [
                        'Email'  => 'Email',
                        'Phone'  => 'Phone'
                    ]
                ]
            )
            ->add(
                'message',
                TextareaType::class,
                [
                    'label' => 'Message',
                    'attr' => [
                        'placeholder' => 'Your message here...'
                    ]
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Appointment::class,
        ]);
    }
}
