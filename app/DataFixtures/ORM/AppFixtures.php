<?php
// src/DataFixtures/AppFixtures.php
namespace AppBundle\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Usuario;
use AppBundle\Entity\EstudioConfiguracion;
use AppBundle\Entity\Medico;
use AppBundle\Entity\Paciente;
use AppBundle\Entity\Especialidad;
use AppBundle\Entity\MotivoSolicitud;
use AppBundle\Entity\GrupoDiagnostico;

use \Datetime;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
          // estudios
        $estudiosconfiguraciones = array(
          array('id' => 1 ,
                'nombre' => 'Aorta Abdominal Ateromatosa' ,
                'link' => 'aortaabdominalateromatosa'),
          array('id' => 2 ,
            'nombre' => 'Aorta Abdominal' ,
          'link' => 'aortaabdominal'),
          array('id' => 3 ,
            'nombre' => 'EcoCardiograma con Inyección de Solución Salina Agitada' ,
          'link' => 'ecocardiogramainysolsalagit'),
          array('id' => 4 ,
            'nombre' => 'EcoCardiograma Transesofágico' ,
          'link' => 'ecocardiogramatransesofagico'),
          array('id' => 5 ,
            'nombre' => 'Eco Doppler Color Arterial de Miembros Superiores' ,
          'link' => 'ecodoppcolorartmiemsup'),
          array('id' => 6 ,
            'nombre' => 'Eco Doppler Color de Miembro Inferior Derecho' ,
          'link' => 'ecodoppcolormieminfder'),
          array('id' => 7 ,
            'nombre' => 'Eco Doppler Color Arterial de Miembro Inferior Derecho' ,
          'link' => 'ecodopplercolorartmieminfder'),
          array('id' => 8 ,
            'nombre' => 'Eco Doppler Color Arterial de Miembro Inferior Izquierdo' ,
          'link' => 'ecodopplercolorartmieminfizq'),
          array('id' => 9 ,
            'nombre' => 'Eco Doppler Color de Arterias Renales' ,
          'link' => 'ecodopplercolorartrenales'),
          array('id' => 10 ,
            'nombre' => 'Eco Doppler Color Venoso de Miembros Superiores' ,
          'link' => 'ecodopplercolorvenmiemsup'),
          array('id' => 11 ,
            'nombre' => 'Endarterectomia' ,
          'link' => 'endarterectomia'),
          array('id' => 12 ,
            'nombre' => 'Ecocardiograma 2D y Doppler Color' ,
          'link' => 'ecocardiograma2d'),
          array('id' => 13 ,
            'nombre' => 'Eco Doppler Vasos de Cuello' ,
          'link' => 'ecodopplervasosdecuello'),
          array('id' => 14 ,
            'nombre' => 'Eco Doppler Color Venoso de Miembros Inferiores' ,
          'link' => 'ecodopplercolorvenosomiembrosinferiores'),
          array('id' => 15 ,
            'nombre' => 'Ecocardiograma de Valoracion de Disincronía' ,
          'link' => 'ecocardiogramavaloraciondisincronia'),
          array('id' => 16,
            'nombre' => 'Eco Doppler Color Arterial de Miembros Inferiores' ,
            'link' =>'ecodopplercolorarterialdemiembros'),
          array('id' => 17 ,
            'nombre' => 'Cardio Resonancia' ,
          'link' => 'cardioresonancia'),
          array('id' => 18 ,
            'nombre' => 'Miembros Inferiores Arterial Patológico' ,
          'link' => 'miembrosinferioresarterialpatologico'),
          array('id' => 19 ,
            'nombre' => 'Miembros Superiores Arterial Normal' ,
          'link' => 'miembrossuperioresarterialnormal'),
          array('id' => 20 ,
            'nombre' => 'EcoEstres' ,
          'link' => 'ecoestres'),
          array('id' => 22 ,
            'nombre' => 'Cardiopatías Congénitas del Adulto' ,
          'link' => 'cardiopatiascongenitas')
        );
        //ESTUDIOS
        // - TODO seguridad poner todos los estudios en /estudio/nombre del estudio asi se puede restringir el /estudio
        // BASICOS -> SOLO TIENEN LOS SIGUIENTES ATRIBUTOS: PACIENTE (ID) - FECHA_ALTA (SYSDATE) - OBSERVACIÓN (STRING) - DIAGNOSTICO_FINAL (STRING)
        // 1 Aorta Abdominal Ateromatosa  ->
        // 2 Aorta Abdominal.
        // 3 Eco Doppler Color Arterial de Miembros Superiores. (base)     -Eco_Dopp_Color_Art_Miem_Sup
        // 4 Eco Doppler Color de Miembro Inferior Derecho.			           -Eco_Dopp_Color_Miem_Inf_Der
        // 5 Eco Doppler Color de Arterias Renales.						             -Eco_Doppler_Color_Art_Renales
        // 6 Eco Doppler Color Venoso de Miembros Superiores.              -Eco_Doppler_Color_Ven_Miem_Sup
        // 7 EcoCardiograma con Inyección de Solución Salina Agitada.      -EcoCardiograma_Iny_Sol_Sal_Agit.
        // 8 EcoCardiograma Transesofágico.								                 -EcoCardiograma_Transesofágico
        // 9 Eco Doppler Color Arterial de Miembro Inferior Derecho.       -Eco_Doppler_Color_Art_Miem_Inf_Der
        // 10 Eco Doppler Color Arterial de Miembro Inferior Izquierdo.    -Eco_Doppler_Color_Art_Miem_Inf_Izq
        // 11 Endarterectomia.

        // 12 Ecocardiograma 2D y Doppler Color
        // 13 Eco Doppler Vasos de Cuello
        // 14 Eco Doppler Color Venoso de Miembros Inferiores
        // 15 EcoCardiograma para Valoración de Disincronía
        // 16 Eco Doppler Color Arterial de Miembros Inferiores
        // 17 Cardio Resonancia
        // 18 Miembros Inferiores Arterial Patológico
        // 19 Miembros Superiores Arterial Normal
        // 20 Eco Estrés
        // 22 Cardiopatías Congénitas del Adulto

        foreach ($estudiosconfiguraciones as $configuracion) {
          $estudioConfiguracion =  new EstudioConfiguracion ();
          $estudioConfiguracion->setId( $configuracion['id'] );
          $estudioConfiguracion->setNombre( $configuracion['nombre'] );
          $estudioConfiguracion->setLink($configuracion['link']);
          $manager->persist($estudioConfiguracion);
        }

        //grupos diagnosticos
        $diagnosticos = array(
          array('nombre' => 'Normal' ),
          array('nombre' => 'Cardiopatía isquémica' ),
          array('nombre' => 'Cardiopatía HTA' ),
          array('nombre' => 'Miocardiopatía dilatada' ),
          array('nombre' => 'Deterioro severo de la función VI' ),
          array('nombre' => 'Disfunción diastólica aislada' ),
          array('nombre' => 'Cardiopatía Congénita compleja' ),
          array('nombre' => 'CIA' ),
          array('nombre' => 'CIV' ),
          array('nombre' => 'Aneurisma del Septum interauricular' ),
          array('nombre' => 'FOP' ),
          array('nombre' => 'Valvulopatías derechas' ),
          array('nombre' => 'Patología de aorta' ),
          array('nombre' => 'Endocarditis infecciosa' ),
          array('nombre' => 'Masas intracavitarias' ),
          array('nombre' => 'Hipertensión Pulmonar' ),
          array('nombre' => 'Prótesis valvulares' ),
          array('nombre' => 'Dispositivos de cierre' ),
          array('nombre' => 'Derrame pericárdico' ),
          array('nombre' => 'Taponamiento ecográfico' ),
          array('nombre' => 'Pericarditis constrictiva' ),
          array('nombre' => 'Miocardiopatía hipertrófica' ),
          array('nombre' => 'Miocardiopatía infiltrativa' ),
          array('nombre' => 'Tromboembolismo pulmonar' ),
          array('nombre' => 'Viabilidad (+)' ),
          array('nombre' => 'Discincronía (+)' ),
          array('nombre' => 'Enfermedad Carotídea severa' ),
          array('nombre' => 'Enfermedad vascular periférica severa' ),
          array('nombre' => 'Estenosis Aórtica' ),
          array('nombre' => 'Insuficiencia Aórtica' ),
          array('nombre' => 'Estenosis Mitral' ),
          array('nombre' => 'Insuficiencia Mitral' ),
          array('nombre' => 'Otras' ),

        );

        foreach ($diagnosticos as $diagnostico) {
          $d =  new GrupoDiagnostico();
          $d->setNombre( $diagnostico['nombre'] );
          $manager->persist($d);
        }


        //especialidades de medico
        $especialidades = array(
          array('nombre' => 'cardiologo' ,
          'observacion' => 'cosas q hace '),
          array('nombre' => 'cardiologo pediatrico' ,
          'observacion' => 'cosas q hace '),
          array('nombre' => 'especialidad N' ,
          'observacion' => 'cosas q hace ')

        );

        foreach ($especialidades as $especialidad) {
          $esp =  new Especialidad ();
          $esp->setNombre( $especialidad['nombre'] );
          $esp->setObservacion($especialidad['observacion']);
          $manager->persist($esp);
        }
        //pacientes
        for ($i=0; $i < 20; $i++) {
          $paciente = new Paciente();
          $paciente->setObraSocial('obraSocial');
          $paciente->setNombre('nombre'.$i);
          $paciente->setApellido('apellido'.$i);
          $paciente->setDni($i*13*13);
          $paciente->setSexo('masculino');
          $paciente->setNacionalidad('nac');
          $paciente->setLocalidad('loc');
          $paciente->setDireccion('dir');
          $paciente->setFechaNacimiento(new DateTime('2017-09-05'));
          $paciente->setFechaIngreso(new DateTime('2017-09-05'));
          $manager->persist($paciente);
          }

        // usuarios
        //usuario sin rol
        $user = new Usuario();
        $user->setUsername('sinrol');
        $user->setEmail('sinrol@123.com');
        $user->setPlainPassword('123');
        $user->setEnabled(true);
        $manager->persist($user);
        //usuario con rol medico, medico asociado a un usuario
        $user = new Usuario();
        $user->setUsername('rolmedico');
        $user->setEmail('rolmedico@123.com');
        $user->setPlainPassword('123');
        $user->addRole(2);
        $user->setEnabled(true);
        $manager->persist($user);
          $medico = new Medico();
          $medico->setObraSocial('obraSocial');
          $medico->setMatricula(123123);
          $medico->setNombre('nombre');
          $medico->setApellido('apellido');
          $medico->setDni(123123);
          $medico->setSexo('masculino');
          $medico->setNacionalidad('nac');
          $medico->setLocalidad('loc');
          $medico->setDireccion('dir');
          $medico->setFechaNacimiento(new DateTime('2017-09-05'));
          $medico->setUsuario($user);
          $manager->persist($medico);

        // usuario con rol admin sin medico asociado
        $user = new Usuario();
        $user->setUsername('roladmin');
        $user->setEmail('roladmin@123.com');
        $user->setPlainPassword('123');
        $user->addRole(1);
        $user->setEnabled(true);
        $manager->persist($user);


