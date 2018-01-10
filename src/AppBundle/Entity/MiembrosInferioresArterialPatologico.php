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
     * @var string
     *
     * @ORM\Column(name="arteria_femoral_comun_izq", type="text", length=65535, nullable=false)
     */
    private $arteriaFemoralComunIzq;

    /**
     * @var string
     *
     * @ORM\Column(name="arteria_femoral_superficial_izq", type="text", length=65535, nullable=false)
     */
    private $arteriaFemoralSuperficialIzq;

    /**
     * @var string
     *
     * @ORM\Column(name="arteria_poplitea_izq", type="text", length=65535, nullable=false)
     */
    private $arteriaPopliteaIzq;

    /**
     * @var string
     *
     * @ORM\Column(name="arteria_tibial_anterior_izq", type="text", length=65535, nullable=false)
     */
    private $arteriaTibialAnteriorIzq;

    /**
     * @var string
     *
     * @ORM\Column(name="arteria_tibial_posterior_izq", type="text", length=65535, nullable=false)
     */
    private $arteriaTibialPosteriorIzq;

    /**
     * @var string
     *
     * @ORM\Column(name="arteria_peronea_izq", type="text", length=65535, nullable=false)
     */
    private $arteriaPeroneaIzq;

    /**
     * @var string
     *
     * @ORM\Column(name="arteria_femoral_comun_der", type="text", length=65535, nullable=false)
     */
    private $arteriaFemoralComunDer;

    /**
     * @var string
     *
     * @ORM\Column(name="arteria_femoral_superficial_der", type="text", length=65535, nullable=false)
     */
    private $arteriaFemoralSuperficialDer;

    /**
     * @var string
     *
     * @ORM\Column(name="arteria_poplitea_der", type="text", length=65535, nullable=false)
     */
    private $arteriaPopliteaDer;

    /**
     * @var string
     *
     * @ORM\Column(name="arteria_tibial_anterior_der", type="text", length=65535, nullable=false)
     */
    private $arteriaTibialAnteriorDer;

    /**
     * @var string
     *
     * @ORM\Column(name="arteria_tibial_posterior_der", type="text", length=65535, nullable=false)
     */
    private $arteriaTibialPosteriorDer;

    /**
     * @var string
     *
     * @ORM\Column(name="arteria_peronea_der", type="text", length=65535, nullable=false)
     */
    private $arteriaPeroneaDer;

    public function __construct($medico,$paciente , $entityManager) {
      parent::__construct();
    //  $entityManager = $event->getEntityManager();
      $configuracion = $entityManager->getRepository('AppBundle:EstudioConfiguracion')->find(18);
      parent::setEstudioConfiguracion($configuracion);
      parent::setPaciente($paciente);
      parent::setMedico($medico);
    }

    /**
     * Set arteriaFemoralComunIzq
     *
     * @param integer $arteriaFemoralComunIzq
     *
     * @return MiembrosInferioresArterialPatologico
     */
    public function setArteriaFemoralComunIzq($arteriaFemoralComunIzq)
    {
        $this->arteriaFemoralComunIzq = $arteriaFemoralComunIzq;

        return $this;
    }

    /**
     * Get arteriaFemoralComunIzq
     *
     * @return integer
     */
    public function getArteriaFemoralComunIzq()
    {
        return $this->arteriaFemoralComunIzq;
    }

    /**
     * Set arteriaFemoralSuperficialIzq
     *
     * @param integer $arteriaFemoralSuperficialIzq
     *
     * @return MiembrosInferioresArterialPatologico
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
     * @return MiembrosInferioresArterialPatologico
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
     * @return MiembrosInferioresArterialPatologico
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
     * @return MiembrosInferioresArterialPatologico
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
     * Set arteriaPeroneaIzq
     *
     * @param integer $arteriaPeroneaIzq
     *
     * @return MiembrosInferioresArterialPatologico
     */
    public function setArteriaPeroneaIzq($arteriaPeroneaIzq)
    {
        $this->arteriaPeroneaIzq = $arteriaPeroneaIzq;

        return $this;
    }

    /**
     * Get arteriaPeroneaIzq
     *
     * @return integer
     */
    public function getArteriaPeroneaIzq()
    {
        return $this->arteriaPeroneaIzq;
    }

    /**
     * Set arteriaFemoralComunDer
     *
     * @param integer $arteriaFemoralComunDer
     *
     * @return MiembrosInferioresArterialPatologico
     */
    public function setArteriaFemoralComunDer($arteriaFemoralComunDer)
    {
        $this->arteriaFemoralComunDer = $arteriaFemoralComunDer;

        return $this;
    }

    /**
     * Get arteriaFemoralComunDer
     *
     * @return integer
     */
    public function getArteriaFemoralComunDer()
    {
        return $this->arteriaFemoralComunDer;
    }

    /**
     * Set arteriaFemoralSuperficialDer
     *
     * @param integer $arteriaFemoralSuperficialDer
     *
     * @return MiembrosInferioresArterialPatologico
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
     * @return MiembrosInferioresArterialPatologico
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
     * @return MiembrosInferioresArterialPatologico
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
     * @return MiembrosInferioresArterialPatologico
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

    /**
     * Set arteriaPeroneaDer
     *
     * @param integer $arteriaPeroneaDer
     *
     * @return MiembrosInferioresArterialPatologico
     */
    public function setArteriaPeroneaDer($arteriaPeroneaDer)
    {
        $this->arteriaPeroneaDer = $arteriaPeroneaDer;

        return $this;
    }

    /**
     * Get arteriaPeroneaDer
     *
     * @return integer
     */
    public function getArteriaPeroneaDer()
    {
        return $this->arteriaPeroneaDer;
    }
}
