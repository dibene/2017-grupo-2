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
