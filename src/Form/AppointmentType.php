<?php

namespace App\Form;

use App\Entity\Adherents;
use App\Entity\Appointment;
use PhpParser\Node\Expr\List_;
use App\Form\Type\DatalistType;
use Doctrine\DBAL\Types\DateTimeType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType as TypeDateTimeType;

class AppointmentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Adherents', EntityType::class, [
                'class' => Adherents::class,
                'label' => 'NomPrenom',
                
                 
               
            ])
            ->add('date', TypeDateTimeType::class, [
                'widget' => 'single_text',
                'attr' => ['readonly' => true],
            ])
            
            
            ->add('paye',CheckboxType::class, [
                'label'    => 'Show this entry publicly?',
                'required' => false,
            ])
            ->add('paye', ChoiceType::class,[
                'choices' => array(
                    'Oui' => '1',
                    'Non' => '0'
                 ),
                
            ])
            ->add('Dette',TextType::class, [
                'attr' => array(
                    'placeholder' => 'dette')
                
            ]);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Appointment::class,
        ]);
    }
}
