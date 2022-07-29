<?php

namespace App\Form;

use App\Entity\RideSearch;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RideSearchFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('departure', null, [
                'required'=>true,
                'attr'=>['placeholder'=>'Ex: Conakry']
            ])
            ->add('destination', null, [
                'required'=>true,
                'attr'=>['placeholder'=>'Ex: Labé']
            ])
            ->add('date_depart', DateType::class, [
                'widget'=>'single_text',
                'required'=>true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RideSearch::class,
            'csrf_protection'=>false,
            'method'=>'get'
        ]);
    }

    public function getBlockPrefix(): string
    {
        return "";
    }
}
