<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EcoDopplerColorArterialDeMiembros
 *
 * @ORM\Table(name="eco_doppler_color_arterial_de_miembros")
 * @ORM\Entity
 */
class EcoDopplerColorArterialDeMiembros extends Estudio
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
     * @ORM\Column(name="arteriafemoral_comun_izq", type="integer", nullable=false)
     */
    private $arteriafemoralComunIzq;

    /**
     * @var integer
     *
     * @ORM\Column(name="arteria_femoral_superficial_izq", type="integer", nullable=false)
     */
    private $arteriaFemoralSuperficialIzq;

    /**
     * @var integer
     *
     * @ORM\Column(name="arteria_poplitea_izq", type="integer", nullable=false)
     */
    private $arteriaPopliteaIzq;

    /**
     * @var integer
     *
     * @ORM\Column(name="arteria_tibial_anterior_izq", type="integer", nullable=false)
     */
    private $arteriaTibialAnteriorIzq;

    /**
     * @var integer
     *
     * @ORM\Column(name="arteria_tibial_posterior_izq", type="integer", nullable=false)
     */
    private $arteriaTibialPosteriorIzq;

    /**
     * @var integer
     *
     * @ORM\Column(name="arteriafemoral_comun_der", type="integer", nullable=false)
     */
    private $arteriafemoralComunDer;

    /**
     * @var integer
     *
     * @ORM\Column(name="arteria_femoral_superficial_der", type="integer", nullable=false)
     */
    private $arteriaFemoralSuperficialDer;

    /**
     * @var integer
     *
     * @ORM\Column(name="arteria_poplitea_der", type="integer", nullable=false)
     */
    private $arteriaPopliteaDer;

    /**
     * @var integer
     *
     * @ORM\Column(name="arteria_tibial_anterior_der", type="integer", nullable=false)
     */
    private $arteriaTibialAnteriorDer;

    /**
     * @var integer
     *
     * @ORM\Column(name="arteria_tibial_posterior_der", type="integer", nullable=false)
     */
    private $arteriaTibialPosteriorDer;

    public function __construct($medico,$paciente , $entityManager) {
      parent::__construct();
    //  $entityManager = $event->getEntityManager();
      $configuracion = $entityManager->getRepository('AppBundle:EstudioConfiguracion')->find(16);
      parent::setEstudioConfiguracion($configuracion);
      parent::setPaciente($paciente);
      parent::setMedico($medico);
    }

    /**
     * Set arteriafemoralComun
     *
     * @param integer $arteriafemoralComun
     * @return EcoDopplerColorArterialDeMiembros
     */
    public function setArteriafemoralComun($arteriafemoralComun)
    {
        $this->arteriafemoralComun = $arteriafemoralComun;

        return $this;
    }

    /**
     * Get arteriafemoralComun
     *
     * @return integer
     */
    public function getArteriafemoralComun()
    {
        return $this->arteriafemoralComun;
    }

    /**
     * Set arteriaFemoralSuperficial
     *
     * @param integer $arteriaFemoralSuperficial
     * @return EcoDopplerColorArterialDeMiembros
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
     * @return EcoDopplerColorArterialDeMiembros
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
     * @return EcoDopplerColorArterialDeMiembros
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
     * @return EcoDopplerColorArterialDeMiembros
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
     * Set arteriafemoralComunIzq
     *
     * @param integer $arteriafemoralComunIzq
     *
     * @return EcoDopplerColorArterialDeMiembros
     */
    public function setArteriafemoralComunIzq($arteriafemoralComunIzq)
    {
        $this->arteriafemoralComunIzq = $arteriafemoralComunIzq;

        return $this;
    }

    /**
     * Get arteriafemoralComunIzq
     *
     * @return integer
     */
    public function getArteriafemoralComunIzq()
    {
        return $this->arteriafemoralComunIzq;
    }

    /**
     * Set arteriaFemoralSuperficialIzq
     *
     * @param integer $arteriaFemoralSuperficialIzq
     *
     * @return EcoDopplerColorArterialDeMiembros
     */
    public function setArteriaFemoralSuperficialIzq($arteriaFemoralSuperficialIzq)
    {
        $this->arteriaFemoralSuperficialIzq = $arteriaFemoralSuperficialIzq;

        return $this;
    }

    /**
     * Get arteriaFemoralSuperficialIzq
     *
     * @return integer
     */
    public function getArteriaFemoralSuperficialIzq()
    {
        return $this->arteriaFemoralSuperficialIzq;
    }

    /**
     * Set arteriaPopliteaIzq
     *
     * @param integer $arteriaPopliteaIzq
     *
     * @return EcoDopplerColorArterialDeMiembros
     */
    public function setArteriaPopliteaIzq($arteriaPopliteaIzq)
    {
        $this->arteriaPopliteaIzq = $arteriaPopliteaIzq;

        return $this;
    }

    /**
     * Get arteriaPopliteaIzq
     *
     * @return integer
     */
    public function getArteriaPopliteaIzq()
    {
        return $this->arteriaPopliteaIzq;
    }

    /**
     * Set arteriaTibialAnteriorIzq
     *
     * @param integer $arteriaTibialAnteriorIzq
     *
     * @return EcoDopplerColorArterialDeMiembros
     */
    public function setArteriaTibialAnteriorIzq($arteriaTibialAnteriorIzq)
    {
        $this->arteriaTibialAnteriorIzq = $arteriaTibialAnteriorIzq;

        return $this;
    }

    /**
     * Get arteriaTibialAnteriorIzq
     *
     * @return integer
     */
    public function getArteriaTibialAnteriorIzq()
    {
        return $this->arteriaTibialAnteriorIzq;
    }

    /**
     * Set arteriaTibialPosteriorIzq
     *
     * @param integer $arteriaTibialPosteriorIzq
     *
     * @return EcoDopplerColorArterialDeMiembros
     */
    public function setArteriaTibialPosteriorIzq($arteriaTibialPosteriorIzq)
    {
        $this->arteriaTibialPosteriorIzq = $arteriaTibialPosteriorIzq;

        return $this;
    }

    /**
     * Get arteriaTibialPosteriorIzq
     *
     * @return integer
     */
    public function getArteriaTibialPosteriorIzq()
    {
        return $this->arteriaTibialPosteriorIzq;
    }

    /**
     * Set arteriafemoralComunDer
     *
     * @param integer $arteriafemoralComunDer
     *
     * @return EcoDopplerColorArterialDeMiembros
     */
    public function setArteriafemoralComunDer($arteriafemoralComunDer)
    {
        $this->arteriafemoralComunDer = $arteriafemoralComunDer;

        return $this;
    }

    /**
     * Get arteriafemoralComunDer
     *
     * @return integer
     */
    public function getArteriafemoralComunDer()
    {
        return $this->arteriafemoralComunDer;
    }

    /**
     * Set arteriaFemoralSuperficialDer
     *
     * @param integer $arteriaFemoralSuperficialDer
     *
     * @return EcoDopplerColorArterialDeMiembros
     */
    public function setArteriaFemoralSuperficialDer($arteriaFemoralSuperficialDer)
    {
        $this->arteriaFemoralSuperficialDer = $arteriaFemoralSuperficialDer;

        return $this;
    }

    /**
     * Get arteriaFemoralSuperficialDer
     *
     * @return integer
     */
    public function getArteriaFemoralSuperficialDer()
    {
        return $this->arteriaFemoralSuperficialDer;
    }

    /**
     * Set arteriaPopliteaDer
     *
     * @param integer $arteriaPopliteaDer
     *
     * @return EcoDopplerColorArterialDeMiembros
     */
    public function setArteriaPopliteaDer($arteriaPopliteaDer)
    {
        $this->arteriaPopliteaDer = $arteriaPopliteaDer;

        return $this;
    }

    /**
     * Get arteriaPopliteaDer
     *
     * @return integer
     */
    public function getArteriaPopliteaDer()
    {
        return $this->arteriaPopliteaDer;
    }

    /**
     * Set arteriaTibialAnteriorDer
     *
     * @param integer $arteriaTibialAnteriorDer
     *
     * @return EcoDopplerColorArterialDeMiembros
     */
    public function setArteriaTibialAnteriorDer($arteriaTibialAnteriorDer)
    {
        $this->arteriaTibialAnteriorDer = $arteriaTibialAnteriorDer;

        return $this;
    }

    /**
     * Get arteriaTibialAnteriorDer
     *
     * @return integer
     */
    public function getArteriaTibialAnteriorDer()
    {
        return $this->arteriaTibialAnteriorDer;
    }

    /**
     * Set arteriaTibialPosteriorDer
     *
     * @param integer $arteriaTibialPosteriorDer
     *
     * @return EcoDopplerColorArterialDeMiembros
     */
    public function setArteriaTibialPosteriorDer($arteriaTibialPosteriorDer)
    {
        $this->arteriaTibialPosteriorDer = $arteriaTibialPosteriorDer;

        return $this;
    }

    /**
     * Get arteriaTibialPosteriorDer
     *
     * @return integer
     */
    public function getArteriaTibialPosteriorDer()
    {
        return $this->arteriaTibialPosteriorDer;
    }
}
