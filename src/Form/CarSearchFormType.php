<?php

namespace App\Form;

use App\Entity\CarSearch;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarSearchFormType extends AbstractType
{
    private CarSearch $carSearch;
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('model', ChoiceType::class, [
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
            ->add('price', NumberType::class, [
                'required'=>true,
                'attr'=>['placeholder'=>'Prix approximatif']
            ])
            ->add('year', ChoiceType::class, [
                'required'=>true,
                'choices'=> [
                    'Année'=>($this->carSearch=new CarSearch())->generate_year_list(2000, 21)
                ]
            ])
            ->add('mileage', NumberType::class, [
                'required'=>true,
                'attr'=>['placeholder'=>'Kilometrage']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CarSearch::class,
            'csrf_protection'=>false,
            'method'=>'get'
        ]);
    }

    public function getBlockPrefix(): string
    {
        return parent::getBlockPrefix();
    }
}
