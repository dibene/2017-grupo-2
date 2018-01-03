<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Medico
 *
 * @ORM\Table(name="medico")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MedicoRepository")
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
     * Many epecialidades have One medico.
     * @ORM\ManyToOne(targetEntity="Especialidad", inversedBy="medicos")
     * @ORM\JoinColumn(name="especialidad_id", referencedColumnName="id")
     */
    private $especialidad;

    /**
     * One Medico has One Usuario.
     * @ORM\OneToOne(targetEntity="Usuario")
     * @ORM\JoinColumn(name="usuario_id", referencedColumnName="id")
     */
    private $usuario;


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

    /**
     * One medico has Many estudios.
     * @ORM\OneToMany(targetEntity="Estudio", mappedBy="medico")
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

    /**
     * Set idEspecialidad
     *
     * @param integer $idEspecialidad
     * @return Medico
     */
    public function setEspecialidad($Especialidad)
    {
        $this->especialidad = $especialidad;

        return $this;
    }

    /**
     * Get idEspecialidad
     *
     * @return integer
     */
    public function getEspecialidad()
    {
        return $this->especialidad;
    }
    /**
     * Get usuario
     *
     * @return usuario
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Get usuario
     *
     * @return usuario
     */
    public function setUsuario($usuario)
    {
      $this->usuario = $usuario;

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
