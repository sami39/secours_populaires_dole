<?php

namespace App\Form;

use App\Entity\Adherents;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdherentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('NomPrenom')
            ->add('Dossier')
            ->add('FrequenceMensuelle')
            ->add('NbPassage')
            ->add('Inscription')
            ->add('Adulte')
            ->add('Enfant')
            ->add('Colis')
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
