<?php

namespace App\Form;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmailType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('number',TextType::class,[
                'label' => false,
                'mapped' => false,
                'attr' => [
                    'class' => 'form-control',
                    ]
            ])
            ->add('name',TextType::class,[
                'label' => false,
                'mapped' => false,
                'attr' => [
                    'class' => 'form-control',
                ]
            ])
            ->add('id',TextType::class,[
                'label' => false,
                'mapped' => false,
                'attr' => [
                    'class' => 'form-control',
                ]
            ])
            ->add('legal',CheckboxType::class,[
                'mapped' => false,
                'attr' => [
                    'class' => 'form-checkbox',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
