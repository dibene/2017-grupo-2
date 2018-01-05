<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class VenosoNormalType extends AbstractType
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
            ->add('conclusion');
        $builder->add('venaSafenaInternaIzq')->add('diametroVSIIzq')->add('venaSafenaExternaIzq')->add('diametroVSEIzq')->add('venaSafenaInternaDer')->add('diametroVSIDer')->add('venaSafenaExternaDer')->add('diametroVSEDer');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\VenosoNormal'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_venosonormal';
    }


}
