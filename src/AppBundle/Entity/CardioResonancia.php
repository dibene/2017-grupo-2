<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CardioResonancia
 *
 * @ORM\Table(name="cardio_resonancia")
 * @ORM\Entity
 */
class CardioResonancia extends Estudio
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
     * @ORM\Column(name="dtdvi", type="integer", nullable=false)
     */
    private $dtdvi;

    /**
     * @var integer
     *
     * @ORM\Column(name="dtsvi", type="integer", nullable=false)
     */
    private $dtsvi;

    /**
     * @var integer
     *
     * @ORM\Column(name="vfd", type="integer", nullable=false)
     */
    private $vfd;

    /**
     * @var integer
     *
     * @ORM\Column(name="vfs", type="integer", nullable=false)
     */
    private $vfs;

    /**
     * Set dtdvi
     *
     * @param integer $dtdvi
     * @return CardioResonancia
     */
    public function setDtdvi($dtdvi)
    {
        $this->dtdvi = $dtdvi;

        return $this;
    }

    /**
     * Get dtdvi
     *
     * @return integer
     */
    public function getDtdvi()
    {
        return $this->dtdvi;
    }

    /**
     * Set dtsvi
     *
     * @param integer $dtsvi
     * @return CardioResonancia
     */
    public function setDtsvi($dtsvi)
    {
        $this->dtsvi = $dtsvi;

        return $this;
    }

    /**
     * Get dtsvi
     *
     * @return integer
     */
    public function getDtsvi()
    {
        return $this->dtsvi;
    }

    /**
     * Set vfd
     *
     * @param integer $vfd
     * @return CardioResonancia
     */
    public function setVfd($vfd)
    {
        $this->vfd = $vfd;

        return $this;
    }

    /**
     * Get vfd
     *
     * @return integer
     */
    public function getVfd()
    {
        return $this->vfd;
    }

    /**
     * Set vfs
     *
     * @param integer $vfs
     * @return CardioResonancia
     */
    public function setVfs($vfs)
    {
        $this->vfs = $vfs;

        return $this;
    }

    /**
     * Get vfs
     *
     * @return integer
     */
    public function getVfs()
    {
        return $this->vfs;
    }
}
