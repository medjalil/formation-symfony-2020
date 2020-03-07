<?php

namespace App\Form;

use App\Entity\Post;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PostType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('title')
                ->add('content', CKEditorType::class)
                ->add('created_at', DateType::class, array('required' => true, 'widget' => 'single_text', 'format' => 'dd/MM/yyyy', 'html5' => false,
                    'attr' => ['class' => 'datepicker', 'autocomplete' => 'off']
                ))
                ->add('image')
                ->add('category')
        ;
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }

}
