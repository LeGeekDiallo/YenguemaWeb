<?php

namespace App\Form;

use App\Entity\EmailToAdmin;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmailToAdminFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('userName', null, [
                'attr'=>['placeholder'=>'Entrez votre nom et prénom'],
                'required'=>true
            ])
            ->add('userEmail', EmailType::class, [
                'attr'=>['placeholder'=>'Entrez votre email'],
                'required'=>true
            ])
            ->add('subject', null, [
                'attr'=>['placeholder'=>'Entrez le sujet'],
                'required'=>true
            ])
            ->add('message', CKEditorType::class, [
                'required'=>true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => EmailToAdmin::class,
            'csrf_protection'=>false,
            'method'=>'post'
        ]);
    }

    public function getBlockPrefix(): string
    {
        return parent::getBlockPrefix();
    }
}
