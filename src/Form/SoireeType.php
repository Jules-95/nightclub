<?php

namespace App\Form;

use App\Entity\Soiree;
use App\Entity\Artiste;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SoireeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('datesoiree', null, [
                'widget' => 'single_text',
            ])
            ->add('statut')
            ->add('artistes', EntityType::class, [
                'class' => Artiste::class,
                'choice_label' => 'nom',
                'multiple' => true,
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Soiree::class,
        ]);
    }
}
