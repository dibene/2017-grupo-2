<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ecocardiograma2d
 *
 * @ORM\Table(name="ecocardiograma_2d")
 * @ORM\Entity
 */
class Ecocardiograma2d extends Estudio
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
     * @ORM\Column(name="conexion_ventriculo_arterial", type="integer", nullable=false)
     */
    private $conexionVentriculoArterial;



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
     * Set idEstudio
     *
     * @param integer $idEstudio
     * @return Ecocardiograma2d
     */
    public function setIdEstudio($idEstudio)
    {
        $this->idEstudio = $idEstudio;

        return $this;
    }

    /**
     * Get idEstudio
     *
     * @return integer
     */
    public function getIdEstudio()
    {
        return $this->idEstudio;
    }

    /**
     * Set situs
     *
     * @param integer $situs
     * @return Ecocardiograma2d
     */
    public function setSitus($situs)
    {
        $this->situs = $situs;

        return $this;
    }

    /**
     * Get situs
     *
     * @return integer
     */
    public function getSitus()
    {
        return $this->situs;
    }

    /**
     * Set conexionAuriculoventricular
     *
     * @param integer $conexionAuriculoventricular
     * @return Ecocardiograma2d
     */
    public function setConexionAuriculoventricular($conexionAuriculoventricular)
    {
        $this->conexionAuriculoventricular = $conexionAuriculoventricular;

        return $this;
    }

    /**
     * Get conexionAuriculoventricular
     *
     * @return integer
     */
    public function getConexionAuriculoventricular()
    {
        return $this->conexionAuriculoventricular;
    }

    /**
     * Set conexionVentriculoArterial
     *
     * @param integer $conexionVentriculoArterial
     * @return Ecocardiograma2d
     */
    public function setConexionVentriculoArterial($conexionVentriculoArterial)
    {
        $this->conexionVentriculoArterial = $conexionVentriculoArterial;

        return $this;
    }

    /**
     * Get conexionVentriculoArterial
     *
     * @return integer
     */
    public function getConexionVentriculoArterial()
    {
        return $this->conexionVentriculoArterial;
    }
}
