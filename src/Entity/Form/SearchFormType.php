<?php

namespace App\Entity\Form;

use App\Entity\Category;
use App\Entity\Province;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // TO-DO: Include POST variable search from AJAX call in Google Maps here

        $builder
            ->add('recipe', TextType::class)
            ->add('category', ChoiceType::class, array(
                'choices'  =>  array('categories' => new Category()),
                'choice_label' => 'Category',
            ))
            ->add('province', ChoiceType::class, array(
                'choices'  =>   array('provinces' => new Province()),
                'choice_label' => 'Province',
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SearchFormType::class,
        ]);
    }
}