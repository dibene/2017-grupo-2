<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MiembrosInferioresArterialPatologico
 *
 * @ORM\Table(name="miembros_inferiores_arterial_patologico")
 * @ORM\Entity
 */
class MiembrosInferioresArterialPatologico extends Estudio
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
     * @ORM\Column(name="extension", type="integer", nullable=false)
     */
    private $extension;

    /**
     * @var integer
     *
     * @ORM\Column(name="velocidades", type="integer", nullable=false)
     */
    private $velocidades;

    /**
     * @var integer
     *
     * @ORM\Column(name="indice_pre_estenosis_estenosis", type="integer", nullable=false)
     */
    private $indicePreEstenosisEstenosis;

    /**
     * @var string
     *
     * @ORM\Column(name="arteria_femoral_comun", type="integer", nullable=false)
     */
    private $arteriaFemoralComun;

    /**
     * @var string
     *
     * @ORM\Column(name="arteria_femoral_superficial", type="integer", nullable=false)
     */
    private $arteriaFemoralSuperficial;

    /**
     * @var string
     *
     * @ORM\Column(name="arteria_poplitea", type="integer", nullable=false)
     */
    private $arteriaPoplitea;

    /**
     * @var string
     *
     * @ORM\Column(name="arteria_tibial_anterior", type="integer", nullable=false)
     */
    private $arteriaTibialAnterior;

    /**
     * @var string
     *
     * @ORM\Column(name="arteria_tibial_posterior", type="integer", nullable=false)
     */
    private $arteriaTibialPosterior;

    /**
     * @var string
     *
     * @ORM\Column(name="arteria_peronea", type="integer", nullable=false)
     */
    private $arteriaPeronea;

    /**
     * @var string
     *
     * @ORM\Column(name="arteria", type="integer", nullable=false)
     */
    private $arteria;

    /**
     * @var string
     *
     * @ORM\Column(name="flujos_distales", type="integer", nullable=false)
     */
    private $flujosDistales;

    /**
     * @var string
     *
     * @ORM\Column(name="circulacion_colateral", type="integer", nullable=false)
     */
    private $circulacionColateral;

    /**
     * @var integer
     *
     * @ORM\Column(name="indice_tobillo_brazo_derecho", type="integer", nullable=false)
     */
    private $indiceTobilloBrazoDerecho;

    /**
     * @var integer
     *
     * @ORM\Column(name="indice_tobillo_brazo_izquierdo", type="integer", nullable=false)
     */
    private $indiceTobilloBrazoIzquierdo;


    public function __construct($medico,$paciente , $entityManager) {
      parent::__construct();
    //  $entityManager = $event->getEntityManager();
      $configuracion = $entityManager->getRepository('AppBundle:EstudioConfiguracion')->find(18);
      parent::setEstudioConfiguracion($configuracion);
      parent::setPaciente($paciente);
      parent::setMedico($medico);
    }
    /**
     * Set extension
     *
     * @param integer $extension
     * @return MiembrosInferioresArterialPatologico
     */
    public function setExtension($extension)
    {
        $this->extension = $extension;

        return $this;
    }

    /**
     * Get extension
     *
     * @return integer
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * Set velocidades
     *
     * @param integer $velocidades
     * @return MiembrosInferioresArterialPatologico
     */
    public function setVelocidades($velocidades)
    {
        $this->velocidades = $velocidades;

        return $this;
    }

    /**
     * Get velocidades
     *
     * @return integer
     */
    public function getVelocidades()
    {
        return $this->velocidades;
    }

    /**
     * Set indicePreEstenosisEstenosis
     *
     * @param integer $indicePreEstenosisEstenosis
     * @return MiembrosInferioresArterialPatologico
     */
    public function setIndicePreEstenosisEstenosis($indicePreEstenosisEstenosis)
    {
        $this->indicePreEstenosisEstenosis = $indicePreEstenosisEstenosis;

        return $this;
    }

    /**
     * Get indicePreEstenosisEstenosis
     *
     * @return integer
     */
    public function getIndicePreEstenosisEstenosis()
    {
        return $this->indicePreEstenosisEstenosis;
    }
}
