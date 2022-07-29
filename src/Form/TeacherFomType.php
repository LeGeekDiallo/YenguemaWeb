<?php

namespace App\Form;

use App\Entity\Teacher;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TeacherFomType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, [
                'required'=>true,
                'attr'=>['placeholder'=>"Ex: Comprendre les maths n'a jamais été aussi facile "]
            ])
            ->add('age', NumberType::class, [
                'required'=>true,
                'attr'=>["placeholder"=>"Ex: 30"]
            ])
            ->add('profile', ChoiceType::class, [
                'choices'=>[
                    "Enseignant en exercice" => "Enseignant en exercice",
                    "Enseignant à la retraite" => "Enseignant à la retraite",
                    "Etudiant" => "Etudiant",
                ],
                'required'=>true
            ])
            ->add('years_of_experience', NumberType::class, [
                'required'=>true,
                'attr'=>["placeholder"=>"Ex: 5"]
            ])
            ->add('class_type', ChoiceType::class, [
                'choices' => [
                    'En groupe'=>'En groupe',
                    'Domicile'=>'Domicile'
                ],
                'required'=>true
            ])
            ->add('public', ChoiceType::class, [
                'choices'=>[
                    'Ecole Pro'=>'Ecole Pro',
                    'Maternelle'=>'Maternelle',
                    'Primaire'=>'Primaire',
                    'Collège'=>'Collège',
                    'Lycée'=>'Lycée',
                    'Université'=>'Université',
                ],
                'required'=>true
            ])
            ->add('course', ChoiceType::class, [
                'required'=>true,
                'choices'=>[
                    "Scolaire"=>[
                        "Chimie" => "Chimie",
                        "Français" => "Français",
                        "Maths" => "Maths",
                        "Physique" => "Physique",
                        "Informatique" => [
                            "Initiation informatique"=>"Initiation informatique",
                            "Programmation"=>"Programmation",
                            "Bureautique"=>[
                                "Word"=>"Word",
                                "Excel"=>"Excel",
                                "Powerpoint"=>"Powerpoint"
                            ]
                        ]
                    ],
                    "Musique" => [
                        "Batterie" => "Batterie",
                        "Chant" => "Chant",
                        "Danse" => "Danse",
                        "Guitare" => "Guitare",
                        "Piano" => "Piano"
                    ],
                    "Langue" => [
                        "Arabe" =>   "Arabe",
                        "Anglais" => "Anglais",
                        "Allemand" =>"Allemand",
                        "Espagnol" =>"Espagnol",
                        "Italien" => "Italien",
                        "Chinois" => "Chinois",
                        "Swahili" => "Swahili",
                        "Japonais" => "Japonais"
                    ],
                    "Arts et Loisirs" =>[
                        "Couture" => "Couture",
                        "Cuisine" => "Cuisine",
                        "Dessin" => "Dessin",
                        "Pâtisserie" => "Pâtisserie",
                        "Photographie" => "Photographie",
                        "Sculpture" => "Sculpture",
                        "Théâtre" => "Théâtre"
                    ],
                    "Sport" => [
                        "Coach sportif" => "Coach sportif",
                        "Boxe" => "Boxe",
                        "Natation" => "Natation"
                    ]
                ]
            ])
            ->add('price', NumberType::class, [
                'required'=>true,
                'attr'=>['placeholder'=>'Ex: 150000']
            ])
            ->add('billing_type', ChoiceType::class, [
                'required'=>true,
                'choices'=>[
                    'Par Heure'=>'Par Heure',
                    'Par Séance' => 'Par Seance'
                ]
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
                ],
                'required'=>true
            ])
            ->add('some_details', CKEditorType::class, [
                'attr'=>['rows'=>'8', 'placeholder'=>"Votre manière d'enseigner par exemple ou le deroulement du cours, etc..."],
                'required'=>true
            ])
            ->add('teacherDiploma', CKEditorType::class, [
                'attr'=>['rows'=>'8', 'placeholder'=>"Ex: Docteur et professeur en prépa médecine (en UE3-biophysique et UE1-chimie) 
                et à l'université de Lille vous propose des cours en physique & biophysique, chimie et maths pour étudiants et lycéens"],
                'required'=>true
            ])
            ->add('teachingMethodology', CKEditorType::class, [
                'attr'=>['rows'=>'8', 'placehonder'=>"Ex: Je suis titulaire d'un doctorat en physique-chimie et d'un Master en physique. Etant enseignante à l’université, je mets à votre disposition l’impeccable méthodologie de suivi des étudiants, que je développe régulièrement. 
                Je me concentre sur la résolution des exercices afin d'augmenter vos chances de réussite."],
                'required'=>true,
            ])
            ->add('teacherBackground', CKEditorType::class, [
                'required'=>true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Teacher::class,
        ]);
    }
}
