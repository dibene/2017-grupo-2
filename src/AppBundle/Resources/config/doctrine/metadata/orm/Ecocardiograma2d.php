<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Ecocardiograma2d
 *
 * @ORM\Table(name="ecocardiograma_2d")
 * @ORM\Entity
 */
class Ecocardiograma2d
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_estudio", type="integer", nullable=false)
     */
    private $idEstudio;

    /**
     * @var integer
     *
     * @ORM\Column(name="situs", type="integer", nullable=false)
     */
    private $situs;

    /**
     * @var integer
     *
     * @ORM\Column(name="conexion_auriculoventricular", type="integer", nullable=false)
     */
    private $conexionAuriculoventricular;

    /**
     * @var integer
     *
     * @ORM\Column(name="conexion_ventriculo-arterial", type="integer", nullable=false)
     */
    private $conexionVentriculoArterial;


}
