<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EcoDopplerVasosDeCuello
 *
 * @ORM\Table(name="eco_doppler_vasos_de_cuello")
 * @ORM\Entity
 */
class EcoDopplerVasosDeCuello extends Estudio
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

     public function __construct($medico,$paciente , $entityManager) {
       parent::__construct();
     //  $entityManager = $event->getEntityManager();
       $configuracion = $entityManager->getRepository('AppBundle:EstudioConfiguracion')->find(13);
       parent::setEstudioConfiguracion($configuracion);
       parent::setPaciente($paciente);
       parent::setMedico($medico);
     }


}
