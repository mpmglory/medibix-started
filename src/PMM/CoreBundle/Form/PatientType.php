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
            ->add('telephone', TextType::class)
            ->add('nationality', TextType::class)
            ->add('sex', ChoiceType::class, array(
                'choices' => array(
                    'M' => 'Masculin',
                    'F' => 'Féminin',
                ),
            ))
            ->add('bornDate', DateType::class, array(
                'widget' => 'choice',
                'format' => 'dd-MM-yyyy'
                )
            )
            ->add('bornPlace', TextType::class)
            ->add('ethnicGroup', TextType::class)
            ->add('residence', TextType::class)
            ->add('religion', TextType::class)
            ->add('occupation', TextType::class)
            ->add('workPlace', TextType::class)
            ->add('adress', TextType::class)
            ->add('personToContact', TextType::class)
            ->add('bloodGroup', TextType::class)
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
