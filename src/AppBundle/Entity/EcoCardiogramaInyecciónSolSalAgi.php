<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EcoCardiogramaInyecciónSoluciónSalinaAgitada
 *
 * @ORM\Table(name="EcoCardiograma_Iny_Sol_Sal_Agit")
 * @ORM\Entity
 */
class EcoCardiogramaInySolSalAgit extends Estudio
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
