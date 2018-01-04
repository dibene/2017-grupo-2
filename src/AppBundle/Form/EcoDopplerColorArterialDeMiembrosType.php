<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class EcoDopplerColorArterialDeMiembrosType extends AbstractType
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
        ->add('arteriafemoralComun')->add('arteriaFemoralSuperficial')->add('arteriaPoplitea')->add('arteriaTibialAnterior')->add('arteriaTibialPosterior');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\EcoDopplerColorArterialDeMiembros'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_ecodopplercolorarterialdemiembros';
    }


}
