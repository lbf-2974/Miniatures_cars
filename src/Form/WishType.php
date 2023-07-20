<?php

namespace App\Form;

use App\Entity\Wish;
use App\Entity\Manufacturer;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WishType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('brand', TextType::class, [
            'label' => "Marque : ",
            'label_attr' => ['class' => "block mt-2 font-medium hidden"],
            'attr' => [
                'class' => "bg-gray-100 border-gray-50 text-sm rounded-lg block w-full p-2.5 mt-2",
                'placeholder' => 'Renseigne la marque'],
            ])

        ->add('model', TextType::class, [
            'label' => "Modèle : ",
            'label_attr' => ['class' => "block mt-2 font-medium hidden "],
             'attr' => [
                'class' => "bg-gray-100 block border-gray-50 text-sm rounded-lg block w-full p-2.5 mt-2",
                'placeholder' => 'Renseigne le modèle'],
            ])

        ->add('manufacturer', EntityType::class, [
            'class' => Manufacturer::class,
            'label' => 'Indique le fabricant :',
            'label_attr' => ['class' => "block mt-2 font-medium hidden"],
            'choice_label' => 'name',
                 'multiple' => false,
                 'expanded' => false,
                 'attr' => [
                        'class' => 'bg-gray-100 border-gray-50 text-sm rounded-lg block w-full p-2.5 italic mt-2'
                    ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Wish::class,
        ]);
    }
}
