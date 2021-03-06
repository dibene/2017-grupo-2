<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * EcoDopplerVasosDeCuelloResultado
 *
 * @ORM\Table(name="eco_doppler_vasos_de_cuello_resultado")
 * @ORM\Entity
 */
class EcoDopplerVasosDeCuelloResultado
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
     * @ORM\Column(name="id_eco_doppler_vasos_de_cuello", type="integer", nullable=false)
     */
    private $idEcoDopplerVasosDeCuello;

    /**
     * @var integer
     *
     * @ORM\Column(name="resultado", type="integer", nullable=false)
     */
    private $resultado;


}
