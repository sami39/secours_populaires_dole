<?php

namespace App\Form;

use App\Entity\Adherents;
use App\Entity\Appointment;
use PhpParser\Node\Expr\List_;
use App\Form\Type\DatalistType;
use Doctrine\ORM\EntityRepository;
use Doctrine\DBAL\Query\QueryBuilder;
use Doctrine\DBAL\Types\DateTimeType;
use App\Repository\AdherentsRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType as TypeDateTimeType;

class PrecencielType extends AbstractType

{
   
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('recaprdv', CheckboxType::class, [
                
                'required' => false,
                'label'=>'Pr/Abs',

            ])
            ->add('hygiene', CheckboxType::class, [
                
                'required' => false,
                'label'=>'H',

            ])
            ->add('lessive', CheckboxType::class, [
                
                'required' => false,
                'label'=>'L',

            ])
            ->add('couche', CheckboxType::class, [
                
                'required' => false,
                'label'=>'C',

            ])
            ->add('enregistrer', ButtonType::class, [
                'attr' => [
                    'class' => 'btn btn-outline-primary',
                   
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Appointment::class,
        ]);
    }
}
