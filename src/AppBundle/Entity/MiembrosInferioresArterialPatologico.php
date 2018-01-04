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

    /**
     * Set arteriaFemoralComun
     *
     * @param integer $arteriaFemoralComun
     *
     * @return MiembrosInferioresArterialPatologico
     */
    public function setArteriaFemoralComun($arteriaFemoralComun)
    {
        $this->arteriaFemoralComun = $arteriaFemoralComun;

        return $this;
    }

    /**
     * Get arteriaFemoralComun
     *
     * @return integer
     */
    public function getArteriaFemoralComun()
    {
        return $this->arteriaFemoralComun;
    }

    /**
     * Set arteriaFemoralSuperficial
     *
     * @param integer $arteriaFemoralSuperficial
     *
     * @return MiembrosInferioresArterialPatologico
     */
    public function setArteriaFemoralSuperficial($arteriaFemoralSuperficial)
    {
        $this->arteriaFemoralSuperficial = $arteriaFemoralSuperficial;

        return $this;
    }

    /**
     * Get arteriaFemoralSuperficial
     *
     * @return integer
     */
    public function getArteriaFemoralSuperficial()
    {
        return $this->arteriaFemoralSuperficial;
    }

    /**
     * Set arteriaPoplitea
     *
     * @param integer $arteriaPoplitea
     *
     * @return MiembrosInferioresArterialPatologico
     */
    public function setArteriaPoplitea($arteriaPoplitea)
    {
        $this->arteriaPoplitea = $arteriaPoplitea;

        return $this;
    }

    /**
     * Get arteriaPoplitea
     *
     * @return integer
     */
    public function getArteriaPoplitea()
    {
        return $this->arteriaPoplitea;
    }

    /**
     * Set arteriaTibialAnterior
     *
     * @param integer $arteriaTibialAnterior
     *
     * @return MiembrosInferioresArterialPatologico
     */
    public function setArteriaTibialAnterior($arteriaTibialAnterior)
    {
        $this->arteriaTibialAnterior = $arteriaTibialAnterior;

        return $this;
    }

    /**
     * Get arteriaTibialAnterior
     *
     * @return integer
     */
    public function getArteriaTibialAnterior()
    {
        return $this->arteriaTibialAnterior;
    }

    /**
     * Set arteriaTibialPosterior
     *
     * @param integer $arteriaTibialPosterior
     *
     * @return MiembrosInferioresArterialPatologico
     */
    public function setArteriaTibialPosterior($arteriaTibialPosterior)
    {
        $this->arteriaTibialPosterior = $arteriaTibialPosterior;

        return $this;
    }

    /**
     * Get arteriaTibialPosterior
     *
     * @return integer
     */
    public function getArteriaTibialPosterior()
    {
        return $this->arteriaTibialPosterior;
    }

    /**
     * Set arteriaPeronea
     *
     * @param integer $arteriaPeronea
     *
     * @return MiembrosInferioresArterialPatologico
     */
    public function setArteriaPeronea($arteriaPeronea)
    {
        $this->arteriaPeronea = $arteriaPeronea;

        return $this;
    }

    /**
     * Get arteriaPeronea
     *
     * @return integer
     */
    public function getArteriaPeronea()
    {
        return $this->arteriaPeronea;
    }

    /**
     * Set arteria
     *
     * @param integer $arteria
     *
     * @return MiembrosInferioresArterialPatologico
     */
    public function setArteria($arteria)
    {
        $this->arteria = $arteria;

        return $this;
    }

    /**
     * Get arteria
     *
     * @return integer
     */
    public function getArteria()
    {
        return $this->arteria;
    }

    /**
     * Set flujosDistales
     *
     * @param integer $flujosDistales
     *
     * @return MiembrosInferioresArterialPatologico
     */
    public function setFlujosDistales($flujosDistales)
    {
        $this->flujosDistales = $flujosDistales;

        return $this;
    }

    /**
     * Get flujosDistales
     *
     * @return integer
     */
    public function getFlujosDistales()
    {
        return $this->flujosDistales;
    }

    /**
     * Set circulacionColateral
     *
     * @param integer $circulacionColateral
     *
     * @return MiembrosInferioresArterialPatologico
     */
    public function setCirculacionColateral($circulacionColateral)
    {
        $this->circulacionColateral = $circulacionColateral;

        return $this;
    }

    /**
     * Get circulacionColateral
     *
     * @return integer
     */
    public function getCirculacionColateral()
    {
        return $this->circulacionColateral;
    }

    /**
     * Set indiceTobilloBrazoDerecho
     *
     * @param integer $indiceTobilloBrazoDerecho
     *
     * @return MiembrosInferioresArterialPatologico
     */
    public function setIndiceTobilloBrazoDerecho($indiceTobilloBrazoDerecho)
    {
        $this->indiceTobilloBrazoDerecho = $indiceTobilloBrazoDerecho;

        return $this;
    }

    /**
     * Get indiceTobilloBrazoDerecho
     *
     * @return integer
     */
    public function getIndiceTobilloBrazoDerecho()
    {
        return $this->indiceTobilloBrazoDerecho;
    }

    /**
     * Set indiceTobilloBrazoIzquierdo
     *
     * @param integer $indiceTobilloBrazoIzquierdo
     *
     * @return MiembrosInferioresArterialPatologico
     */
    public function setIndiceTobilloBrazoIzquierdo($indiceTobilloBrazoIzquierdo)
    {
        $this->indiceTobilloBrazoIzquierdo = $indiceTobilloBrazoIzquierdo;

        return $this;
    }

    /**
     * Get indiceTobilloBrazoIzquierdo
     *
     * @return integer
     */
    public function getIndiceTobilloBrazoIzquierdo()
    {
        return $this->indiceTobilloBrazoIzquierdo;
    }
}
