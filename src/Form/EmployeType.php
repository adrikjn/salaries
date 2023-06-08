<?php

namespace App\Form;

use App\Entity\Employes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class EmployeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('prenom', TextType::class, [
                'attr' => [
                    'placeholder' => "Entrez le prénom"
                ]
            ])
            ->add('nom', TextType::class, [
                'attr' => [
                    'placeholder' => "Entrez le nom"
                ]
            ])
            ->add('telephone', TelType::class, [
                'attr' => [
                    'placeholder' => "Entrez le numéro de téléphone"
                ]
            ])
            ->add('email', EmailType::class, [
                'attr' => [
                    'placeholder' => "Entrez le email"
                ]
            ])
            ->add('adresse', TextType::class, [
                'attr' => [
                    'placeholder' => "Entrez l'adresse"
                ]
            ])
            ->add('poste', ChoiceType::class, [
                'choices' => [
                    'informatique' => 'informatique',
                    'secretariat' => 'secretariat',
                    'cadre' => 'cadre'
                ]
            ])
            ->add('salaire', NumberType::class, [
                'attr' => [
                    'placeholder' => "Entrez le salaire"
                ]
            ])
            ->add('datedenaissance', DateType::class, [
                'widget' => 'single_text',
                'label' => "Date de naissance"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Employes::class,
        ]);
    }
}
