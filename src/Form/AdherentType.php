<?php

namespace App\Form;

use App\Entity\Adherents;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class AdherentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
              ->add('NomPrenom', TextType::class,[
                 
                'attr' => array(
                    'placeholder' => 'nom prenom adherent')
                ]
                )
            
            ->add('NomPrenom', TextType::class,[
                 
                'attr' => array(
                    'placeholder' => 'nom prenom adherent')
                ]
                )
            ->add('Dossier', NumberType::class,[
                 
                'attr' => array(
                    'placeholder' => 'numero dossier adherent')
                ])

            ->add('FrequenceMensuelle', ChoiceType::class, [
                'choices' => [
                    '1' => '1',
                    '2' => '2',
                    'exceptionnel' => 'exceptionnel',
                    
                    
                     
                ],
                ])

            ->add('NbPassage', NumberType::class,[
                 
                'attr' => array(
                    'placeholder' => 'nombre de passage')
                ])
            ->add('Inscription',DateType::class,[
                'label' => 'Date premier inscription',
                'view_timezone' => 'Europe/Paris',
                  'widget' => 'choice',
                  'format' => 'dd-MM-yyyy',
                    

            ])
            ->add('Adulte', NumberType::class,[
                 
                'attr' => array(
                    'placeholder' => 'nombre adulte')
                ])
            ->add('Enfant', NumberType::class,[
                 
                'attr' => array(
                    'placeholder' => 'nombre enfant')
                ])
            ->add('Colis', ChoiceType::class, [
                'choices' => [
                    'colis 1' => '1',
                    'colis 2' => '2',
                    'colis 3' => '3',
                    'colis 4' =>  '4',
                    
                     
                ],
             
            ])
            ->add('Telephone', TextType::class,[
                 
                'attr' => array(
                    'placeholder' => 'numero de telephone')
                ])
            ->add('paye')
            ->add('hygiene')
            ->add('Lessive')
            ->add('Couches')
            ->add('Observation', TextareaType::class,[
                 
                'attr' => array(
                    'placeholder' => 'observation concernant adherent')
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
