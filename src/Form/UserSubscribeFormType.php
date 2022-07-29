<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserSubscribeFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('sexe', ChoiceType::class, [
                "choices"=>[
                    'M'=>1,
                    'F'=>0
                ]
            ])
            ->add('username', null, [
                'attr'=>['placeholder'=>'Votre nom et prénom']
            ])
            ->add('email', EmailType::class, [
                "attr"=>['placeholder'=>"Votre email"]
            ])
            ->add('password', PasswordType::class, [
                "attr"=>["placeholder"=>"Choisissez un mot de passe"]
            ])
            ->add('confirm_password', PasswordType::class, [
                "attr"=>["placeholder"=>"Repetez le mot de passe"]
            ])
            ->add('phoneNumber', TelType::class, [
                "attr"=>["placeholder"=>"Votre numéro de Tel ex: 6xxxxxxxx"]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
