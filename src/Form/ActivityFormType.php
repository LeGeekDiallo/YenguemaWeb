<?php

namespace App\Form;

use App\Entity\Activity;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Image;

class ActivityFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('activity_name', null, [
                'attr'=>['placeholder'=>'Enseigne'],
                'required'=>true
            ])
            ->add('category', ChoiceType::class, [
                "choices"=>[
                    'Artisanat'=>'Artisanat',
                    'Blanchisseur'=>'Blanchisseur',
                    'Boulangerie'=>'Boulangerie',
                    'Boutiquier'=>'Boutiquier',
                    'Briqueterie'=>'Briqueterie',
                    'Climatisation'=>'Climatisation',
                    'Clinique'=>'Clinique',
                    'Commerçant'=>'Commerçant',
                    'Cordonniers'=>'Cordonniers',
                    'Cosmetique'=>'Cosmetique',
                    'Déménagement'=>'Déménagement',
                    'Electriciens'=>'Electriciens',
                    'Garage Auto'=>'Garage Auto',
                    'Garage Moto'=>'Garage Moto',
                    'Garage vélo'=>'Garage vélo',
                    'Maçonnerie'=>'Maçonnerie',
                    'Menuisier'=>'Menuisier',
                    'Menuisier-metal'=>'Métallurgie',
                    'Plomberie'=>'Plomberie',
                    'Salon de coiffure H/F'=>'Salon de Coiffure',
                    'Salon de coiffure F'=>'Salon de Coiffure Femme',
                    'Salon de Coiffure H'=>'Salon de Coiffure H',
                    'Restauration'=>'Restauration',
                    'Couture'=>'Couture',
                    'Reparateur'=>'Reparateur',
                ],
            ])
            ->add('address', null, [
                'attr'=>['placeholder'=>"Adresse entreprise ex: Quartier"],
                'required'=>true
            ])
            ->add('city', ChoiceType::class, [
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
            ->add('municipality', null, [
                'attr'=>['placeholder'=>"La commune"],
                'required'=>true
            ])
            ->add('email', EmailType::class, [
                'required'=>true,
                'attr'=>['placeholder'=>"Email entreprise ex: entrepise@example.com(fr)"]
            ])
            ->add('phone_number', TelType::class, [
                'attr'=>['placeholder'=>"Numéro de Téléphone ex: 6xx xx xx xx"],
                'required'=>true,
            ])
            ->add('details', CKEditorType::class, [
                'required'=>true,
                'attr'=>['rows'=>'8']
            ])
            ->add('activityImages', FileType::class, [
                'required'=>true,
                'mapped'=>false,
                'multiple'=>true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Activity::class,
        ]);
    }
}
