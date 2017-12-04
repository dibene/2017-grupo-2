<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VenosoNormal
 *
 * @ORM\Table(name="venoso_normal")
 * @ORM\Entity
 */
class VenosoNormal
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
     * @ORM\Column(name="id_estudio", type="integer", nullable=false)
     */
    private $idEstudio;

    /**
     * @var integer
     *
     * @ORM\Column(name="vena_safena_interna", type="integer", nullable=false)
     */
    private $venaSafenaInterna;

    /**
     * @var integer
     *
     * @ORM\Column(name="diametro", type="integer", nullable=false)
     */
    private $diametro;

    /**
     * @var integer
     *
     * @ORM\Column(name="vena_safena_externa", type="integer", nullable=false)
     */
    private $venaSafenaExterna;



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
     * Set idEstudio
     *
     * @param integer $idEstudio
     * @return VenosoNormal
     */
    public function setIdEstudio($idEstudio)
    {
        $this->idEstudio = $idEstudio;

        return $this;
    }

    /**
     * Get idEstudio
     *
     * @return integer 
     */
    public function getIdEstudio()
    {
        return $this->idEstudio;
    }

    /**
     * Set venaSafenaInterna
     *
     * @param integer $venaSafenaInterna
     * @return VenosoNormal
     */
    public function setVenaSafenaInterna($venaSafenaInterna)
    {
        $this->venaSafenaInterna = $venaSafenaInterna;

        return $this;
    }

    /**
     * Get venaSafenaInterna
     *
     * @return integer 
     */
    public function getVenaSafenaInterna()
    {
        return $this->venaSafenaInterna;
    }

    /**
     * Set diametro
     *
     * @param integer $diametro
     * @return VenosoNormal
     */
    public function setDiametro($diametro)
    {
        $this->diametro = $diametro;

        return $this;
    }

    /**
     * Get diametro
     *
     * @return integer 
     */
    public function getDiametro()
    {
        return $this->diametro;
    }

    /**
     * Set venaSafenaExterna
     *
     * @param integer $venaSafenaExterna
     * @return VenosoNormal
     */
    public function setVenaSafenaExterna($venaSafenaExterna)
    {
        $this->venaSafenaExterna = $venaSafenaExterna;

        return $this;
    }

    /**
     * Get venaSafenaExterna
     *
     * @return integer 
     */
    public function getVenaSafenaExterna()
    {
        return $this->venaSafenaExterna;
    }
}