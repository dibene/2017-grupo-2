<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MiembrosSuperioresArterialNormal
 *
 * @ORM\Table(name="miembros_superiores_arterial_normal")
 * @ORM\Entity
 */
class MiembrosSuperioresArterialNormal extends Estudio
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
     * @ORM\Column(name="velocidad_pico_sistolica", type="integer", nullable=false)
     */
    private $velocidadPicoSistolica;

    /**
     * @var integer
     *
     * @ORM\Column(name="indice_de_pre_estenosis", type="integer", nullable=false)
     */
    private $indiceDePreEstenosis;

    /**
     * Set extension
     *
     * @param integer $extension
     * @return MiembrosSuperioresArterialNormal
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
     * Set velocidadPicoSistolica
     *
     * @param integer $velocidadPicoSistolica
     * @return MiembrosSuperioresArterialNormal
     */
    public function setVelocidadPicoSistolica($velocidadPicoSistolica)
    {
        $this->velocidadPicoSistolica = $velocidadPicoSistolica;

        return $this;
    }

    /**
     * Get velocidadPicoSistolica
     *
     * @return integer
     */
    public function getVelocidadPicoSistolica()
    {
        return $this->velocidadPicoSistolica;
    }

    /**
     * Set indiceDePreEstenosis
     *
     * @param integer $indiceDePreEstenosis
     * @return MiembrosSuperioresArterialNormal
     */
    public function setIndiceDePreEstenosis($indiceDePreEstenosis)
    {
        $this->indiceDePreEstenosis = $indiceDePreEstenosis;

        return $this;
    }

    /**
     * Get indiceDePreEstenosis
     *
     * @return integer
     */
    public function getIndiceDePreEstenosis()
    {
        return $this->indiceDePreEstenosis;
    }
}
