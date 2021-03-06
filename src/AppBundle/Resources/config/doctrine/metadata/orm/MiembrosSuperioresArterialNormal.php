<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * MiembrosSuperioresArterialNormal
 *
 * @ORM\Table(name="miembros_superiores_arterial_normal")
 * @ORM\Entity
 */
class MiembrosSuperioresArterialNormal
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
     * @ORM\Column(name="indice_de_pre-estenosis", type="integer", nullable=false)
     */
    private $indiceDePreEstenosis;


}
