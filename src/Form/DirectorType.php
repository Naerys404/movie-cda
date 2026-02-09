<?php

namespace App\Form;

use App\Entity\Director;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DirectorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                'label'=>'Prénom',
                'required'=>true
            ])
            ->add('lastname', TextType::class, [
                'label'=>'Nom',
                'required'=>true
            ])
            ->add('birthDate', BirthdayType::class, [
                'label'=>'Date de naissance',
                'widget' => 'single_text',
            ])
            ->add('country', CountryType::class ,[
                 'label'=>'Pays'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Director::class,
        ]);
    }
}
