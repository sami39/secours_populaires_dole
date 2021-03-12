<?php

namespace App\Form;

use App\Entity\Adherents;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
 
 

class AdherentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('NomPrenom')
            ->add('Dossier')
            ->add('FrequenceMensuelle', ChoiceType::class, [
                'choices' => [
                    '1' => '1',
                    '2' => '2',
                    'exceptionnel' => 'exceptionnel',
                    
                    
                     
                ],
                ])

            ->add('NbPassage')
            ->add('Inscription',DateType::class,[
                'label' => 'Date premier inscription',
                  'widget' => 'choice',
                    

            ])
            ->add('Adulte')
            ->add('Enfant')
            ->add('Colis', ChoiceType::class, [
                'choices' => [
                    'colis 1' => '1',
                    'colis 2' => '2',
                    'colis 3' => '3',
                    'colis 4' =>  '4',
                    
                     
                ],
             
            ])
            ->add('Telephone')
            ->add('paye')
            ->add('hygiene')
            ->add('Lessive')
            ->add('Couches')
            ->add('Observation')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Adherents::class,
        ]);
    }
}
