<?php

namespace App\Form;

use App\Entity\ExamSubject;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class ExamSubjectFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('course_name', null, [
                'attr'=>['placeholder'=>'Ex: Chimie'],
                'required'=>true
            ])
            ->add('the_mention', null, [
                'attr'=>['placeholder'=>'Ex: Collège, option(lycée), option(université)'],
                'required'=>true
            ])
            ->add('level', null, [
                'attr'=>['placeholder'=>'Ex: Terminale, L1, Licence 3'],
                'required'=>true
            ])
            ->add('exam_year', null, [
                'attr'=>['placeholder'=>'2012'],
                'required'=>true,
            ])
            ->add('description', TextareaType::class, [
                'required'=>false,
                'attr'=>['placeholder'=>'1er semestre composition DECEMBRE']
            ])
            ->add('filename', FileType::class, [
                'required'=>true,
                'constraints'=>new File([
                    'maxSize'=>'2M',
                    'maxSizeMessage'=>'Le fichier est trop volimineux. Max autorisé 2M',
                    'mimeTypes'=>['application/pdf', 'application/x-pdf'],
                    'mimeTypesMessage'=>'Type pdf autorisé'
                ])
            ])
            ->add('school_name', null, [
                'attr'=>['placeholder'=>'Ex: Nom collège, lycée, fac, université'],
                'required'=>true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ExamSubject::class,
        ]);
    }
}
