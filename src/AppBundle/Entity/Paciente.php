<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Paciente
 *
 * @ORM\Table(name="paciente")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PacienteRepository")
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
     * @var string
     *
     * @ORM\Column(name="obra_social", type="string", length=15, nullable=false)
     */
    private $obraSocial;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_ingreso", type="date", length=15, nullable=false)
     */
    private $fechaIngreso;

    /**
     * @var integer
     * @ORM\OneToOne(targetEntity="Medico")
     * @ORM\JoinColumn(name="medico_id", referencedColumnName="id")
     */
    private $medicoCabecera;

    /**
     * @var integer
     *
     * @ORM\Column(name="internacion", type="string", length=15, nullable=false)
     */
    private $internacion;

    /**
     * One paciente has Many estudios.
     * @ORM\OneToMany(targetEntity="Estudio", mappedBy="paciente")
     */
    private $estudios;


        public function __construct() {
            $this->estudios = new ArrayCollection();
        }
        /**
        * Add estudios
        *
        */
        public function addEstudio(Estudio $estudios)
        {
          $this->estudios[] = $estudios;
        }

        public function setEstudios($estudios) {
          $this->estudios = $estudios;
        }

        /**
        * Get estudios
        *
        * @return Doctrine\Common\Collections\Collection
        */
        public function getEstudios()
        {
          return $this->estudios;
        }

        // /**
        // * Get estudios
        // *
        // * @return Doctrine\Common\Collections\Collection
        // */
        // public function getEstudios()
        // {
        //   //return $this->user_roles->toArray(); //IMPORTANTE: el mecanismo de seguridad de Sf2 requiere ésto como un array
        //   $estudios = array();
        //   foreach ($this->estudios as $estudio) {
        //     $estudios[] = $estudio->getEstudio();
        //   }
        //
        //   return $estudios;
        // }


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
     * Set medicoCabecera
     *
     * @param integer $medicoCabecera
     * @return Paciente
     */
    public function setMedicoCabecera($medicoCabecera)
    {
        $this->medicoCabecera = $medicoCabecera;

        return $this;
    }

    /**
     * Get medicoCabecera
     *
     * @return integer
     */
    public function getMedicoCabecera()
    {
        return $this->medicoCabecera;
    }

    /**
     * Set internacion
     *
     * @param string $internacion
     * @return Paciente
     */
    public function setInternacion($internacion)
    {
        $this->internacion = $internacion;

        return $this;
    }

    /**
     * Get internacion
     *
     * @return string
     */
    public function getInternacion()
    {
        return $this->internacion;
    }
}
