<?php

namespace AppBundle\Entity;

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
     * Many Resultados have One ecodopler.
     * @ORM\ManyToOne(targetEntity="EcoDopplerVasosDeCuello", inversedBy="resultados")
     * @ORM\JoinColumn(name="eco_doppler_id", referencedColumnName="id")
     */
    private $ecoDopplerVasosDeCuello;

    /**
     * @var integer
     *
     * @ORM\Column(name="resultado", type="string", nullable=false)
     */
    private $resultado;
    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * Set EcoDopplerVasosDeCuello
     *
     * @param integer $ecoDopplerVasosDeCuello
     * @return EcoDopplerVasosDeCuelloResultado
     */
    public function setEcoDopplerVasosDeCuello($ecoDopplerVasosDeCuello)
    {
        $this->ecoDopplerVasosDeCuello = $ecoDopplerVasosDeCuello;

        return $this;
    }

    /**
     * Get idEcoDopplerVasosDeCuello
     *
     * @return integer
     */
    public function getEcoDopplerVasosDeCuello()
    {
        return $this->ecoDopplerVasosDeCuello;
    }

    /**
     * Set resultado
     *
     * @param string $resultado
     * @return EcoDopplerVasosDeCuelloResultado
     */
    public function setResultado($resultado)
    {
        $this->resultado = $resultado;

        return $this;
    }

    /**
     * Get resultado
     *
     * @return string
     */
    public function getResultado()
    {
        return $this->resultado;
    }
}
