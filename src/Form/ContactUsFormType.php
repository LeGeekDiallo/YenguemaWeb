<?php

namespace App\Form;

use App\Entity\ContactUs;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactUsFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', null, [
                'attr'=>['placeholder'=>'Entrez votre nom et prénom'],
                'required'=>true
            ])
            ->add('useremail', EmailType::class, [
                'attr'=>['placeholder'=>'Entrez votre email'],
                'required'=>true
            ])
            ->add('userprofession', null, [
                'attr'=>['placeholder'=>'Entrez votre profession'],
                'required'=>true
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ContactUs::class,
        ]);
    }
}
