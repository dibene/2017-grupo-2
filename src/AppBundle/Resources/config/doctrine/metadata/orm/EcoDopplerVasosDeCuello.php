<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * EcoDopplerVasosDeCuello
 *
 * @ORM\Table(name="eco_doppler_vasos_de_cuello")
 * @ORM\Entity
 */
class EcoDopplerVasosDeCuello
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
     * @ORM\Column(name="nombre", type="integer", nullable=false)
     */
    private $nombre;


}
