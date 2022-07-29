<?php

namespace App\Form;

use App\Entity\JobOfferSearch;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JobOfferSearchFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('job_title', null, [
                'attr'=>['placeholder'=>'Ex: Assistant'],
                'required'=>true
            ])
            ->add('address', null, [
                'attr'=>['placeholder'=>'Ex: Conakry, Kaloum'],
                'required'=>true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => JobOfferSearch::class,
            'csrf_protection'=>false,
            'method'=>'get'
        ]);
    }

    public function getBlockPrefix(): string
    {
        return "";
    }
}
