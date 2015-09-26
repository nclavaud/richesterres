<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EvaluationFilter extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('category', 'choice', array(
                'choices' => array_merge(array(null => 'Toutes'), EvaluationType::$categories),
                'label' => "Catégorie",
                'required' => false,
            ))
            ->add('minRatingEnvironment', 'integer', array(
                'label' => "Environnement",
            ))
            ->add('minRatingHealth', 'integer', array(
                'label' => "Santé",
            ))
            ->add('minRatingSocial', 'integer', array(
                'label' => "Social",
            ))
            ->add('filter', 'submit', array(
                'label' => 'Filtrer',
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'csrf_token' => false,
            'data_class' => null,
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'f';
    }
}
