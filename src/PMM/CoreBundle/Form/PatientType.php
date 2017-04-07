<?php

namespace PMM\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class PatientType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('bornDate', DateType::class, array(
                'widget' => 'choice',
                'format' => 'dd-MM-yyyy'
                )
            )
            ->add('sex', ChoiceType::class, array(
                'choices' => array(
                    'Masculin' => 'Masculin',
                    'Féminin' => 'Féminin',
                ),
                'expanded' => true,
                'multiple' => false,
            ))
            ->add('telephone', TextType::class, array('required' => false))
            ->add('bloodGroup', ChoiceType::class, array(
                'choices' => array(
                    'A-' => 'A-',
                    'A+' => 'A+',
                    'B-' => 'B-',
                    'B+' => 'B+',
                    'AB-' => 'AB-',
                    'AB+' => 'AB+',
                    'O-' => 'O-',
                    'O+' => 'O+',
                ),
                'required' => false,
                'expanded' => false,
                'multiple' => false,
                'placeholder' => 'Choisir un groupe',
            ))
            ->add('submit', SubmitType::class, array('label' => 'Valider'));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PMM\CoreBundle\Entity\Patient'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'pmm_corebundle_patient';
    }


}
