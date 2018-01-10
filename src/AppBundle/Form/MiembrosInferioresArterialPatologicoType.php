<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class MiembrosInferioresArterialPatologicoType extends AbstractType
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
        'attr' => array('style'=> 'height:50px'),
        'data' => '
        Se exploraron en ambos miembros inferiores las arterias Femoral Común, Femoral superficial,
        Femoral Profunda, Poplítea y Tibiales anterior, peronea y posterior.
          '))
        ->add('conclusion', TextareaType::class , array(
        'attr' => array('style'=> 'height:100px'),
        'data' => '
        Arteria ............. derecha/izquierda con ateroma que genera estenosis del ......%.
        Flujos distales .............................
        Circulacion colateral......................
        ITB (indice tobillo brazo) derecho de .....
        ITB (indice tobillo brazo) izquierdo de .....
        '))


        ->add('arteriaFemoralComunIzq')
        ->add('arteriaFemoralSuperficialIzq')
        ->add('arteriaPopliteaIzq')
        ->add('arteriaTibialAnteriorIzq')
        ->add('arteriaTibialPosteriorIzq')
        ->add('arteriaPeroneaIzq')
        ->add('arteriaFemoralComunDer')
        ->add('arteriaFemoralSuperficialDer', TextareaType::class , array(
        'attr' => array('style'=> 'height:100px'),
        'data' => '
        Ateromas de distribución difusa, predominantemente calcicos,
        presenta a nivel distal placa ateromatosa de densidad heterogenea /homogenea de bordes
        regulares/irregulares, protuyente/plana con extension de ........................mm presenta
        velocidades de ....... cm/seg.
        -Indice pre estenosis-estenosis ...., correspondiendo a estenosis del .......%.
        '))
        ->add('arteriaPopliteaDer')
        ->add('arteriaTibialAnteriorDer')
        ->add('arteriaTibialPosteriorDer')
        ->add('arteriaPeroneaDer')

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
            'data_class' => 'AppBundle\Entity\MiembrosInferioresArterialPatologico'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_miembrosinferioresarterialpatologico';
    }


}
