<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class CardioResonanciaType extends AbstractType
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
        ->add('protocolo')
        ->add('descripcionVI')
        ->add('dtdvi')
        ->add('dtsvi')
        ->add('vfd')
        ->add('vfs')
        ->add('fac')
        ->add('fevi')
        ->add('septum')
        ->add('pp')
        ->add('masaVI')
        ->add('areaAI')
        ->add('volumenAI')
        ->add('cuatroCamarasAI')
        ->add('tapseLateral')
        ->add('vfdVD')
        ->add('vfsVD')
        ->add('fevd')
        ->add('longitudinal')
        ->add('anilloTricuspideo')
        ->add('transversalSubtricuspideo')
        ->add('transversalMedio')
        ->add('tsvd')
        ->add('areaAD')
        ->add('volumenAD')
        ->add('cuatroCamarasAD')
        ->add('secuencias')
        ->add('grupoDiagnostico', EntityType::class, array(
          'class' => 'AppBundle:GrupoDiagnostico',
          'choice_label' => 'nombre',
          'multiple' => true)
          )
        ->add('internacion', ChoiceType::class, array(
        'choices'  => array('Abulatorio' => 'Abulatorio', 'Internado' => 'Internado')));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\CardioResonancia'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_cardioresonancia';
    }


}
