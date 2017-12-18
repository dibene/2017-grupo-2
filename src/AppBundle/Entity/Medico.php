<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Medico
 *
 * @ORM\Table(name="medico")
 * @ORM\Entity
 */

class Medico extends Persona
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
     * @ORM\OneToOne(targetEntity="Especialidad")
     * @ORM\JoinColumn(name="especialidad_id", referencedColumnName="id")
     */
    private $Especialidad;

    /**
     * One Medico has One Usuario.
     * @ORM\OneToOne(targetEntity="Usuario")
     * @ORM\JoinColumn(name="usuario_id", referencedColumnName="id")
     */
    private $Usuario;


    /**
     * @var string
     *
     * @ORM\Column(name="obra_social", type="string", length=15, nullable=false)
     */
    private $obraSocial;

    /**
     * @var integer
     *
     * @ORM\Column(name="matricula", type="integer", nullable=false)
     */
    private $matricula;

    public function __construct()
    {

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
     * Set idEspecialidad
     *
     * @param integer $idEspecialidad
     * @return Medico
     */
    public function setEspecialidad($Especialidad)
    {
        $this->Especialidad = $Especialidad;

        return $this;
    }

    /**
     * Get idEspecialidad
     *
     * @return integer
     */
    public function getEspecialidad()
    {
        return $this->Especialidad;
    }
    /**
     * Get usuario
     *
     * @return usuario
     */
    public function getUsuario()
    {
        return $this->Usuario;
    }

    /**
     * Get usuario
     *
     * @return usuario
     */
    public function setUsuario($Usuario)
    {
      $this->Usuario = $Usuario;

      return $this;
    }

    /**
     * Set obraSocial
     *
     * @param string $obraSocial
     * @return Medico
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
     * Set matricula
     *
     * @param integer $matricula
     * @return Medico
     */
    public function setMatricula($matricula)
    {
        $this->matricula = $matricula;

        return $this;
    }

    /**
     * Get matricula
     *
     * @return integer
     */
    public function getMatricula()
    {
        return $this->matricula;
    }

}
