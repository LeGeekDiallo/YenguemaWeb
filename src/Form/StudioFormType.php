<?php

namespace App\Form;

use App\Entity\Studio;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StudioFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('property_type', ChoiceType::class, [
                'required'=>true,
                'choices'=>[
                    'Studio'=>'Studio',
                    'T1'=>'T1',
                    'T2'=>'T2',
                    'T3'=>'T3',
                ]
            ])
            ->add('property_surface', NumberType::class, [
                'required'=>true,
                'attr'=>['placeholder'=>'Ex: 50']
            ])
            ->add('piece_number', NumberType::class, [
                'required'=>true,
                'attr'=>['placeholder'=>'Ex: 2']
            ])
            ->add('bathroom', NumberType::class, [
                'required'=>true,
                'attr'=>['placeholder'=>'Ex: 1']
            ])
            ->add('flatsharing', ChoiceType::class, [
                'required'=>true,
                'choices'=>[
                    'Oui'=>true,
                    'Non'=>false
                ]
            ])
            ->add('furniture', ChoiceType::class, [
                'required'=>true,
                'choices'=>[
                    'Oui'=>true,
                    'Non'=>false
                ]
            ])
            ->add('proposition_type', ChoiceType::class, [
                'required'=>true,
                'choices'=>[
                    'A vendre'=> 'A vendre',
                    'A louer'=> 'A louer'
                ]
            ])
            ->add('price', NumberType::class, [
                'required'=>true,
                'attr'=>['placeholder'=>'Ex: 550000']
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
            ->add('more_infos_address', CKEditorType::class, [
                'required'=>true
            ])
            ->add('other_infos', CKEditorType::class, [
                'required'=>false
            ])
            ->add('phone_number', TelType::class, [
                'required'=>true,
                'attr'=>['placeholder'=>'Ex: 664521232']
            ])
            ->add('email', EmailType::class, [
                'required'=>false,
                'attr'=>['placeholder'=>'Ex: example@gmail.com']
            ])
            ->add('ad_title', null, [
                'required'=>true,
                'attr'=>['placeholder'=>'Ex: Une belle maison à louer']
            ])
            ->add('district', null, [
                'required'=>true,
                'attr'=>['placeholder'=>'Ex: Kipé']
            ])
            ->add('equipements', CKEditorType::class, [
                'required'=>false
            ])
            ->add('studioImages', FileType::class, [
                'required'=>true,
                'mapped'=>false,
                'multiple'=>true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Studio::class,
        ]);
    }
}
