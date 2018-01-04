<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class EcoEstresType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('motivoSolicitud', EntityType::class, array(
          'class' => 'AppBundle:MotivoSolicitud',
          'choice_label' => 'nombre'))
        ->add('resultado')
        ->add('conclusion')
        ->add('informe1Normal')->add('informe2Normal')->add('informeRespuestaIsquemica1')->add('informe3InfartoSinIsquemia');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\EcoEstres'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_ecoestres';
    }


}
