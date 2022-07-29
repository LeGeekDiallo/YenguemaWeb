<?php

namespace App\Form;

use App\Entity\EBookSearch;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EBookSearchFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ebook_name', null, [
                'attr'=>['placeholder'=>'Recherchez un livre']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => EBookSearch::class,
            'csrf_protection'=>false,
            'method'=>'get'
        ]);
    }

    public function getBlockPrefix(): string
    {
        return "";
    }
}
