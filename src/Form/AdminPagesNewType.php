<?php

namespace App\Form;

use App\Entity\Pages;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use FOS\CKEditorBundle\Form\Type\CKEditorType;

class AdminPagesNewType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Nom'
                ]
            ])
            ->add('route', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Route'
                ]
            ])
            ->add('title', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Titre'
                ]
            ])
            ->add('content', CKEditorType::class, array(
                'config' => array(
                    'uiColor' => '#ffffff'
                )
            ))
            ->add('type', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Type'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Pages::class,
        ]);
    }
}