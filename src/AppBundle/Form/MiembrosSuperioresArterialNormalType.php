<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

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
          ->add('resultado', TextareaType::class , array(
          'attr' => array('style'=> 'height:150px'),
          'data' => '
          Se visualizaron sucesivamente las arterias subclavia proximal y distal, axilar, humeral, proximal
          y a nivel del pliegue del codo, cubital y radial derecha e izquierda.
          Arteria subclavia derecha : presenta ateroma Hipoecoico/hiperecoico de bordes
          regulares/irregulares con extension aproximada de .....mm que genera velocidad pico
          sistolica de ....... cm/seg. indice pre-estenosis de ......, correspondiendo a estenosis del .....
          % .
          Los flujos distales evaluados a nivel de arterias................... son de caracteristicas...............
            '))
          ->add('conclusion', TextareaType::class , array(
          'attr' => array('style'=> 'height:50px'),
          'data' => '
          Se observó evidencia de obstrucciones significativas en arteria ………………………...
          '))
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
