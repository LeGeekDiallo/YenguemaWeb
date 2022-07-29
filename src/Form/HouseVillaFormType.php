<?php

namespace App\Form;

use App\Entity\HouseVilla;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HouseVillaFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('propertyType', ChoiceType::class, [
                'required'=>true,
                'choices'=>[
                    'Maison'=>'Maison',
                    'Villa'=>'Villa'
                ]
            ])
            ->add('property_surface', NumberType::class, [
                'required'=>true,
                'attr'=>['placeholder'=>'Ex: 50']
            ])
            ->add('room_number', NumberType::class, [
                'required'=>true,
                'attr'=>['placeholder'=>'Ex: 5']
            ])
            ->add('bathroom_number', NumberType::class, [
                'required'=>true,
                'attr'=>['placeholder'=>'Ex: 3']
            ])
            ->add('wc_number', NumberType::class, [
                'required'=>true,
                'attr'=>['placeholder'=>'Ex: 2']
            ])
            ->add('furniture', ChoiceType::class, [
                'required'=>true,
                'choices'=>[
                    'Oui'=>true,
                    'Non'=>false
                ]
            ])
            ->add('courtyard', ChoiceType::class, [
                'required'=>true,
                'choices'=>[
                    'Oui'=>true,
                    'Non'=>false
                ]
            ])
            ->add('fenced', ChoiceType::class, [
                'required'=>true,
                'choices'=>[
                    'Oui'=>true,
                    'Non'=>false
                ]
            ])
            ->add('build_year', NumberType::class, [
                'required'=>true,
                'attr'=>['placeholder'=>'Ex: 2010']
            ])
            ->add('floor_number', NumberType::class, [
                'required'=>true,
                'attr'=>['placeholder'=>'Ex: 2']
            ])
            ->add('propositionType', ChoiceType::class, [
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
            ->add('district', null, [
                'required'=>true,
                'attr'=>['placeholder'=>'Ex: Nongo']
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
            ->add('equipements', CKEditorType::class, [
                'required'=>false
            ])
            ->add('ad_title', null, [
                'required'=>true,
                'attr'=>['placeholder'=>'Ex: Une belle maison à louer']
            ])
            ->add('houseVillaImages', FileType::class, [
                'required'=>true,
                'mapped'=>false,
                'multiple'=>true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => HouseVilla::class,
        ]);
    }
}
