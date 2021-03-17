<?php

namespace App\Form;

use App\Entity\Adherents;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class SearchaderentsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('NomPrenom', SearchType::class, [
            'label' => false,
            'attr' => [
                'class' => 'form-control',
                'placeholder' => 'Entrez un ou plusieurs mots-clés'
            ],
            'required' => false
        ])
      
        ->add('Rechercher', SubmitType::class, [
            
            'attr' => [
                'class' => 'btn btn-outline-primary',
               
            ]
        ])
    ;

        
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Adherents::class,
        ]);
    }
}
