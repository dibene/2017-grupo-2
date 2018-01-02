<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MiembrosInferioresArterialPatologicoType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('extension')->add('velocidades')->add('indicePreEstenosisEstenosis')->add('arteriaFemoralComun')->add('arteriaFemoralSuperficial')->add('arteriaPoplitea')->add('arteriaTibialAnterior')->add('arteriaTibialPosterior')->add('arteriaPeronea')->add('arteria')->add('flujosDistales')->add('circulacionColateral')->add('indiceTobilloBrazoDerecho')->add('indiceTobilloBrazoIzquierdo');
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
