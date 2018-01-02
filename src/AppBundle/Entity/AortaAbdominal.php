<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Aorta Abdominal
 *
 * @ORM\Table(name="aorta_abdominal")
 * @ORM\Entity
 */
class AortaAbdominal extends Estudio
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
      $configuracion = $entityManager->getRepository('AppBundle:EstudioConfiguracion')->find(2);
      parent::setEstudioConfiguracion($configuracion);
      parent::setPaciente($paciente);
      parent::setMedico($medico);
    }


}
