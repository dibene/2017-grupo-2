<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * VenosoNormal
 *
 * @ORM\Table(name="venoso_normal")
 * @ORM\Entity
 */
class VenosoNormal
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
     * @ORM\Column(name="vena_safena_interna", type="integer", nullable=false)
     */
    private $venaSafenaInterna;

    /**
     * @var integer
     *
     * @ORM\Column(name="diametro", type="integer", nullable=false)
     */
    private $diametro;

    /**
     * @var integer
     *
     * @ORM\Column(name="vena_safena_externa", type="integer", nullable=false)
     */
    private $venaSafenaExterna;


}
