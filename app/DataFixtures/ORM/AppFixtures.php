<?php
// src/DataFixtures/AppFixtures.php
namespace AppBundle\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Usuario;
use AppBundle\Entity\EstudioConfiguracion;
use AppBundle\Entity\Medico;
use AppBundle\Entity\Paciente;

use \Datetime;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // // create 20 products! Bam!
        // for ($i = 0; $i < 20; $i++) {
        //     $product = new Product();
        //     $product->setName('product '.$i);
        //     $product->setPrice(mt_rand(10, 100));
        //     $manager->persist($product);
        // }

        $estudiosconfiguraciones = array(
          array('nombre' => 'Aorta Abdominal Ateromatosa' ,
          'link' => 'aortaabdominalateromatosa'),
          array('nombre' => 'Aorta Abdominal' ,
          'link' => 'aortaabdominal'),
          array('nombre' => 'EcoCardiograma con Inyección de Solución Salina Agitada' ,
          'link' => 'ecocardiogramainysolsalagit'),
          array('nombre' => 'EcoCardiograma Transesofágico' ,
          'link' => 'ecocardiogramatransesofagico'),
          array('nombre' => 'Eco Doppler Color Arterial de Miembros Superiores' ,
          'link' => 'ecodoppcolorartmiemsup'),
          array('nombre' => 'Eco Doppler Color de Miembro Inferior Derecho' ,
          'link' => 'ecodoppcolormieminfder'),
          array('nombre' => 'Eco Doppler Color Arterial de Miembro Inferior Derecho' ,
          'link' => 'ecodopplercolorartmieminfder'),
          array('nombre' => 'Eco Doppler Color Arterial de Miembro Inferior Izquierdo' ,
          'link' => 'ecodopplercolorartmieminfizq'),
          array('nombre' => 'Eco Doppler Color de Arterias Renales' ,
          'link' => 'ecodopplercolorartrenales'),
          array('nombre' => 'Eco Doppler Color Venoso de Miembros Superiores' ,
          'link' => 'ecodopplercolorvenmiemsup'),
          array('nombre' => 'Endarterectomia' ,
          'link' => 'endarterectomia')
        );

        foreach ($estudiosconfiguraciones as $configuracion) {
          $estudioConfiguracion =  new EstudioConfiguracion ();
          $estudioConfiguracion->setNombre( $configuracion['nombre'] );
          $estudioConfiguracion->setLink($configuracion['link']);
          $manager->persist($estudioConfiguracion);
        }
        for ($i=0; $i < 10; $i++) {
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
          $paciente->setInternacion('no');
          $manager->persist($paciente);
          }
        $user = new Usuario();
        $user->setUsername('sinrol');
        $user->setEmail('sinrol@123.com');
        $user->setPlainPassword('123');
        $user->setEnabled(true);
        $manager->persist($user);

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

        $user = new Usuario();
        $user->setUsername('roladmin');
        $user->setEmail('roladmin@123.com');
        $user->setPlainPassword('123');
        $user->addRole(1);
        $user->setEnabled(true);
        $manager->persist($user);

        $manager->flush();


    }
}
