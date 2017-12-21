<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EcoDopplerColorArterialDeMiembros
 *
 * @ORM\Table(name="aorta_abdominal_ateromatosa")
 * @ORM\Entity
 */
class AortaAbdominalAteromatosa extends Estudio
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    public function __construct($configuracion,$paciente,$fecha) {
      parent::setEstudioConfiguracion($configuracion);
      parent::setFechaAlta($fecha);
      parent::setPaciente($paciente);

    }

}
