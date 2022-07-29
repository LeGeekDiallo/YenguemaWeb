<?php

namespace App\Form;

use App\Entity\NewPassword;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NewPasswordFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
                'attr'=>['placeholder'=>'Ex: example@example.com'],
                'required'=>true
            ])
            ->add('newPassword', PasswordType::class, [
                'required'=>true,
                'attr'=>['placeholder'=>'Ex: 12345']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => NewPassword::class,
        ]);
    }
}