//motivos SOLICITUD
$motivos = array(
  array('nombre' => 'Control' ),
  array('nombre' => 'Factores de riesgo CV' ),
  array('nombre' => 'Cardiopatía isquémica' ),
  array('nombre' => 'Insuficiencia cardiaca' ),
  array('nombre' => 'Cardiopatías congénitas' ),
  array('nombre' => 'Endocarditis infecciosa' ),
  array('nombre' => 'Arritmia' ),
  array('nombre' => 'Enfermedad de Chagas' ),
  array('nombre' => 'Hipertensión pulmonar' ),
  array('nombre' => 'Tratamiento oncológico' ),
  array('nombre' => 'Insuficiencia renal' ),
  array('nombre' => 'Enfermedades autoinmunes' ),
  array('nombre' => 'Enfermedades respiratorias' ),
  array('nombre' => 'Accidente Cerebro vascular' ),
  array('nombre' => 'Sindrome febril prolongado' ),
  array('nombre' => 'Enfermedad vascular periférica' ),
  array('nombre' => 'FOP' ),
  array('nombre' => 'Otro' )
);

foreach ($motivos as $motivo) {
  $m =  new MotivoSolicitud();
  $m->setNombre( $motivo['nombre'] );
  $manager->persist($m);
}
        $manager->flush();

    }
}
