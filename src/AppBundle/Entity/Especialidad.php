<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Especialidad
 *
 * @ORM\Table(name="especialidad")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EspecialidadRepository")
 */
class Especialidad
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
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="observacion", type="string", nullable=false)
     */
    private $observacion;

    /**
     * One medico has Many especialidades.
     * @ORM\OneToMany(targetEntity="Medico", mappedBy="especialidad")
     */
    private $medicos;

    public function __construct() {
        $this->medicos = new ArrayCollection();
    }

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
     * Set nombre
     *
     * @param integer $nombre
     * @return Especialidad
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return integer
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set observacion
     *
     * @param integer $observacion
     * @return Especialidad
     */
    public function setObservacion($observacion)
    {
        $this->observacion = $observacion;

        return $this;
    }

    /**
     * Get observacion
     *
     * @return integer
     */
    public function getObservacion()
    {
        return $this->observacion;
    }
}
