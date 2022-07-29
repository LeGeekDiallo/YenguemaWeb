<?php

namespace App\Form;

use App\Entity\Ads;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Image;

class AdsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('adTitle', null, [
                'attr'=>['placeholder'=>"Le titre de l'annonce"],
                'required'=>true
            ])
            ->add('adPrice', null, [
                'attr'=>['placeholder'=>'Le prix estimé ex: 50000'],
                'required'=>true
            ])
            ->add('adState', ChoiceType::class, [
                'choices'=>[
                    "Neuf"=>"Neuf",
                    "Très bon état"=>"Très bon état",
                    "Bon état"=>"Bon état",
                    "Occasion"=>"Occasion",
                    "Longtemps servit"=>"Longtemps servit"
                ],
                'required'=>true
            ])
            ->add('adCategory', ChoiceType::class, [
                'choices'=>[
                    'accessoires'=>'accessoires',
                    'chaussures'=>'chaussures',
                    'cosmétique'=>'cosmétique',
                    'document-livres-brochures'=> 'document-livres-brochures',
                    'electronique'=>'electronique',
                    'electroménager'=>'electroménager',
                    'interieur-maison'=>'interieur-maison',
                    'motos'=>'motos',
                    'loisir'=> 'loisir',
                    'multimédia'=>'multimédia',
                    'vélos'=>'vélos',
                    'vêtements'=>'vêtements',
                    'véhicules'=>'véhicules',
                ],
            ])
            ->add('adType', ChoiceType::class, [
                'choices'=>[
                    'Accessoires'=>[
                        'Bijoux'=>'Bijoux',
                        'Casquettes-chapeaux'=>'Casquettes-chapeaux',
                        'Ceintures'=>'Ceintures',
                        'Chaussettes'=> 'Chaussettes',
                        'Cravates'=>'Cravates',
                        'Echarpes'=>'Echarpes',
                        'Gants'=>'Gants',
                        'Lunettes de soleil'=>'Lunettes de soleil',
                        'Masques en tissu'=>'Masques en tissu',
                        'Montres'=>'Montres',
                        'Portefeuilles'=>'Portefeuilles',
                        'Sacs'=>'Sacs'
                    ],
                    'Chaussures'=>[
                        'Basket'=>'Basket',
                        'Bottes'=>'Bottes',
                        'Chaussettes'=>'Chaussettes',
                        'Chaussons'=>'Chaussons',
                        'Chaussures'=>'Chaussures',
                        'Mocassins'=>'Mocassins',
                        'Sandales'=>'Sandales',
                        'Tongs'=>'Tongs'
                    ],
                    'Cosmétique'=>[
                        'Accessoires d’entretien'=>'Accessoires d’entretien',
                        'Ciseaux'=>'Ciseaux',
                        'Chaises de salon avec accessoires'=>'Chaises de salon avec accessoires',
                        'Chariot'=>'Chariot',
                        'Lumière annulaire',
                        'Matériel électronique de coiffure'=>'Matériel électronique de coiffure',
                        'Maquillage'=>'Maquillage',
                        'Rasage et soin pour barbe'=>'Rasage et soin pour barbe',
                        'Séchoir à hotte'=>'Séchoir à hotte',
                        'Soin de la peau'=>'Soin de la peau',
                        'Soin des cheveux'=>'Soin des cheveux',
                        'Soin du corps'=>'Soin du corps',
                        'Station de shampoing'=>'Station de shampoing',
                        'Station de coiffure'=>'Station de coiffure'
                    ],
                    'Document-livres-brochures'=>[
                        'Brochures'=>'Brochures',
                        'Documents'=>'Documents',
                        'Livre'=>'Livre',
                        'Livre pdf'=>'Livre pdf'
                    ],
                    'Electronique'=>[
                        'Appareil photo'=>'Appareil photo',
                        'Ampli'=>'Ampli',
                        'Caméra'=>'Caméra',
                        'Chargeur'=>'Chargeur',
                        'Clavier'=>'Clavier',
                        'Ordinateur Bureau'=>'Ordinateur Bureau',
                        'PC'=>'PC',
                        'Radio'=>'Radio',
                        'Smartphone'=>'Smartphone',
                        'Souri'=>'Souri',
                        'Tablette'=>'Tablette'
                    ],
                    'Electroménager'=>[
                        'La Cuisson'=>[
                            'Barbecue'=>'Barbecue',
                            'Bouilloire'=>'Bouilloire',
                            'Centrifugeuse pour fruits et légumes'=>'Centrifugeuse pour fruits et légumes',
                            'Cuiseur de riz (auto-cuiseur de riz)'=>'Cuiseur de riz (auto-cuiseur de riz)',
                            'Cuit vapeur'=>'Cuit vapeur',
                            'Fouet électrique'=>'Fouet électrique',
                            'Grille-pain'=>'Grille-pain',
                            'Machine à pain'=> 'Machine à pain',
                            'Mixeur' => 'Mixeur',
                            'Multicuiseur' => 'Multicuiseur',
                            'Pierrade' => 'Pierrade',
                            'Presse-agrumes' => 'Presse-agrumes',
                            'Robot de cuisine ou multifonctions'=> 'Robot de cuisine ou multifonctions',
                            'Service à raclette' => 'Service à raclette',
                            'Wok' => 'Wok',
                            'Pèse-personne'=> 'Pèse-personne',
                            'Brosse à dents et Hydropulseur' => 'Brosse à dents et Hydropulseur',
                            'Épilateur' => 'Épilateur',
                            'Rasoir' => 'Rasoir',
                            'Sèche-cheveux' => 'Sèche-cheveux',
                        ],
                        'Hygiène et soin du corps'=> [
                            'Pèse-personne'=> 'Pèse-personne',
                            'Brosse à dents et Hydropulseur' => 'Brosse à dents et Hydropulseur',
                            'Épilateur' => 'Épilateur',
                            'Rasoir' => 'Rasoir',
                            'Sèche-cheveux' => 'Sèche-cheveux'],
                        'Préparation du café'=>[
                            'Cafetière'=>'Cafetière',
                            'Expresso'=> 'Expresso',
                            'Moulin à café' => 'Moulin à café'],
                        'Entretien des sols'=>[
                            'Aspirateur'=>'Aspirateur',
                            'Cireuse'=>'Cireuse',
                            'Nettoyeur à vapeur' => 'Nettoyeur à vapeur',
                            'Tondeuse robot' => 'Tondeuse robot'],
                        'Repassage'=> [
                            'Centrale vapeur' => 'Centrale vapeur',
                            'Fer à repasser' => 'Fer à repasser',
                            'Presse à repasser' => 'Presse à repasser',
                            'Rouleau à repasser' => 'Rouleau à repasser',
                            'Table à repasser' => 'Table à repasser',
                            'Cuisinière' => 'Cuisinière',
                            'Four micro-ondes' => 'Four micro-ondes',
                            'Four traditionnel' => 'Four traditionnel',
                            'Four à vapeur' => 'Four à vapeur',
                            'Cuisinière à gaz' => 'Cuisinière à gaz',
                            'Hotte aspirante' => 'Hotte aspirante'
                        ],
                        'Plaque de cuisson' => [
                            'Électrique classique'=>'Électrique classique',
                            'Vitrocéramique'=>'Vitrocéramique',
                            'À induction'=>'À induction'
                        ],
                        'Le lavage' => [
                            'Lave-linge'=>'Lave-linge',
                            'Lave-vaisselle'=>'Lave-vaisselle',
                            'Sèche-linge'=>'Sèche-linge'
                        ],
                        'Le froid' => [
                            'Cave à vin'=>'Cave à vin',
                            'Congélateur'=>'Congélateur',
                            'Réfrigérateur'=>'Réfrigérateur',
                            'Climatiseur mobile et monobloc'=>'Climatiseur mobile et monobloc'
                        ]
                    ],
                    'Interieur-maison'=>[
                        "Meuble"=>'Meuble',
                        "Deco-Table"=>"Deco-table",
                        "Décoration"=>"Décoration",
                        "Linge de maison"=>"Linge de maison",
                        "Bricolage"=>"Bricolage"
                    ],
                    'Motos' =>[
                        'Utilitaires' => 'Utilitaires',
                        'Sportives' => 'Sportives',
                        'Customs' => 'Customs',
                        'Grand Tourisme' =>'Grand Tourisme',
                        'Enduros' => 'Enduros',
                        'Trial' => 'Trial',
                        'Roadsters'=> 'Roadsters',
                        'Trails' => 'Trails',
                        'Routières' => 'Routières',
                        'Néo-Rétro' => 'Néo-Rétro',
                        'Cross'=>'Cross',
                        'Dérivés de la moto'=>'Dérivés de la moto',
                        'Supermotard'=>'Supermotard'
                    ],
                    'Loisir-multimedia'=>[
                        "DVD-Films"=>'DVD-Films',
                        "CD-Musique"=>'CD-Musique',
                        "Sport"=>'Sport',
                        "Instruments de Musique"=>"Instruments de Musique",
                        "CD Jeux vidéos"=>"CD Jeux vidéos",
                        "Jouet"=>"Jouet"
                    ],
                    'Vélos'=>[
                        'VTC'=>'VTC',
                        'Sport Urban'=> 'Sport Urban',
                        'Vélo pliant'=>'Vélo pliant',
                        'VAE'=>'VAE',
                        'Vélo-cargo'=>'Vélo-cargo',
                        'VTT'=>'VTT',
                        'Vélo ville'=>'Vélo ville',
                        'Vélo trekking'=>'Vélo trekking',
                        'Vélo fitness'=>'Vélo fitness',
                        'Vélo fixies'=>'Vélo fixies'
                    ],
                    'Vêtements'=>[
                        'Blousons-vestes'=>'Blousons-vestes',
                        'Chaussettes'=>'Chaussettes',
                        'Chemises'=>'Cheminse',
                        'Costumes'=>'Costumes',
                        'Debardeurs'=>'Debardeurs',
                        'Designer'=>'Designer',
                        'Ensembles'=>'Ensembles',
                        'Hoodies et sweat-shirts'=>'Hoodies et sweat-shirts',
                        'Jeans-pantalons'=>'Jeans-pantalons',
                        'Joggers'=>'Joggers',
                        'Polos'=>'Polos',
                        'Robes-Jupes'=>'Robes-Jupes',
                        'Shorts-Bermudas'=>'Shorts-Bermudas',
                        'Sous-vêtements'=>'Sous-vêtements',
                        'Sweat'=>'Sweat',
                    ],
                    'Véhicules'=>[
                        "4x4"=>"4x4",
                        "Camion"=>"Camion",
                        "Remorque"=>"Remorque",
                        "Car"=>"Car",
                        "Chariot"=>"Chariot",
                        "Fourgonnette"=>"Fourgonnette",
                        "Pick up"=>"Pick up",
                        "Voiture"=>"Voiture",
                        "Tracteur"=>"Tracteur",
                    ]
                ],
                'required'=>true
            ])
            ->add('brand', ChoiceType::class, [
                'choices'=>[
                    'Motos'=>[
                        "Boxer"=>"Boxer",
                        "KTM"=>"KTM",
                        "Meilun"=>"Meilun",
                        "Honda" => "Honda",
                        "Safary"=>"Safary",
                        "TVS"=>"TVS",
                    ],
                    'Véhicules'=>[
                        'ALFA ROMEO'=>'ALFA ROMEO',
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
                        'JAGUAR' => 'JAGUAR',
                        'JEEP'=>'JEEP',
                        'LAND ROVER' => 'LAND ROVER',
                        'LEXUS' => 'LEXUS',
                        'LOTUS' => 'LOTUS',
                        'MAZDA' => 'MAZDA',
                        'MERCEDES–BENZ' => 'MERCEDES–BENZ',
                        'MITSUBISHI'=>'MITSUBISHI',
                        'NISSAN' => 'MITSUBISHI',
                        'OPEL'=> 'OPEL',
                        'PEUGEOT' => 'PEUGEOT',
                        'RENAULT' => 'RENAULT',
                        'SKODA' => 'SKODA',
                        'SUZUKI' => 'SUZUKI',
                        'TOYOTA' => 'TOYOTA',
                        'VOLKSWAGEN' => 'VOLKSWAGEN'
                    ],
                    'Vélos'=>[
                        "Vélos"=>"Vélos"
                    ]
                ]
                    ,
                'required'=>false
            ])
            ->add('model', null, [
                'attr'=>['placeholder'=>'Le modèle'],
                'required'=>false
            ])
            ->add('vehicleType', ChoiceType::class, [
                'choices'=>[
                    'Diesel'=>'Diesel',
                    'Electrique'=>'Electrique',
                    'Essence'=>'Essence',
                    'Hybride'=> 'Hybride',
                ],
                'required'=>false
            ])
            ->add('transmissionType', ChoiceType::class, [
                'choices'=>[
                    'Automatique'=>'Automatique',
                    'Manuel'=>'Manuel',
                ],
                'required'=>false
            ])
            ->add('mileage', null, [
                'attr'=>['placeholder'=>'Le kilometrage'],
                'required'=>false
            ])
            ->add('year', null, [
                'attr'=>['placeholder'=>'Année du véhicule'],
                'required'=>false
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
                ],
                'required'=>true
            ])
            ->add('municipality', null, [
                'attr'=>['placeholder'=>'Votre commune'],
                'required'=>true
            ])
            ->add('address', null, [
                'attr'=>['placeholder'=>'Votre quartier ou adresse complète'],
                'required'=>true
            ])
            ->add('email', EmailType::class, [
                'attr'=>['placeholder'=>'Email'],
                'required'=>false
            ])
            ->add('phoneNumber', TelType::class, [
                'required'=>true,
            ])
            ->add('adPhotos', FileType::class, [
                'mapped'=>false,
                'required'=>true,
                'multiple'=>true,
            ])
            ->add('details', CKEditorType::class, [
                'required'=>true,
                'attr'=>['rows'=>'8']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ads::class,
        ]);
    }
}
