<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EcoDopplerColorVenosoMiembrosInferiores
 *
 * @ORM\Table(name="eco_doppler_color_venoso_miembros_inferiores")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EcoDopplerColorVenosoMiembrosInferioresRepository")
 */
class EcoDopplerColorVenosoMiembrosInferiores extends Estudio
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    public function __construct($medico,$paciente , $entityManager) {
      parent::__construct();
        //  $entityManager = $event->getEntityManager();
      $configuracion = $entityManager->getRepository('AppBundle:EstudioConfiguracion')->find(14);
      parent::setEstudioConfiguracion($configuracion);
      parent::setPaciente($paciente);
      parent::setMedico($medico);
    }

}
