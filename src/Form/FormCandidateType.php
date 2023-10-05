<?php

namespace App\Form;

use App\Entity\Candidate;
use App\Entity\Category;
use App\Entity\Gendre;
use App\Entity\Experience;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
// use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormCandidateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('gendre', EntityType::class, [
                'class' => Gendre::class,
                'choice_label' => 'gendre',
            ])

            ->add('FirstName', TextType::class, [
                'label' => 'First name',
            ])
            ->add('LastName', TextType::class, [
                'label' => 'Last name',
            ])
            ->add('Adress', TextType::class, [
                'label' => 'Adresse',
                'required' => false, // Champ rendu facultatif
            ])
            ->add('Country', TextType::class, [
                'label' => 'Country',
            ])
            ->add('Nationality', TextType::class, [
                'label' => 'Nationality',
                'required' => false, // Champ rendu facultatif
            ])


             ->add('passportFile', FileType::class, [
                'mapped' => false,
                'label' => 'Passport file',
                'attr' => [
                    'size' => 20000000,
                    'accept' => '.pdf,.jpg,.doc,.docx,.png,.gif',
                ],
               'required' => false
            ])

             ->add('curriculumVitae', FileType::class, [
                 'mapped' => false,
                 'label' => 'C.V',
                'attr' => [
                   'size' => 20000000,
                    'accept' => '.pdf,.jpg,.doc,.docx,.png,.gif',
               ],
               'required' => false
            ])

             ->add('ProfilPicture', FileType::class, [
              'mapped' => false,
               'attr' => [
                   'size' => 20000000,
                   'accept' => '.pdf,.jpg,.doc,.docx,.png,.gif',
               ],
               'required' => false
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
                'required' => false,
                'input' => 'datetime_immutable'
            ])

            ->add('PlaceOfBirth', TextType::class, [
                'label' => 'Place of birth',
                'required' => false, // Champ rendu facultatif
            ])
            // ->add('Availability', CheckboxType::class, [
            //     'label' => 'availability',
            // ])
            ->add('experience', EntityType::class, [
                'class' => Experience::class,
                'choice_label' => 'experience',
            ])

            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'category',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Candidate::class,
        ]);
    }
}
