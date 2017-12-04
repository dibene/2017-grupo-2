<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Paciente
 *
 * @ORM\Table(name="paciente")
 * @ORM\Entity
 */
class Paciente extends Persona
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
     * @ORM\Column(name="id_persona", type="integer", nullable=false)
     */
    private $idPersona;

    /**
     * @var string
     *
     * @ORM\Column(name="obra_social", type="string", length=15, nullable=false)
     */
    private $obraSocial;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_ingreso", type="date", nullable=false)
     */
    private $fechaIngreso;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_medico_cabecera", type="integer", nullable=false)
     */
    private $idMedicoCabecera;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_internacion", type="integer", nullable=false)
     */
    private $idInternacion;



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
     * Set idPersona
     *
     * @param integer $idPersona
     * @return Paciente
     */
    public function setIdPersona($idPersona)
    {
        $this->idPersona = $idPersona;

        return $this;
    }

    /**
     * Get idPersona
     *
     * @return integer
     */
    public function getIdPersona()
    {
        return $this->idPersona;
    }

    /**
     * Set obraSocial
     *
     * @param string $obraSocial
     * @return Paciente
     */
    public function setObraSocial($obraSocial)
    {
        $this->obraSocial = $obraSocial;

        return $this;
    }

    /**
     * Get obraSocial
     *
     * @return string
     */
    public function getObraSocial()
    {
        return $this->obraSocial;
    }

    /**
     * Set fechaIngreso
     *
     * @param \DateTime $fechaIngreso
     * @return Paciente
     */
    public function setFechaIngreso($fechaIngreso)
    {
        $this->fechaIngreso = $fechaIngreso;

        return $this;
    }

    /**
     * Get fechaIngreso
     *
     * @return \DateTime
     */
    public function getFechaIngreso()
    {
        return $this->fechaIngreso;
    }

    /**
     * Set idMedicoCabecera
     *
     * @param integer $idMedicoCabecera
     * @return Paciente
     */
    public function setIdMedicoCabecera($idMedicoCabecera)
    {
        $this->idMedicoCabecera = $idMedicoCabecera;

        return $this;
    }

    /**
     * Get idMedicoCabecera
     *
     * @return integer
     */
    public function getIdMedicoCabecera()
    {
        return $this->idMedicoCabecera;
    }

    /**
     * Set idInternacion
     *
     * @param integer $idInternacion
     * @return Paciente
     */
    public function setIdInternacion($idInternacion)
    {
        $this->idInternacion = $idInternacion;

        return $this;
    }

    /**
     * Get idInternacion
     *
     * @return integer
     */
    public function getIdInternacion()
    {
        return $this->idInternacion;
    }
}
