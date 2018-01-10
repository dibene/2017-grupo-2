<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * GrupoDiagnostico
 *
 * @ORM\Table(name="grupo_diagnostico")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GrupoDiagnosticoRepository")
 */
class GrupoDiagnostico
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * Many Groups have Many estudios.
     * @ORM\ManyToMany(targetEntity="Estudio", mappedBy="grupoDiagnostico")
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
     * @return GrupoDiagnostico
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
}
