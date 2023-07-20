<?php

namespace App\Form;

use App\Entity\Car;
use App\Entity\Manufacturer;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('brand', TextType::class, [
                'label' => "Marque : ",
                'label_attr' => ['class' => "block mt-2 font-medium"],
                'attr' => ['class' => "bg-gray-100 border-gray-50 text-sm rounded-lg block w-full p-2.5"],
                ])

            ->add('model', TextType::class, [
                'label' => "Modèle : ",
                'label_attr' => ['class' => "block mt-2 font-medium"],
                 'attr' => ['class' => "bg-gray-100 border-gray-50 text-sm rounded-lg block w-full p-2.5"],
                ])

             ->add('image', TextType::class, [
                'label' => "Photo : ",
                'label_attr' => ['class' => "block mt-2 font-medium"],
                 'attr' => ['class' => "bg-gray-100 border-gray-50 text-sm rounded-lg block w-full p-2.5"],
                ])

            ->add('manufacturer', EntityType::class, [
                'class' => Manufacturer::class,
                'label' => 'Fabricant:',
                'label_attr' => ['class' => "block mt-2 font-medium"],
                'choice_label' => 'name',
                     'multiple' => false,
                     'expanded' => false,
                     'attr' => [
                        'class' => 'bg-gray-100 border-gray-50 text-sm rounded-lg block w-full p-2.5 italic'
                    ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Car::class,
        ]);
    }
}
