<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EvaluationType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('uuid')
            ->add('farmName')
            ->add('farmCategory', 'choice', array(
                'label' => "Catégorie",
                'choices' => array(
                    "Brasseur" => 'brasseur',
                ),
            ))
            ->add('farmPositionLatitude')
            ->add('farmPositionLongitude')
            ->add('farmPhotoUrl')
            ->add('ratingEnvironment')
            ->add('ratingHealth')
            ->add('ratingSocial')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Evaluation'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_evaluation';
    }
}
