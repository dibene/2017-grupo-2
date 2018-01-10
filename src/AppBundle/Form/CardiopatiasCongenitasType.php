<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class CardiopatiasCongenitasType extends AbstractType
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

        ->add('situs', ChoiceType::class, array(
        'choices' => array(
          'SOLITUS' => 'SOLITUS',
          'INVERSUS' => 'INVERSUS',
          'AMBIGUO' => 'AMBIGUO')))

        ->add('conexionAuriculoventricular', ChoiceType::class, array(
        'choices' => array(
          'CONCORDANTE' => 'CONCORDANTE',
          'DISCORDANTE' => 'DISCORDANTE')))

        ->add('conexionVentriculoArterial', ChoiceType::class, array(
        'choices' => array(
          'CONCORDANTE' => 'CONCORDANTE',
          'DISCORDANTE' => 'DISCORDANTE')))

        ->add('ddvi')->add('dsvi')->add('siv')->add('pp')->add('fey')->add('alArea')->add('alVol')->add('aorta')->add('apVao')->add('tsvi')
        ->add('velMaxAo')->add('gradMaxAo')->add('gradMedAo')->add('insuficiencia')->add('thp')->add('adt')->add('aa')->add('velOndaE')->add('velOndaA')->add('gradMedioaTrasmitral')->add('insuficienciaTrasmitral')->add('ore')->add('volRegurgitante')->add('dpdt')->add('velMaxPulmonar')->add('gradMaxPulomonar')->add('insuficiencia_pulmonar')->add('tpoPico')->add('qpqs')->add('insuficienciaTricuspide')->add('velRegurgitante')->add('gradPico')->add('pap')->add('pad')
        ->add('ondaSeptal')->add('ondaLateral')->add('ondaE')->add('ondaA')->add('relacionE')->add('ondaVd')

        ->add('grupoDiagnostico', EntityType::class, array(
          'class' => 'AppBundle:GrupoDiagnostico',
          'choice_label' => 'nombre',
          'multiple' => true)
          )

        ->add('internacion', ChoiceType::class, array(
        'choices'  => array('Abulatorio' => 'Abulatorio', 'Internado' => 'Internado')));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\CardiopatiasCongenitas'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_cardiopatiascongenitas';
    }


}
