<?php

namespace App\Form;

use App\Entity\Gendre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GendreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('male')
        ->add('female')
        ->add('Gendre', EntityType::class, [
            'class' => Gendre::class, 
            'multiple' => false, // Si vous voulez permettre la sélection de plusieurs catégories
            'expanded' => false, // Si vous voulez afficher les catégories sous forme de cases à cocher
            'required' => false, // Si le champ est facultatif
            'label' => 'Gendre', // Libellé du champ
            
        ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Gendre::class,
        ]);
    }

    
}   
