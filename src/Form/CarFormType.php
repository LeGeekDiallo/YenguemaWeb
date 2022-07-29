<?php

namespace App\Form;

use App\Entity\Car;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Image;

class CarFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('car_brand', ChoiceType::class, [
                'required'=>true,
                'choices'=>[
                    'ALFA ROMEO'=>'ALFA ROMEO',
                    'AUDI'=>'AUDI',
                    'BMW'=>'BMW',
                    'CHEVROLET' => 'CHEVROLET',
                    'CHRYSLER' => 'CHRYSLER',
                    'CITROEN' => 'CITROEN',
                    'DACIA' => 'DACIA',
                    'DODGE' => 'DODGE',
                    'FIAT' => 'FIAT',
                    'FORD' => 'FORD',
                    'HONDA' => 'HONDA',
                    'HUMMER' => 'HUMMER',
                    'HYUNDAI' => 'HYUNDAI',
                    'INFINITY' => 'INFINITY',
                    'JAGUAR' => 'JAGUAR',
                    'JEEP'=>'JEEP',
                    'KIA'=>'KIA',
                    'LAND ROVER' => 'LAND ROVER',
                    'LEXUS' => 'LEXUS',
                    'LOTUS' => 'LOTUS',
                    'MAZDA' => 'MAZDA',
                    'MERCEDES–BENZ' => 'MERCEDES–BENZ',
                    'MITSUBISHI'=>'MITSUBISHI',
                    'MINI'=>'MINI',
                    'NISSAN' => 'MITSUBISHI',
                    'OPEL'=> 'OPEL',
                    'PEUGEOT' => 'PEUGEOT',
                    'RENAULT' => 'RENAULT',
                    'SEAT' => 'SEAT',
                    'SKODA' => 'SKODA',
                    'SMART' => 'SMART',
                    'SUZUKI' => 'SUZUKI',
                    'TOYOTA' => 'TOYOTA',
                    'VOLKSWAGEN' => 'VOLKSWAGEN',
                    'VOLVO' => 'VOLVO'
                ]
            ])
            ->add('car_model', null, [
                'attr'=>['placeholder'=>'Le modèle'],
                'required'=>true
            ])
            ->add('fuel', ChoiceType::class, [
                'required'=>true,
                'choices'=>[
                    'Diesel'=>'Diesel',
                    'Electrique'=>'Electrique',
                    'Essence'=>'Essence',
                    'Hybride'=> 'Hybride',
                ]
            ])
            ->add('mileage', null, [
                'attr'=>['placeholder'=>'Ex: 5000'],
                'required'=>true
            ])
            ->add('car_year', null, [
                'attr'=>['placeholder'=>'Ex: 2015'],
                'required'=>true
            ])
            ->add('car_country', null, [
                'attr'=>['placeholder'=>'Ex: France'],
                'required'=>true
            ])
            ->add('car_price', null, [
                'attr'=>['placeholder'=>'Ex: 35000000'],
                'required'=>true
            ])
            ->add('car_class', ChoiceType::class, [
                'required'=>true,
                'choices'=>[
                    'Véhicules légers' => [
                        'Berline' => 'Berline',
                        'Coupé' => 'Coupé',
                        'Cabriolet' => 'Cabriolet',
                        'Monospaces' => 'Monospaces',
                        'Utilitaires' => 'Utilitaires',
                        '4x4' => '4x4',
                        'SUV' => 'SUV'
                    ],
                    'Véhicules intermédiaires' =>[
                        'Utilitaires' => 'Utilitaires',
                        'Camping-cars' => 'Camping-cars',
                        'Pick-up' => 'Pick-up'
                    ],

                    'Poids lourds' => [
                        'Poids lourds à 2 essieux' => 'Poids lourds à 2 essieux',
                        'Autocars à 2 essieux' => 'Autocars à 2 essieux',
                        'Poids lourds à 3 essieux' => 'Poids lourds à 3 essieux',
                        'Bus' => 'Bus'
                    ]
                ]
            ])
            ->add('car_nb_places', NumberType::class, [
                'attr'=>['placeholder'=>'Ex: 5'],
                'required'=>true
            ])
            ->add('car_nb_doors', NumberType::class, [
                'attr'=>['placeholder'=>'Ex: 4'],
                'required'=>true
            ])
            ->add('car_color', null, [
                'attr'=>['placeholder'=>'Ex: Blanc'],
                'required'=>true
            ])
            ->add('car_state', ChoiceType::class, [
                'required'=>true,
                'choices'=>[
                    'Neuf'=>'Neuf',
                    'Très bon état'=>'Très bon état',
                    'Bon état'=>'Bon état'
                ]
            ])
            ->add('transmissionType', ChoiceType::class, [
                'choices'=>[
                    'Automatique'=>'Automatique',
                    'Manuel'=>'Manuel',
                ],
                'required'=>true
            ])
            ->add('carImages', FileType::class, [
                'mapped'=>false,
                'required'=>true,
                'multiple'=>true,
            ])
            ->add('carAdvantages', ChoiceType::class, [
                'required'=>true,
                'choices'=>[
                    'Jantes Alu'=>'Jantes Alu',
                    'Caméra de recul' => 'Caméra de recul',
                    'Ouverture sans clé' => 'Ouverture sans clé',
                    'Régulateur de vitesse' => 'Régulateur de vitesse',
                    'Vérrouillage électrique des portes' => 'Vérrouillage électrique des portes',
                    'Aide au stationnement arrière' => 'Aide au stationnement arrière',
                    'Banquette arrière rabattable' => 'Banquette arrière rabattable',
                    'Climatisation automatique' => 'Climatisation automatique',
                    'Limiteur de vitesse' => 'Limiteur de vitesse',
                    'Démarrage sans clé' => 'Démarrage sans clé',
                    'Volant multifonction en cuir' => 'Volant multifonction en cuir',
                    'Vitres électriques avant, arrière' => 'Vitres électriques avant, arrière',
                    'Accoudoir central' => 'Accoudoir central',
                    'Bluetooth' => 'Bluetooth',
                    'Ordinateur de bord' => 'Ordinateur de bord',
                    'Prise jack' => 'Prise jack',
                    'Commandes vocales' => 'Commandes vocales',
                    'Feux de jour' => 'Feux de jour',
                    'Feux anti-brouillard' => 'Feux anti-brouillard',
                    'Vitres surteintées' => 'Vitres surteintées',
                    'Phares automatiques' => 'Phares automatiques',
                    'Essuies-glaces automatiques' => 'Essuies-glaces automatiques',
                    'Airbag conducteur' => 'Airbag conducteur',
                    'Airbag passager avant' => 'Airbag passager avant',
                    'Airbag latéraux' => 'Airbag latéraux',
                    'Direction assistée' => 'Direction assistée',
                    'Volant réglable' => 'Volant réglable',
                    'Ecran tactile' => 'Ecran tactile',
                    'Système audio-divertissement' => 'Système audio-divertissement'
                ],
                'mapped'=>false,
                'multiple'=>true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Car::class,
        ]);
    }
}
