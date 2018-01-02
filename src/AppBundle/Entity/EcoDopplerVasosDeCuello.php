<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EcoDopplerVasosDeCuello
 *
 * @ORM\Table(name="eco_doppler_vasos_de_cuello")
 * @ORM\Entity
 */
class EcoDopplerVasosDeCuello extends Estudio
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
     * @ORM\Column(name="nombre", type="integer", nullable=false)
     */
    private $nombre;

    /**
     * One Product has Many Features.
     * @ORM\OneToMany(targetEntity="EcoDopplerVasosDeCuelloResultado", mappedBy="ecoDopplerVasosDeCuello")
     */
     private $resultados;

     public function __construct($medico,$paciente , $entityManager) {
       parent::__construct();
       $this->resultados = new ArrayCollection();

     //  $entityManager = $event->getEntityManager();
       $configuracion = $entityManager->getRepository('AppBundle:EstudioConfiguracion')->find(13);
       parent::setEstudioConfiguracion($configuracion);
       parent::setPaciente($paciente);
       parent::setMedico($medico);
     }


    /**
     * Set nombre
     *
     * @param integer $nombre
     * @return EcoDopplerVasosDeCuello
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
}
