<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use \Datetime;

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
     * Many Features have One Product.
     * @ORM\ManyToOne(targetEntity="MotivoSolicitud", inversedBy="estudios")
     * @ORM\JoinColumn(name="motivo_solicitud_id", referencedColumnName="id")
     */
    private $motivoSolicitud;

    /**
     * Many Features have One Product.
     * @ORM\ManyToOne(targetEntity="EstudioConfiguracion", inversedBy="estudios")
     * @ORM\JoinColumn(name="estudio_configuracion_id", referencedColumnName="id")
     */
    private $estudioConfiguracion;

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
     * @var \string
     *
     * @ORM\Column(name="diagnostico", type="text", length=65535, nullable=false)
     */
    private $diagnostico;

    public function __construct() {

      $fecha = new Datetime(date("Y-m-d"));
      $this->setFechaAlta($fecha);

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
     * Set $motivoSolicitud
     *
     * @return Estudio
     */
    public function setMotivoSolicitud($motivoSolicitud)
    {
        $this->motivoSolicitud = $motivoSolicitud;

        return $this;
    }

    /**
     * Get $motivoSolicitud
     *

     */
    public function getMotivoSolicitud()
    {
        return $this->motivoSolicitud;
    }

    /**
     * Set $estudioConfiguracion
     *
     * @return Estudio
     */
    public function setEstudioConfiguracion($estudioConfiguracion)
    {
        $this->estudioConfiguracion = $estudioConfiguracion;

        return $this;
    }

    /**
     * Get $estudioConfiguracion
     *

     */
    public function getEstudioConfiguracion()
    {
        return $this->estudioConfiguracion;
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
     * Set observacion
     *
     * @param string $diagnostico
     * @return Estudio
     */
    public function setDiagnostico($diagnostico)
    {
        $this->diagnostico = $diagnostico;

        return $this;
    }

    /**
     * Get diagnostico
     *
     * @return string
     */
    public function getDiagnostico()
    {
        return $this->diagnostico;
    }

    /**
     * Set Medico
     *
     * @param integer $Medico
     * @return Estudio
     */
    public function setMedico($Medico)
    {
        $this->medico = $Medico;

        return $this;
    }

    /**
     * Get Medico
     *
     * @return integer
     */
    public function getMedico()
    {
        return $this->medico;
    }

    /**
     * Set Paciente
     *
     * @return Estudio
     */
    public function setPaciente($Paciente)
    {
        $this->paciente = $Paciente;

        return $this;
    }

    /**
     * Get Paciente
     *
     */
    public function getPaciente()
    {
        return $this->paciente;
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
