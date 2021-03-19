<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\Category;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class AdminArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('category', EntityType::class, array(
                'invalid_message' => 'La catégorie n\'a pas été trouvée',
                'class' => Category::class,
                'multiple' => false,
                'choice_label' => 'name',
                'attr' => ['class' => 'form-control mb-3']
            ))
            ->add('title', TextType::class, array('attr' => array('class' => 'form-control mb-3', 'placeholder' => 'Titre de l\'article')))
            ->add('author', TextType::class, array('attr' => array('class' => 'form-control mb-3', 'placeholder' => 'Auteur de l\'article')))
            ->add('online', ChoiceType::class, array(
                'choices' => [
                    'En ligne' => 1,
                    'Hors ligne' => 0,
                ],
                'attr' => ['class' => 'form-control mb-3']
            ))
            ->add('couvertureFile', VichImageType::class, [
                'required' => false,
                'allow_delete' => false,
                'asset_helper' => true,
                'attr' => [
                    'class' => 'd-block'
                ]
            ])
            ->add('miniatureFile', VichImageType::class, [
                'required' => false,
                'allow_delete' => false,
                'asset_helper' => true,
                'attr' => [
                    'class' => 'd-block'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
            'csrf_protection' => false
        ]);
    }
}
