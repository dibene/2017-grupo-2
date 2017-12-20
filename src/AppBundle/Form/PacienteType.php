<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class PacienteType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nombre')
                ->add('apellido')
                ->add('dni')
                ->add('direccion')
                ->add('sexo')
                ->add('nacionalidad')
                ->add('fechaNacimiento', DateType::class , array('widget' => 'single_text','attr' => array('class'=>'datepicker')))
                ->add('localidad')
                ->add('obraSocial')
                ->add('fechaIngreso', DateType::class , array('widget' => 'single_text','attr' => array('class'=>'datepicker')))
                ->add('internacion');
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Paciente'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_paciente';
    }


}
