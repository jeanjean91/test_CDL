<?php

namespace App\Form;

use app\Entity\Book;
use App\Entity\SearchBook;
/*use Doctrine\DBAL\Types\TextType;*/
use phpDocumentor\Reflection\Types\Array_;
use phpDocumentor\Reflection\Types\String_;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\HttpFoundation\Request;

class SearchBookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('livre')
            
             ->add('date')

           
            ->add('user',ChoiceType::class, [
                'required'   => false,
                'label' => 'Auteur',
                'attr'=> [

                    ' placeHolder' => 'Auteur'
                ],
                'choices' => [
                    'J.k Rowling' => '1',
                    'Uderzo' => '2',
                    'Masashi Kishimoto'   => '3',
                    'Guillaume Musso'   => '4',
                ]
            ])
            
            ->add('categorie',ChoiceType::class, [
                'required'   => false,
                'label' => 'Categorie',
                'attr'=> [

                    ' placeHolder' => 'Categorie'
                ],
                'choices' => [
                    'Bd' => '2',
                    'roman' => '1',
                    'manga'   => '3',
                    
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
    public function getBlockPrefix()
    {
        return '';
    }
   

}