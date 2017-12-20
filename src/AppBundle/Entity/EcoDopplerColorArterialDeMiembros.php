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
     * @ORM\Column(name="arteriafemoral_comun", type="integer", nullable=false)
     */
    private $arteriafemoralComun;

    /**
     * @var integer
     *
     * @ORM\Column(name="arteria_femoral_superficial", type="integer", nullable=false)
     */
    private $arteriaFemoralSuperficial;

    /**
     * @var integer
     *
     * @ORM\Column(name="arteria_poplitea", type="integer", nullable=false)
     */
    private $arteriaPoplitea;

    /**
     * @var integer
     *
     * @ORM\Column(name="arteria_tibial_anterior", type="integer", nullable=false)
     */
    private $arteriaTibialAnterior;

    /**
     * @var integer
     *
     * @ORM\Column(name="arteria_tibial_posterior", type="integer", nullable=false)
     */
    private $arteriaTibialPosterior;


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
}
