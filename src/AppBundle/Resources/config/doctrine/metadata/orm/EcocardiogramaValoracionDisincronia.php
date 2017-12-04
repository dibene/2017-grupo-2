<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * EcocardiogramaValoracionDisincronia
 *
 * @ORM\Table(name="ecocardiograma_valoracion_disincronia")
 * @ORM\Entity
 */
class EcocardiogramaValoracionDisincronia
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
     * @ORM\Column(name="retraso_septal-pp", type="integer", nullable=false)
     */
    private $retrasoSeptalPp;

    /**
     * @var integer
     *
     * @ORM\Column(name="tiempo_al_pico_sistolico", type="integer", nullable=false)
     */
    private $tiempoAlPicoSistolico;

    /**
     * @var integer
     *
     * @ORM\Column(name="tiempo_al_pico_de_deformacion", type="integer", nullable=false)
     */
    private $tiempoAlPicoDeDeformacion;

    /**
     * @var integer
     *
     * @ORM\Column(name="diferencia_entre_los_periodos_pre_eyectivos", type="integer", nullable=false)
     */
    private $diferenciaEntreLosPeriodosPreEyectivos;

    /**
     * @var integer
     *
     * @ORM\Column(name="duracion_total_de_r-r", type="integer", nullable=false)
     */
    private $duracionTotalDeRR;


}
