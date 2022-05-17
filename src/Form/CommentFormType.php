<?php

namespace App\Form;

use App\Entity\Comment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommentFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add(
            'userNick',
            TextType::class,
            [
                'label' => 'Nick użytkownika',
                'required' => true,
                'attr' => ['max_length' => 255],
            ]
        );
        $builder->add(
            'userEmail',
            EmailType::class,
            [
                'label' => 'Email',
                'required' => true,
                'attr' => ['max_length' => 255],
            ]
        );
        $builder->add(
            'commentContent',
            TextType::class,
            [
                'label' => 'Treść',
                'required' => true,
                'attr' => ['max_length' => 1020],
            ]
        )
            ->add('submit', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Comment::class,
        ]);
    }
}
