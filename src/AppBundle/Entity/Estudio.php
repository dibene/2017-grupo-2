<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Estudio
 *
 * @ORM\Table(name="estudio")
 * @ORM\Entity
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 */
abstract class Estudio
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
     * One estudio has One motivosolicitud.
     * @ORM\OneToOne(targetEntity="MotivoSolicitud")
     * @ORM\JoinColumn(name="motivo_solicitud_id", referencedColumnName="id")
     */
    private $motivoSolicitud;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=30, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="observacion", type="text", length=65535, nullable=false)
     */
    private $observacion;

    /**
    * Many estudios have One paciente.
    * @ORM\ManyToOne(targetEntity="Medico", inversedBy="estudios")
    * @ORM\JoinColumn(name="id_medico", referencedColumnName="id")
    */

    private $medico;

     /**
     * Many estudios have One paciente.
     * @ORM\ManyToOne(targetEntity="Paciente", inversedBy="estudios")
     * @ORM\JoinColumn(name="id_paciente", referencedColumnName="id")
     */
    private $paciente;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_alta", type="date", nullable=false)
     */
    private $fechaAlta;

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
     * @param string $nombre
     * @return Estudio
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set observacion
     *
     * @param string $observacion
     * @return Estudio
     */
    public function setObservacion($observacion)
    {
        $this->observacion = $observacion;

        return $this;
    }

    /**
     * Get observacion
     *
     * @return string
     */
    public function getObservacion()
    {
        return $this->observacion;
    }

    /**
     * Set Medico
     *
     * @param integer $Medico
     * @return Estudio
     */
    public function setMedico($Medico)
    {
        $this->Medico = $Medico;

        return $this;
    }

    /**
     * Get Medico
     *
     * @return integer
     */
    public function getMedico()
    {
        return $this->Medico;
    }

    /**
     * Set Paciente
     *
     * @param integer $Paciente
     * @return Estudio
     */
    public function setPaciente($Paciente)
    {
        $this->Paciente = $Paciente;

        return $this;
    }

    /**
     * Get Paciente
     *
     * @return integer
     */
    public function getPaciente()
    {
        return $this->Paciente;
    }

    /**
     * Set fechaAlta
     *
     * @param \DateTime $fechaAlta
     * @return Estudio
     */
    public function setFechaAlta($fechaAlta)
    {
        $this->fechaAlta = $fechaAlta;

        return $this;
    }

    /**
     * Get fechaAlta
     *
     * @return \DateTime
     */
    public function getFechaAlta()
    {
        return $this->fechaAlta;
    }
}
