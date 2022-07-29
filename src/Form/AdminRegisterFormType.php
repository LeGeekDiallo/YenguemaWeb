<?php

namespace App\Form;

use App\Entity\Admin;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdminRegisterFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('adminname', null, [
                'attr'=>['placeholder'=>'Votre nom et prénom']
            ])
            ->add('email', null, [
                "attr"=>['placeholder'=>"Votre email"]
            ])
            ->add('password', PasswordType::class, [
                "attr"=>["placeholder"=>"Choisissez un mot de passe"]
            ])
            ->add('confirm_password', PasswordType::class, [
                "attr"=>["placeholder"=>"Confirmez le mot de passe"]
            ])
            ->add('phoneNumber', null, [
                "attr"=>["placeholder"=>"Votre numéro de Tel"]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Admin::class,
        ]);
    }
}
