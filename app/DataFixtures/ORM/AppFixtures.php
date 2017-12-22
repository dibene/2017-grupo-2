<?php
// src/DataFixtures/AppFixtures.php
namespace AppBundle\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Usuario;
use AppBundle\Entity\EstudioConfiguracion;

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

        $manager->flush();
        // Aorta Abdominal Ateromatosa
        // aortaabdominalateromatosa
        // Aorta Abdominal
        // aortaabdominal

        // EcoCardiograma con Inyección de Solución Salina Agitada
        // ecocardiogramainysolsalagit
        // EcoCardiograma Transesofágico
        // ecocardiogramatransesofagico

        // Eco Doppler Color Arterial de Miembros Superiores
        // ecodoppcolorartmiemsup

        // Eco Doppler Color de Miembro Inferior Derecho
        // ecodoppcolormieminfder

        // Eco Doppler Color Arterial de Miembro Inferior Derecho
        // ecodopplercolorartmieminfder
        // Eco Doppler Color Arterial de Miembro Inferior Izquierdo
        // ecodopplercolorartmieminfizq

        // Eco Doppler Color de Arterias Renales
        // ecodopplercolorartrenales

        // Eco Doppler Color Venoso de Miembros Superiores
        // ecodopplercolorvenmiemsup

        // Endarterectomia
        // endarterectomia

    }
}
