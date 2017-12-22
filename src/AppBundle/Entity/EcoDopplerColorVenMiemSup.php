<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EcoDopplerColorVenosoMiembrosSuperiores
 *
 * @ORM\Table(name="Eco_Doppler_Color_Ven_Miem_Sup")
 * @ORM\Entity
 */
class EcoDopplerColorVenMiemSup extends Estudio
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
