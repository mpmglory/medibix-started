<?php

namespace PMM\LaboBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class BerType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('value', TextType::class, array('required' => false))
            ->add('bulletin', EntityType::class, array(
                'class' => 'PMMLaboBundle:Examen',
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => false,
            ))
            ->add('examen', EntityType::class, array(
                'class' => 'PMMLaboBundle:Examen',
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => false,
            ))
            ->add('resultat', EntityType::class, array(
                'class' => 'PMMLaboBundle:Examen',
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => false,
            ))
            ->add('submit', SubmitType::class, array('label' => 'Valider'));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PMM\LaboBundle\Entity\Ber'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'pmm_labobundle_ber';
    }


}
