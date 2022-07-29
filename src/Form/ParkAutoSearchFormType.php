<?php

namespace App\Form;

use App\Entity\ParkAutoSearch;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ParkAutoSearchFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('parkName', null, [
                'required'=>true,
                'attr'=>['placeholder'=>'Nom du park auto']
            ])
            ->add('address', null, [
                'required'=>true,
                'attr'=>['placeholder'=>'Ville, commune, quartier, nom de rue']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ParkAutoSearch::class,
            'csrf_protection'=>false,
            'method'=>'get'
        ]);
    }

    public function getBlockPrefix(): string
    {
        return "";
    }
}
