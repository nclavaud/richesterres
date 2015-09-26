<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EvaluationType extends AbstractType
{
    public static $categories = array(
        'cerealier' => "Céréalier",
        'eleveur' => "Éleveur",
        'maraicher' => "Maraîcher",
    );

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('uuid')
            ->add('farmName', 'text', array(
                'label' => "Nom de l'exploitation",
            ))
            ->add('farmCategory', 'choice', array(
                'label' => "Catégorie",
                'choices' => self::$categories,
            ))
            ->add('farmPositionLatitude', 'text', array('label' => "Latitude"))
            ->add('farmPositionLongitude', 'text', array('label' => "Longitude"))
            ->add('farmWebsiteUrl', 'text', array('label' => "Site web de l'exploitation"))
            ->add('farmPhotoUrl', 'text', array('label' => "Photo de l'exploitation"))
            ->add('ratingEnvironment', 'integer', array('label' => "Note Environnement"))
            ->add('ratingHealth', 'integer', array('label' => "Note Santé"))
            ->add('ratingSocial', 'integer', array('label' => "Note Social"))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
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
