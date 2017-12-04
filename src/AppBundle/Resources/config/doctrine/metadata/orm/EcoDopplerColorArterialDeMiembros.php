<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * EcoDopplerColorArterialDeMiembros
 *
 * @ORM\Table(name="eco_doppler_color_arterial_de_miembros")
 * @ORM\Entity
 */
class EcoDopplerColorArterialDeMiembros
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
     * @ORM\Column(name="arteriafemoral_comun", type="integer", nullable=false)
     */
    private $arteriafemoralComun;

    /**
     * @var integer
     *
     * @ORM\Column(name="arteria_femoral_superficial", type="integer", nullable=false)
     */
    private $arteriaFemoralSuperficial;

    /**
     * @var integer
     *
     * @ORM\Column(name="arteria_poplitea", type="integer", nullable=false)
     */
    private $arteriaPoplitea;

    /**
     * @var integer
     *
     * @ORM\Column(name="arteria_tibial_anterior", type="integer", nullable=false)
     */
    private $arteriaTibialAnterior;

    /**
     * @var integer
     *
     * @ORM\Column(name="arteria_tibial_posterior", type="integer", nullable=false)
     */
    private $arteriaTibialPosterior;


}
