<?php

namespace App\Form;

use App\Entity\TaxiDriverSearch;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TaxiDriverSearchFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('location', null, [
                'required'=>true,
                'attr'=>['placeholder'=>'Ville, Commune, Quartier']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TaxiDriverSearch::class,
            'csrf_protection'=>false,
            'method'=>'Get'
        ]);
    }

    public function getBlockPrefix(): string
    {
        return "";
    }
}
