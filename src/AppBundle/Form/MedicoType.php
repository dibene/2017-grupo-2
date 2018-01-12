<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class MedicoType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
     public function buildForm(FormBuilderInterface $builder, array $options)
     {
         $builder
         ->add('nombre')
         ->add('apellido')
         ->add('dni')
         ->add('direccion')
         ->add('sexo', ChoiceType::class, array('choices'  => array('Masculino' => 'Masculino', 'Femenino' => 'Femenino', 'Otros' => 'Otros')))
         ->add('nacionalidad')
         ->add('fechaNacimiento', DateType::class , array('widget' => 'single_text','attr' => array('class'=>'datepicker')))
         ->add('localidad', ChoiceType::class, array('choices'  => array('La Plata' => 'La Plata',  'Otros' => 'Otros')))
         ->add('obraSocial')
         ->add('especialidad', EntityType::class, array(
                 'class' => 'AppBundle:Especialidad',
                 'choice_label' => 'nombre'))
         ->add('matricula');
     }


    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Medico'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_medico';
    }


}
