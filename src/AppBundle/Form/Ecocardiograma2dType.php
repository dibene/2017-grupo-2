<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Ecocardiograma2dType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('situs')->add('conexionAuriculoventricular')->add('conexionVentriculoArterial')->add('ddvi')->add('dsvi')->add('siv')->add('pp')->add('fey')->add('alArea')->add('alVol')->add('aorta')->add('apVao')->add('tsvi')->add('velMaxAo')->add('gradMaxAo')->add('gradMedAo')->add('insuficiencia')->add('thp')->add('adt')->add('aa')->add('velOndaE')->add('velOndaA')->add('gradMedioaTrasmitral')->add('insuficienciaTrasmitral')->add('ore')->add('volRegurgitante')->add('dpdt')->add('velMaxPulmonar')->add('gradMaxPulomonar')->add('insuficiencia_pulmonar')->add('tpoPico')->add('qpqs')->add('insuficienciaTricuspide')->add('velRegurgitante')->add('gradPico')->add('pap')->add('pad')->add('ondaSeptal')->add('ondaLateral')->add('ondaE')->add('ondaA')->add('relacionE')->add('ondaVd')->add('ventriculoIzqL1C1')->add('ventriculoIzqL1C2')->add('ventriculoIzqL2C1')->add('ventriculoIzqL2C2')->add('ventriculoIzqL3C1')->add('ventriculoIzqL3C2')->add('ventriculoIzqL1Imvi')->add('ventriculoIzqL1Epr')->add('ventriculoIzqL4C1')->add('raizAortaL1C1')->add('raizAortaL1C2')->add('raizAortaL1C3')->add('aortaL1C1')->add('aortaL1C2')->add('aortaL2C1')->add('aortaL2C2')->add('aortaL3C1')->add('aortaL3C2')->add('valvulaMitralL1C1')->add('valvulaMitralL1C2')->add('valvulaMitralL2C1')->add('valvulaMitralL2C2')->add('valvulaMitralL2C3')->add('auriculaIzqL1C1')->add('auriculaIzqL1C2')->add('auriculaIzqL1C3')->add('valvulaPulmonarL1C1')->add('valvulaPulmonarL1C2')->add('valvulaPulmonarL2C1')->add('valvulaPulmonarL2C2')->add('valvulaPulmonarL2C3')->add('valvulatricuspideL1C1')->add('valvulatricuspideL1C2')->add('valvulatricuspideL2C1')->add('valvulatricuspideL2C2')->add('valvulatricuspideL2C3')->add('cavidadDerechaL1C1')->add('cavidadDerechaL1C2')->add('cavidadDerechaL1C3')->add('venaCavaInferiorL1C1')->add('pericardioL1C1')->add('pericardioL1C2')->add('pericardioL1C3')->add('conclusionLibre')->add('conclusionL1C1')->add('conclusionL1C2');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Ecocardiograma2d'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_ecocardiograma2d';
    }


}
