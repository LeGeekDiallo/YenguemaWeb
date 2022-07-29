<?php

namespace App\Form;

use App\Entity\ParkAuto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Image;

class ParkAutoFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('park_name', null, [
                'required'=>true,
            ])
            ->add('city', ChoiceType::class, [
                'required'=>true,
                'choices'=>[
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
            ->add('services', ChoiceType::class, [
                'required'=>false,
                'choices'=>[
                    'Vente'=>'Vente',
                    'Location de véhicules'=>'Location de véhicules',
                    'Vente de pièces detachées'=>'Vente de pièces detachées',
                    'Révision de véhicule'=>'Révision de véhicules',
                    'Vente de pneu'=>"Vente de pneu",
                    'Aucun'=>'Aucun'
                ],
                'mapped'=>false,
                'multiple'=>true,
            ])
            ->add('address', null, [
                'required'=>true,
                'attr'=>['placeholder'=>'Ex: Kipé']
            ])
            ->add('phone_number', TelType::class, [
                'required'=>true,
                'attr'=>['placeholder'=>'Ex: 664253210']
            ])
            ->add('email', EmailType::class, [
                'required'=>false,
                'attr'=>['placeholder'=>'Ex: exemple224@exemple.com']
            ])
            ->add('filename', FileType::class, [
                'required'=>false,
                'mapped'=>false,
                'constraints'=>[
                    new Image([
                        'maxHeight'=>500,
                        'maxWidth'=>500,
                        'maxSize'=>'3M'
                    ])
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ParkAuto::class,
        ]);
    }
}
