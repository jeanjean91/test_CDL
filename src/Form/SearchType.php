<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
           ->add('categorie',ChoiceType::class, [
                'required'   => false,
                'label' => 'Categorie',
                'attr'=> [

                    ' placeHolder' => 'Categorie'
                ],
                'choices' => [
                    'Bd' => 'BD',
                    'roman' => 'romnan',
                    'manga'   => 'manga',
                    
                ]
                ])
        ;
    }

     public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SearchBook::class,
            'method' => 'get',
            'csrf_protection' => false
        ]);
    }
}
