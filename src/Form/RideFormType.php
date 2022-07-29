<?php

namespace App\Form;

use App\Entity\Ride;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RideFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('departure', null, [
                'required'=>true,
                'attr'=>['placeholder'=>'Où']
            ])
            ->add('destination', null, [
                'required'=>true,
                'attr'=>['placeholder'=>'Où']
            ])
            ->add('departure_time', TimeType::class, [
                'required'=>true,
                'input'=>'datetime',
                'widget'=>'single_text'
            ])
            ->add('arriving_time', TimeType::class, [
                'required'=>true,
                'input'=>'datetime',
                'widget'=>'single_text'
            ])
            ->add('departure_date', DateType::class, [
                'required'=>true,
                'html5'=>true,
                'widget'=>'single_text'
            ])
            ->add('arriving_at', DateType::class, [
                'required'=>true,
                'widget'=>'single_text'
            ])
            ->add('car_brand', null, [
                'required'=>true,
                'attr'=>['placeholder'=>'Ex: Renault']
            ])
            ->add('place_number', NumberType::class, [
                'required'=>true,
                'attr'=>['placeholder'=>'Ex: 5']
            ])
            ->add('other_details', CKEditorType::class, [
                'required'=>false,
                'attr'=>['rows'=>'8']
            ])
            ->add('rideType', ChoiceType::class, [
                'required'=>true,
                'choices'=>[
                    'COVOITURAGE'=>'Covoiturage',
                    'TAXI DE LIGNE'=>'Taxi de ligne',
                ]
            ])
            ->add('ridePrice', NumberType::class, [
                'required'=>true,
                'attr'=>[
                    'placeholder'=>'Ex: 150000'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ride::class,
        ]);
    }
}
