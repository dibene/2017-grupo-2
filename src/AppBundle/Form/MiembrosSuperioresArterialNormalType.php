<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class MiembrosSuperioresArterialNormalType extends AbstractType
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
        ->add('extension')->add('velocidadPicoSistolica')->add('indiceDePreEstenosis')->add('flujosDistales')->add('estenosis')->add('caracteristicas')->add('arteria')
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
            'data_class' => 'AppBundle\Entity\MiembrosSuperioresArterialNormal'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_miembrossuperioresarterialnormal';
    }


}
