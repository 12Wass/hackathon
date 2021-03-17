<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Unique;

class AdminUserEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class,
                [
                    'attr' => [
                        'class' => 'form-control',
                        'placeholder' => 'Nom d\'utilisateur*'
                    ]
                ])
            ->add('plainPassword', PasswordType::class,
                [
                    'required' => false,
                    'attr' => [
                        'class' => 'form-control',
                        'placeholder' => 'Laissez vide si aucun changement'
                    ]
                ])
            ->add('roles', ChoiceType::class,
                [
                    'required' => true,
                    'choices' => [
                        'Super Administrateur' => 'ROLE_SUPER_ADMIN',
                        'Administrateur' => 'ROLE_ADMIN'
                    ],
                    'multiple' => true,
                    'placeholder' => 'Grade',
                    'attr' => [
                        'class' => 'form-control tagging'
                    ]
                ]
            )
            ->add('active', ChoiceType::class,
                [
                    'required' => true,
                    'choices' => [
                        'Oui' => true,
                        'Non' => false
                    ],
                    'attr' => [
                        'class' => 'form-control tagging'
                    ]
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
