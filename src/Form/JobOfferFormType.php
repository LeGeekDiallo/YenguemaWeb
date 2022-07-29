<?php

namespace App\Form;

use App\Entity\JobOffer;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Image;

class JobOfferFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('compagny_name', null, [
                'required'=>true
            ])
            ->add('job_title', null, [
                'attr'=>['placeholder'=>'Ex: Secrétaire'],
                'required'=>true
            ])
            ->add('category', ChoiceType::class, [
                'required'=>true,
                'choices'=>[
                    "Agriculture, Sylviculture, Pêche" => "Agriculture, Sylviculture, Pêche",
                    "Architecture, Ingénierie" => "Architecture, Ingénierie",
                    "Métiers de l'armée" => "Métiers de l'armée",
                    "Arts, Médias, Culture" => "Arts, Médias, Culture",
                    "Métiers du droit" => "Métiers du droit",
                    "Enseignement, Formation" => "Enseignement, Formation",
                    "Finance, comptabilité" => "Finance, comptabilité",
                    "Gestion des organisations, administration" => "Gestion des organisations, administration",
                    "Industries extractives, construction" => "Industries extractives, construction",
                    "Installation, maintenance" => "Installation, maintenance",
                    "Logistique, chaîne d'approvionnement" => "Logistique, chaîne d'approvionnement",
                    "Marketing, publicité, relations publiques" => "Marketing, publicité, relations publiques",
                    "Métiers de l'informatique" => "Métiers de l'informatique",
                    "Production artisanale et industrielle" => "Production artisanale et industrielle",
                    "Propreté et de l'environnement" => "Propreté et de l'environnement",
                    "Restauration" => "Restauration",
                    "Santé" => "Santé",
                    "Science et de la recherche" => "Science et de la recherche",
                    "Sécurité, protection civile" => "Sécurité, protection civile",
                    "Services à la personne" => "Services à la personne",
                    "Services communautaire et sociaux" => "Services communautaire et sociaux",
                    "Tourisme, évènementiel" => "Tourisme, évènementiel",
                    "Vente, Commerce, service client" => "Vente, Commerce, service client"
                ]
            ])
            ->add('contract_type', ChoiceType::class, [
                'required'=>true,
                'choices'=>[
                    'Alternance'=>'Alternance',
                    'CDD'=>'CDD',
                    'CDI'=>'CDI',
                    'Freelance-Independant'=> 'Freelance-Independant',
                    'STAGE'=>'STAGE',
                    'Temps partiel'=>'Temps partiel',
                    'Temps plein'=>'Temps plein'
                ]
            ])
            ->add('employer_gender', ChoiceType::class, [
                'required'=>true,
                'choices'=>[
                    'H'=>'H',
                    'F'=>'F',
                    'H/F'=>'H/F'
                ]
            ])
            ->add('filename', FileType::class, [
                'required'=>false,
                'mapped'=>false,
                'constraints'=>[
                    new Image([
                        'maxSize'=>'2Mi',
                        'maxWidth'=>800,
                        'maxHeight'=>600,
                        'maxHeightMessage'=>'La hauteur ne doit pas depasser 800 px',
                        'maxWidthMessage'=>'La largeur ne doit pas depasser 600 px',
                    ])
                ]
            ])
            ->add('phone_number', TelType::class, [
                'required'=>true,
                'attr'=>['placeholder'=>'Ex: 664253542']
            ])
            ->add('email', EmailType::class, [
                'required'=>true,
                'attr'=>['placeholder'=>'Ex: exemple224@exemple.com'],
            ])
            ->add('salary_estimate', NumberType::class, [
                'required'=>true,
                'attr'=>['placeholder'=>'Ex: 3500000'],
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
            ->add('employer_profile', CKEditorType::class, [
                'attr'=>['rows'=>'8'],
                'required'=>true
            ])
            ->add('required_skills', CKEditorType::class, [
                'attr'=>['rows'=>'8'],
                'required'=>true
            ])
            ->add('employer_mission', CKEditorType::class, [
                'attr'=>['rows'=>'8'],
                'required'=>true
            ])
            ->add('other_details', CKEditorType::class, [
                'attr'=>['rows'=>'8'],
                'required'=>false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => JobOffer::class,
        ]);
    }
}
