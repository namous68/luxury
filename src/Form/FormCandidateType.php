<?php

namespace App\Form;

use App\Entity\Candidate;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormCandidateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('gendre', ChoiceType::class, [
                'choices' => [
                    'Femme' => 'Femme',
                    'Homme' => 'Homme',
                ],
                'placeholder' => 'Sélectionnez une option',
            ])
            ->add('FirstName', TextType::class, [
                'label' => 'First name',
            ])
            ->add('LastName', TextType::class, [
                'label' => 'Last name',
            ])
            ->add('Adress', TextType::class, [
                'label' => 'Adresse',
            ])
            ->add('Country', TextType::class, [
                'label' => 'Country',
            ])
            ->add('Nationality', TextType::class, [
                'label' => 'Nationality',
            ])
            ->add('passport')
            ->add('passportFile', FileType::class, [
                'label' => 'Passport file',
                'mapped' => false,
            ])
            ->add('CurriculumVitae', FileType::class, [
                'label' => 'C.V',
                'mapped' => false,
            ])
            ->add('ProfilPicture', FileType::class, [
                'label' => 'Profile picture',
                'mapped' => false,
                
            ])
            ->add('CurrentLocation', TextType::class, [
                'label' => 'Current location',
            ])
            ->add('dateOfBirth', DateType::class, [
                'label' => 'Date of birth',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'datepicker',
                ],
            ])
            ->add('PlaceOfBirth', TextType::class, [
                'label' => 'Place of birth',
            ])
            ->add('EmailAdress', TextType::class, [
                'label' => 'Email adress',
            ])
            ->add('password', TextType::class, [
                'label' => 'Password',
            ])
            ->add('Availability', CheckboxType::class, [
                'label' => 'availability',
            ])
            ->add('experience', ChoiceType::class, [
                'choices' => [
                    '0-1 an' => 'Moins d\'un an',
                    '2+ ans' => '2+ ans',
                    'Plus de 5 ans' => 'Plus de 5 ans',
                ],
                'placeholder' => 'Sélectionnez une option',
                'required' => true,
            ])
            ->add('category', ChoiceType::class, [
                'choices' => [
                    'commerce' => 'commerce',
                    'aeroportuaire' => 'aeroportuaire',
                    'industrie' => 'industrie'
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Candidate::class,
        ]);
    }

    

}
