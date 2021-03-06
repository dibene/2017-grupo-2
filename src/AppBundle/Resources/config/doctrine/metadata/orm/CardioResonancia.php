<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * CardioResonancia
 *
 * @ORM\Table(name="cardio_resonancia")
 * @ORM\Entity
 */
class CardioResonancia
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
     * @ORM\Column(name="dtdvi", type="integer", nullable=false)
     */
    private $dtdvi;

    /**
     * @var integer
     *
     * @ORM\Column(name="dtsvi", type="integer", nullable=false)
     */
    private $dtsvi;

    /**
     * @var integer
     *
     * @ORM\Column(name="vfd", type="integer", nullable=false)
     */
    private $vfd;

    /**
     * @var integer
     *
     * @ORM\Column(name="vfs", type="integer", nullable=false)
     */
    private $vfs;


}
