<?php

namespace App\Form;

use App\Entity\TeacherSearch;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TeacherSearchFomType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('course_name', null, [
                'required'=>true,
                'attr'=>['placeholder'=>'Nom du cours']
            ])
            ->add('city', null, [
                'required'=>true,
                'attr'=>['placeholder'=>'La ville']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TeacherSearch::class,
            'csrf_protection'=>false,
            'method'=>'get'
        ]);
    }

    public function getBlockPrefix(): string
    {
        return "";
    }
}
