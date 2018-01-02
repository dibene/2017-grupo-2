<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class Ecocardiograma2dType extends AbstractType
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
        ->add('ventriculoIzqL1', ChoiceType::class, array(
        'choices' => array(
          'de dimensiones y espesores parietales normales' => 'de dimensiones y espesores parietales normales',
          'dimensiones normales y EPR aumentado  (remodelado concéntrico)' => 'dimensiones normales y EPR aumentado  (remodelado concéntrico)',
          'hipertrofia concéntrica moderada' => 'hipertrofia concéntrica moderada',
          'hipertrofia concéntrica severa' => 'hipertrofia concéntrica severa',
          'dilatado e hipertrófico (hipertrofia excéntrica)' => 'AMBIdilatado e hipertrófico (hipertrofia excéntrica)GUO',
          'levemente dilatado' => 'levemente dilatado',
          'severamente dilatado, remodelado' => 'severamente dilatado, remodelado'),
        'multiple' => true,
        'attr' => array('class' => 'ventriculoIzqL1C1'),
        ))
        ->add('ventriculoIzqL2', ChoiceType::class, array(
        'choices' => array(
          'Función sistólica valorada por Simpson biplano conservada' => 'Función sistólica valorada por Simpson biplano conservada',
          'Deterioro leve de los parámetros sistólicos de función ventricular izquierda' => 'Deterioro leve de los parámetros sistólicos de función ventricular izquierda',
          'Deterioro moderado de los parámetros sistólicos de función ventricular izquierda' => 'Deterioro moderado de los parámetros sistólicos de función ventricular izquierda',
          'Deterioro severo de los parámetros sistólicos de función ventricular izquierda' => 'Deterioro severo de los parámetros sistólicos de función ventricular izquierda'),
        'multiple' => true,
        'attr' => array('class' => 'ventriculoIzqL1C1'),
        ))
        ->add('ventriculoIzqL3', ChoiceType::class, array(
        'choices' => array(
          'Patrón diastólico normal (valorado por Doppler transmitral y Doppler tisular)' => 'Patrón diastólico normal (valorado por Doppler transmitral y Doppler tisular)',
          'Patrón de relajación prolongado (valorado mediante Doppler transmitral y D.  tisular)' => 'Patrón de relajación prolongado (valorado mediante Doppler transmitral y D.  tisular)',
          'Patrón diastólico Pseudonormalizado ( valorado mediante Doppler Tisular)' => 'Patrón diastólico Pseudonormalizado ( valorado mediante Doppler Tisular)',
          'Patrón diastólico de tipo restrictivo ( indicador de PDF > 15 mmHg)' => 'Patrón diastólico de tipo restrictivo ( indicador de PDF > 15 mmHg)'),
        'multiple' => true,
        'attr' => array('class' => 'ventriculoIzqL1C1'),
        ))
      ->add('ventriculoIzqL1Imvi')->add('ventriculoIzqL1Epr')->add('ventriculoIzqL4C1')

        ->add('raizAortaL1', ChoiceType::class, array(
        'choices' => array(
          'dimensiones normales' => 'dimensiones normales',
          'levemente dilatada' => 'levemente dilatada',
          'aneurismática' => 'aneurismática',
          'disección, originada a ….mm del plano del anillo.' => 'disección, originada a ….mm del plano del anillo.',
          'libre………' => 'libre………',
          'Anillo (mm):            P. Sinusal:             Unión ST:              Tubular:' => 'Anillo (mm):            P. Sinusal:             Unión ST:              Tubular:',
        ),
      'multiple' => true,
      'attr' => array('class' => 'ventriculoIzqL1C1'),
      ))
        ->add('aortaL1', ChoiceType::class, array(
        'choices' => array(
          'trivalva, con apertura conservada' => 'trivalva, con apertura conservada',
          'bicúspide, con apertura conservada' => 'bicúspide, con apertura conservada',
          ' engrosada por fibroesclerosis' => ' engrosada por fibroesclerosis',
          'calcificada, con apertura restringida' => 'calcificada, con apertura restringida',
          'prótesis mecánica normoimplantada' => 'prótesis mecánica normoimplantada',
          'prótesis  biológica normoinserta' => 'prótesis  biológica normoinserta',
          'libre……..' => 'libre……..'),
        'multiple' => true,
        'attr' => array('class' => 'ventriculoIzqL1C1'),
        ))

        ->add('aortaL2', ChoiceType::class, array(
        'choices' => array(
          'sin estenosis, ni insuficiencia' => 'sin estenosis, ni insuficiencia',
          'Estenosis  de grado leve' => 'Estenosis  de grado leve',
          'Estenosis  moderada,  mediante Ec. de continuidad se estima un área de… cm2' => 'Estenosis  moderada,  mediante Ec. de continuidad se estima un área de… cm2',
          'Estenosis severa, mediante Ec. De continuidad se estima un área de … cm2' => 'Estenosis severa, mediante Ec. De continuidad se estima un área de … cm2'),
        'multiple' => true,
        'attr' => array('class' => 'ventriculoIzqL1C1'),
        ))

        ->add('aortaL3', ChoiceType::class, array(
        'choices' => array(
          'Insuficiencia mínima' => 'Insuficiencia mínima',
          'Insuficiencia leve' => 'Insuficiencia leve',
          'Insuficiencia moderada, con flujo reverso en aorta descendente toráxica' => 'Insuficiencia moderada, con flujo reverso en aorta descendente toráxica',
          'Insuficiencia moderada a más, con flujo reverso en aorta descendente toráxica' => 'Insuficiencia moderada a más, con flujo reverso en aorta descendente toráxica',
          'Insuficiencia  severa, con flujo reverso en aorta abdominal.' => 'Insuficiencia  severa, con flujo reverso en aorta abdominal.',
          'Leak periprotésico' => 'Leak periprotésico',
          ' libre……….' => ' libre……….'),
        'multiple' => true,
        'attr' => array('class' => 'ventriculoIzqL1C1'),
        ))

        ->add('valvulaMitralL1', ChoiceType::class, array(
        'choices' => array(
          'sin alteraciones estructurales' => 'sin alteraciones estructurales',
          'de aspecto  ligeramente redundante (no reúne criterios actuales de prolapso)' => 'de aspecto  ligeramente redundante (no reúne criterios actuales de prolapso)',
          'redundante de aspecto mixomatoso ' => 'redundante de aspecto mixomatoso ',
          'se observan estigmas reumáticos' => 'se observan estigmas reumáticos',
          'anillo calcificado' => 'anillo calcificado',
          'prótesis mecánica normoinserta' => 'prótesis mecánica normoinserta',
          'prótesis biológica' => 'prótesis biológica',
          'libre……..' => 'libre……..'),
        'multiple' => true,
        'attr' => array('class' => 'ventriculoIzqL1C1'),
        ))

        ->add('valvulaMitralL2', ChoiceType::class, array(
        'choices' => array(
          'estenosis de grado leve' => 'estenosis de grado leve',
          'estenosis moderada' => 'estenosis moderada',
          'estenosis severa' => 'estenosis severa',
          'insuficiencia trivial' => 'insuficiencia trivial',
          'insuficiencia de grado leve' => 'insuficiencia de grado leve',
          'insuficiencia de grado moderado' => 'insuficiencia de grado moderado',
          'insuficiencia moderada a más' => 'insuficiencia moderada a más',
          'insuficiencia severa' => 'insuficiencia severa',
          'libre……….' => 'libre……….'),
        'multiple' => true,
        'attr' => array('class' => 'ventriculoIzqL1C1'),
        ))

        ->add('auriculaIzqL1', ChoiceType::class, array(
        'choices' => array(
          'de dimensiones normales' => 'de dimensiones normales',
          'levemente dilatada' => 'levemente dilatada',
          'moderadamente dilatada' => 'moderadamente dilatada',
          'severamente dilatada' => 'severamente dilatada',
          'libre de trombos' => 'libre de trombos',
          'septum interauricular aneurismático, sin shunt visible' => 'septum interauricular aneurismático, sin shunt visible',
          'septum interauricular aneurismático, con foramen oval permeable.' => 'septum interauricular aneurismático, con foramen oval permeable.',
          'comunicación interauricular' => 'comunicación interauricular',
          'libre………..' => 'libre………..'),
        'multiple' => true,
        'attr' => array('class' => 'ventriculoIzqL1C1'),
        ))

        ->add('valvulaPulmonarL1', ChoiceType::class, array(
        'choices' => array(
          'Valvas finas' => 'Valvas finas',
          'calcificada' => 'calcificada',
          'protésica normofuncionante' => 'protésica normofuncionante',
          'protésica disfuncionante' => 'protésica disfuncionante',
          'tronco y ramas de dimensiones normales' => 'tronco y ramas de dimensiones normales',
          'Infundíbulo de pequeñas dimensiones' => 'Infundíbulo de pequeñas dimensiones',
          'libre……..' => 'libre……..'),
        'multiple' => true,
        'attr' => array('class' => 'ventriculoIzqL1C1'),
        ))

        ->add('valvulaPulmonarL2', ChoiceType::class, array(
        'choices' => array(
          'Insuficiencia trivial' => 'Insuficiencia trivial',
          'Insuficiencia leve' => 'Insuficiencia leve',
          'Insuficiencia moderada' => 'Insuficiencia moderada',
          'Insuficiencia severa' => 'Insuficiencia severa',
          'Ductus arteriovenoso persistente' => 'Ductus arteriovenoso persistente',
          'estenosis valvular de grado leve' => 'estenosis valvular de grado leve',
          'estenosis valvular moderada' => 'estenosis valvular moderada',
          'estenosis valvular severa' => 'estenosis valvular severa',
          'estenosis infundibular' => 'estenosis infundibular',
          'libre………' => 'libre………'),
        'multiple' => true,
        'attr' => array('class' => 'ventriculoIzqL1C1'),
        ))


        ->add('valvulatricuspideL1', ChoiceType::class, array(
        'choices' => array(
          'sin anormalidades estructurales' => 'sin anormalidades estructurales',
          'Mixomatosa' => 'Mixomatosa',
          'estigmas reumáticos' => 'estigmas reumáticos',
          'implante bajo de la valva septal , a ………mm del plano del anillo' => 'implante bajo de la valva septal , a ………mm del plano del anillo',
          'Libre……………' => 'Libre……………'),
        'multiple' => true,
        'attr' => array('class' => 'ventriculoIzqL1C1'),
        ))

        ->add('valvulatricuspideL2', ChoiceType::class, array(
        'choices' => array(
          'Insuficiencia trivial' => 'Insuficiencia trivial',
          'Insuficiencia de grado leve' => 'Insuficiencia de grado leve',
          'Insuficiencia moderada' => 'Insuficiencia moderada',
          'Insuficiencia severa' => 'Insuficiencia severa',
          'Estenosis' => 'Estenosis',
          'Libre……………….' => 'Libre……………….'),
        'multiple' => true,
        'attr' => array('class' => 'ventriculoIzqL1C1'),
        ))

        ->add('cavidadDerechaL1C1')->add('cavidadDerechaL1C2')->add('cavidadDerechaL1C3')

        ->add('venaCavaInferiorL1', ChoiceType::class, array(
        'choices' => array(
          'dimensiones normales, con colapso inspiratorio > 50 %. Se estima una PAd de 5 mmHg' => 'dimensiones normales, con colapso inspiratorio > 50 %. Se estima una PAd de 5 mmHg',
          'dimensiones normales, con colapso < 50 %. Se estima una PAd de 10 mmHg' => 'dimensiones normales, con colapso < 50 %. Se estima una PAd de 10 mmHg',
          'dilatada (> 22 mm), con colapso < 50 %. Se estima una PAd de 15 mmHg' => 'dilatada (> 22 mm), con colapso < 50 %. Se estima una PAd de 15 mmHg',
          'dilatada (> 22 mm) con expansión  inspiratoria. Se estima una PAd de 20 mmHg' => 'dilatada (> 22 mm) con expansión  inspiratoria. Se estima una PAd de 20 mmHg'),
        'multiple' => true,
        'attr' => array('class' => 'ventriculoIzqL1C1'),
        ))

        ->add('pericardioL1', ChoiceType::class, array(
        'choices' => array(
          'derrame pericárdico de grado leve' => 'derrame pericárdico de grado leve',
          'derrame pericárdico moderado' => 'derrame pericárdico moderado',
          'derrame pericárdico severo' => 'derrame pericárdico severo',
          'sin signos de taponamiento ecocardiográfico' => 'sin signos de taponamiento ecocardiográfico',
          'signos ecográficos de taponamiento' => 'signos ecográficos de taponamiento',
          'libre………………..' => 'libre………………..'),
        'multiple' => true,
        'attr' => array('class' => 'ventriculoIzqL1C1'),
        ))

        ->add('conclusionL1', ChoiceType::class, array(
        'choices' => array(
          'Normal' => 'Normal',
          'Cardiopatía isquémica' => 'Cardiopatía isquémica',
          'Cardiopatía HTA' => 'Cardiopatía HTA',
          'Miocardiopatía dilatada' => 'Miocardiopatía dilatada',
          'Deterioro severo de la función VI' => 'Deterioro severo de la función VI',
          'Disfunción diastólica aislada' => 'Disfunción diastólica aislada',
          'Cardiopatía Congénita compleja' => 'Cardiopatía Congénita compleja',
          'CIA' => 'CIA',
          'CIV' => 'CIV',
          'Aneurisma del Septum interauricular' => 'Aneurisma del Septum interauricular',
          'FOP' => 'FOP',
          'Valvulopatías derechas' => 'Valvulopatías derechas',
          'Patología de aorta' => 'Patología de aorta',
          'Endocarditis infecciosa' => 'Endocarditis infecciosa',
          'Masas intracavitarias' => 'Masas intracavitarias',
          'Hipertensión Pulmonar' => 'Hipertensión Pulmonar',
          'Prótesis valvulares' => 'Prótesis valvulares',
          'Dispositivos de cierre' => 'Dispositivos de cierre',
          'Derrame pericárdico' => 'Derrame pericárdico',
          'Taponamiento ecográfico' => 'Taponamiento ecográfico',
          'Pericarditis constrictiva' => 'Pericarditis constrictiva',
          'Miocardiopatía hipertrófica' => 'Miocardiopatía hipertrófica',
          'Miocardiopatía infiltrativa' => 'Miocardiopatía infiltrativa',
          'Tromboembolismo pulmonar' => 'Tromboembolismo pulmonar',
          'Viabilidad (+)' => 'Viabilidad (+)',
          'Discincronía (+)' => 'Discincronía (+)',
          'Enfermedad Carotídea severa' => 'Enfermedad Carotídea severa',
          'Enfermedad vascular periférica severa' => 'Enfermedad vascular periférica severa',
          'Estenosis Aórtica' => 'Estenosis Aórtica',
          'Insuficiencia Aórtica' => 'Insuficiencia Aórtica',
          'Estenosis Mitral' => 'Estenosis Mitral',
          'Insuficiencia Mitral' => 'Insuficiencia Mitral',
          'Otras' => 'Otras'),
        'multiple' => true,
        'attr' => array('class' => 'ventriculoIzqL1C1'),
      ));

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
