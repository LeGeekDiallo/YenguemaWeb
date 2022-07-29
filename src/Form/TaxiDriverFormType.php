<?php

namespace App\Form;

use App\Entity\TaxiDriver;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TaxiDriverFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('driver_full_name', null, [
                'required'=>false,
                'attr'=>['placeholder'=>'Nom et prénom si différent de celui de votre profil']
            ])
            ->add('registration_number', null, [
                'required'=>true,
                'attr'=>['placeholder'=>'Ex: RG-2451-AD']
            ])
            ->add('phone_number', TelType::class, [
                'required'=>false,
                'attr'=>['placeholder'=>'Numéro de téléphone si différent de celui de votre profil']
            ])
            ->add('taxi_type', ChoiceType::class, [
                'required'=>true,
                'choices'=>[
                    'Taxi classique'=>'Taxi classique',
                    'Taxi moto'=>'Taxi moto'
                ]
            ])
            ->add('city', ChoiceType::class, [
                'required'=>true,
                'choices' => [
                    "Conakry"=>"Conakry",
                    "Boké"=>"Boké",
                    "Faranah"=>"Faranah",
                    "Guékedou"=>"Guékedou",
                    "KanKan"=>"KanKan",
                    "Kindia"=>"Kindia",
                    "Labé"=>"Labé",
                    "Mamou"=>"Mamou",
                    "N'Zérékoré"=>"N'Zérékoré",
                ]
            ])
            ->add('municipality', ChoiceType::class, [
                'required'=>true,
                'choices'=>[
                    "Beyla"=>"Beyla",
                    "Bofa" => "Bofa",
                    "Dalaba" => "Dalaba",
                    "Dabola"=>"Dabola",
                    "Dinguiraye" => "Dinguiraye",
                    "Dixin"=>"Dixin",
                    "Forécariah"=>"Forécariah",
                    "Gaoual" => "Gaoual",
                    "Guéckédou" => "Guéckédou",
                    "Kaloum" => "Kaloum",
                    "Kéouané" => "Kéouané",
                    "Koubia" => "Koubia",
                    "Koundara" => "Koundara",
                    "Kouroussa" => "Kouroussa",
                    "Kissidougou" => "Kissidougou",
                    "Lola" => "Lola",
                    "Macenta" => "Macenta",
                    "Mali" => "Mali",
                    "Mandiana" => "Mandiana",
                    "Matam" => "Matam",
                    "Matoto" => "Matoto",
                    "Pita" => "Pita",
                    "Ratoma" => "Ratoma",
                    "Siguiri" => "Siguiri",
                    "Télimélé" => "Télimélé",
                    "Tougué" => "Tougué",
                    "Youmou" => "Youmou"
                ]
            ])
            ->add('district', null, [
                'required'=>true,
                'attr'=>['placeholder'=>'Ex: Nongo']
            ])
            ->add('taxi_brand', null, [
                'required'=>true,
                'attr'=>['placeholder'=>'Ex: Nissan']
            ])
            ->add('taxi_model', null, [
                'required'=>true,
                'attr'=>['placeholder'=>'Ex: Almera']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TaxiDriver::class,
        ]);
    }
}
