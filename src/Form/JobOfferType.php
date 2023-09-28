<?php

namespace App\Form;

use App\Entity\JobOffer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JobOfferType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titleJob')
            ->add('isVisible')
            ->add('createdAt')
            ->add('expiredAt')
            ->add('salary')
            ->add('location')
            ->add('description')
            ->add('category')
            ->add('contactMail')
            ->add('closing_date', DateType::class, [
                'widget' => 'single_text'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => JobOffer::class,
        ]);
    }
}
