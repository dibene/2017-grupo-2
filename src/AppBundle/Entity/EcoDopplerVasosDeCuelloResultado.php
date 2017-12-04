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
     * Set idEcoDopplerVasosDeCuello
     *
     * @param integer $idEcoDopplerVasosDeCuello
     * @return EcoDopplerVasosDeCuelloResultado
     */
    public function setIdEcoDopplerVasosDeCuello($idEcoDopplerVasosDeCuello)
    {
        $this->idEcoDopplerVasosDeCuello = $idEcoDopplerVasosDeCuello;

        return $this;
    }

    /**
     * Get idEcoDopplerVasosDeCuello
     *
     * @return integer 
     */
    public function getIdEcoDopplerVasosDeCuello()
    {
        return $this->idEcoDopplerVasosDeCuello;
    }

    /**
     * Set resultado
     *
     * @param integer $resultado
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
     * @return integer 
     */
    public function getResultado()
    {
        return $this->resultado;
    }
}
