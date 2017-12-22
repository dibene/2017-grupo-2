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
                'link' => 'aortaabdominalateromatosa')
        );

        foreach ($estudiosconfiguraciones as $configuracion) {
          $estudioConfiguracion =  new EstudioConfiguracion ();
          $estudioConfiguracion->setNombre( $configuracion['nombre'] );
          $estudioConfiguracion->setLink($configuracion['link']);
          $manager->persist($estudioConfiguracion);
        }

        $manager->flush();
        // (1, 'Aorta Abdominal Ateromatosa', 'aortaabdominalateromatosa'),
        // (2, 'Aorta Abdominal', ''),
        // (4, 'Eco Doppler Color de Miembro I', ''),
        // (5, 'Eco Doppler Color de Arterias ', ''),
        // (6, 'Eco Doppler Color Venoso de Mi', ''),
        // (8, 'EcoCardiograma con Inyección d', ''),
        // (9, 'EcoCardiograma Transesofágico', ''),
        // (10, 'Eco Doppler Color Arterial de ', ''),
        // (11, 'Eco Doppler Color Arterial de ', ''),
        // (12, 'Endarterectomia', '');


    }
}
