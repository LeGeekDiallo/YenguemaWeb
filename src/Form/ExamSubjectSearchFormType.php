<?php

namespace App\Form;

use App\Entity\ExamSubjectSearch;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExamSubjectSearchFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('course_name', null, [
                'attr'=>['placeholder'=>'Ex: Maths ou 2012 ou nom école, lycée, collège, university']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ExamSubjectSearch::class,
            'csrf_protection'=>false,
            'method'=>'get'
        ]);
    }
    public function getBlockPrefix(): string
    {
        return "";
    }
}
