<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * MiembrosInferioresArterialPatologico
 *
 * @ORM\Table(name="miembros_inferiores_arterial_patologico")
 * @ORM\Entity
 */
class MiembrosInferioresArterialPatologico
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
     * @ORM\Column(name="velocidades", type="integer", nullable=false)
     */
    private $velocidades;

    /**
     * @var integer
     *
     * @ORM\Column(name="indice_pre_estenosis-estenosis", type="integer", nullable=false)
     */
    private $indicePreEstenosisEstenosis;


}
