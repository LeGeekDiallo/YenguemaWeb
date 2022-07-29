<?php

namespace App\Form;

use App\Entity\EBook;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class EBookFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, [
                'required'=>true,
                'attr'=>['placeholder'=>'Ex: Programmer en JAVA']
            ])
            ->add('category', ChoiceType::class, [
                'choices'=>[
                    "Scolaire"=>"Scolaire",
                    "Sciences"=>"Sciences",
                    "Histoire"=>"Histoire",
                    "Informatique"=>"Informatique",
                    "Droit"=>"Droit",
                    "Littérature"=>"Littérature",
                ],
                'required'=>true
            ])
            ->add('filename', FileType::class, [
                'required'=>true,
                'mapped'=>false,
                'constraints'=>new File([
                    "mimeTypes"=> [
                        'application/pdf',
                        'application/x-pdf',
                    ],
                    'mimeTypesMessage'=>'Type non autorisé, type pdf seulement',
                    'maxSize'=>'3024k',
                    'maxSizeMessage'=>'Fichier assez volumineux'
                ])
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => EBook::class,
        ]);
    }


}
