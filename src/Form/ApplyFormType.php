<?php

namespace App\Form;

use App\Entity\JobApply;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class ApplyFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('filename', FileType::class, [
                'mapped'=>false,
                'required'=>true,
                'constraints'=>[
                    new File(
                        [
                            'mimeTypes'=>'application/pdf',
                            'mimeTypesMessage'=>'Type du fichier invalide'
                        ]
                    )
                ]
            ])
            ->add('application_letter', CKEditorType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => JobApply::class,
        ]);
    }
}
