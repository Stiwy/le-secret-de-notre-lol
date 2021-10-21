<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class RegisterType extends AbstractType
{
    
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => 'Votre prénom', 
                'attr' => [
                    'onfocus' =>  'formLabel(document.getElementById("register_firstname_group"), document.getElementById("register_firstname_label"))',
                    'onfocusout' => 'formPlaceholder(document.getElementById("register_firstname_group"), document.getElementById("register_firstname_label"), document.getElementById("register_firstname"))',
                ],
                'constraints' => [
                    new NotBlank(),
                    new Length(null, 2, 25)
                ]
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Votre nom', 
                'attr' => [
                    'onfocus' =>  'formLabel(document.getElementById("register_lastname_group"), document.getElementById("register_lastname_label"))',
                    'onfocusout' => 'formPlaceholder(document.getElementById("register_lastname_group"), document.getElementById("register_lastname_label"), document.getElementById("register_lastname"))',
                ],
                'constraints' => [
                    new NotBlank(),
                    new Length(null, 2, 25)
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'Votre e-mail', 
                'attr' => [
                    'onfocus' =>  'formLabel(document.getElementById("register_email_group"), document.getElementById("register_email_label"))',
                    'onfocusout' => 'formPlaceholder(document.getElementById("register_email_group"), document.getElementById("register_email_label"), document.getElementById("register_email"))',
                ],
                'constraints' => [
                    new NotBlank(),
                    new Length(null, 6, 60)
                ]
            ])
            ->add('phone', TextType::class, [
                'label' => 'Votre téléphone', 
                'attr' => [
                    'onfocus' =>  'formLabel(document.getElementById("register_phone_group"), document.getElementById("register_phone_label"))',
                    'onfocusout' => 'formPlaceholder(document.getElementById("register_phone_group"), document.getElementById("register_phone_label"), document.getElementById("register_phone"))',
                ],
                'constraints' => [
                    new NotBlank(),
                    new Length(10),
                    new Regex("/^[0-9]{10}$/")
                ]
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Le mot de passe et sa confirmation doivent êtres identiques.',
                'constraints' => [
                    new NotBlank(),
                    new Length(null, 8, 60),
                    new Regex("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/")
                ],
                'first_options' => [
                    'label' => 'Votre mot de passe',
                    'attr' => [
                        'onfocus' =>  'formLabel(document.getElementById("register_password_first_group"), document.getElementById("register_password_first_label"))',
                        'onfocusout' => 'formPlaceholder(document.getElementById("register_password_first_group"), document.getElementById("register_password_first_label"), document.getElementById("register_password_first"))',
                    ]
                ],
                'second_options' => [
                    'label' => 'Confirmer votre mot de passe', 
                    'attr' => [
                        'onfocus' =>  'formLabel(document.getElementById("register_password_second_group"), document.getElementById("register_password_second_label"))',
                        'onfocusout' => 'formPlaceholder(document.getElementById("register_password_second_group"), document.getElementById("register_password_second_label"), document.getElementById("register_password_second"))',
                    ]
                ]
            ])
            ->add('address', TextType::class, [
                'label' => 'Adresse postal', 
                'attr' => [
                    'onfocus' =>  'formLabel(document.getElementById("register_address_group"), document.getElementById("register_address_label"))',
                    'onfocusout' => 'formPlaceholder(document.getElementById("register_address_group"), document.getElementById("register_address_label"), document.getElementById("register_address"))',
                ],
                'constraints' => [
                    new NotBlank(),
                    new Length(null, 5)
                ]
            ])
            ->add('city', TextType::class, [
                'label' => 'Ville', 
                'attr' => [
                    'onfocus' =>  'formLabel(document.getElementById("register_city_group"), document.getElementById("register_city_label"))',
                    'onfocusout' => 'formPlaceholder(document.getElementById("register_city_group"), document.getElementById("register_city_label"), document.getElementById("register_city"))',
                ],
                'constraints' => [
                    new NotBlank(),
                    new Length(null, 2, 80)
                ]
            ])
            ->add('zipCode', TextType::class, [
                'label' => 'Code postal', 
                'attr' => [
                    'onfocus' =>  'formLabel(document.getElementById("register_zipCode_group"), document.getElementById("register_zipCode_label"))',
                    'onfocusout' => 'formPlaceholder(document.getElementById("register_zipCode_group"), document.getElementById("register_zipCode_label"), document.getElementById("register_zipCode"))',
                ],
                'constraints' => [
                    new NotBlank(),
                    new Length(5),
                    new Regex("/^[0-9]{5}$/")
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => "S'inscrire",
                'attr' => [
                    'class' => 'btn btn-outline-custom f-right'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
