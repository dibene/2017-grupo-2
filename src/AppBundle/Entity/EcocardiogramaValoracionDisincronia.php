<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EcocardiogramaValoracionDisincronia
 *
 * @ORM\Table(name="ecocardiograma_valoracion_disincronia")
 * @ORM\Entity
 */
class EcocardiogramaValoracionDisincronia extends Estudio
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
     * @ORM\Column(name="retraso_septal_pp", type="integer", nullable=false)
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
     * @ORM\Column(name="duracion_total_de_r_r", type="integer", nullable=false)
     */
    private $duracionTotalDeRR;
    
    public function __construct($medico,$paciente , $entityManager) {
      parent::__construct();
    //  $entityManager = $event->getEntityManager();
      $configuracion = $entityManager->getRepository('AppBundle:EstudioConfiguracion')->find(15);
      parent::setEstudioConfiguracion($configuracion);
      parent::setPaciente($paciente);
      parent::setMedico($medico);
    }

    /**
     * Set retrasoSeptalPp
     *
     * @param integer $retrasoSeptalPp
     * @return EcocardiogramaValoracionDisincronia
     */
    public function setRetrasoSeptalPp($retrasoSeptalPp)
    {
        $this->retrasoSeptalPp = $retrasoSeptalPp;

        return $this;
    }

    /**
     * Get retrasoSeptalPp
     *
     * @return integer
     */
    public function getRetrasoSeptalPp()
    {
        return $this->retrasoSeptalPp;
    }

    /**
     * Set tiempoAlPicoSistolico
     *
     * @param integer $tiempoAlPicoSistolico
     * @return EcocardiogramaValoracionDisincronia
     */
    public function setTiempoAlPicoSistolico($tiempoAlPicoSistolico)
    {
        $this->tiempoAlPicoSistolico = $tiempoAlPicoSistolico;

        return $this;
    }

    /**
     * Get tiempoAlPicoSistolico
     *
     * @return integer
     */
    public function getTiempoAlPicoSistolico()
    {
        return $this->tiempoAlPicoSistolico;
    }

    /**
     * Set tiempoAlPicoDeDeformacion
     *
     * @param integer $tiempoAlPicoDeDeformacion
     * @return EcocardiogramaValoracionDisincronia
     */
    public function setTiempoAlPicoDeDeformacion($tiempoAlPicoDeDeformacion)
    {
        $this->tiempoAlPicoDeDeformacion = $tiempoAlPicoDeDeformacion;

        return $this;
    }

    /**
     * Get tiempoAlPicoDeDeformacion
     *
     * @return integer
     */
    public function getTiempoAlPicoDeDeformacion()
    {
        return $this->tiempoAlPicoDeDeformacion;
    }

    /**
     * Set diferenciaEntreLosPeriodosPreEyectivos
     *
     * @param integer $diferenciaEntreLosPeriodosPreEyectivos
     * @return EcocardiogramaValoracionDisincronia
     */
    public function setDiferenciaEntreLosPeriodosPreEyectivos($diferenciaEntreLosPeriodosPreEyectivos)
    {
        $this->diferenciaEntreLosPeriodosPreEyectivos = $diferenciaEntreLosPeriodosPreEyectivos;

        return $this;
    }

    /**
     * Get diferenciaEntreLosPeriodosPreEyectivos
     *
     * @return integer
     */
    public function getDiferenciaEntreLosPeriodosPreEyectivos()
    {
        return $this->diferenciaEntreLosPeriodosPreEyectivos;
    }

    /**
     * Set duracionTotalDeRR
     *
     * @param integer $duracionTotalDeRR
     * @return EcocardiogramaValoracionDisincronia
     */
    public function setDuracionTotalDeRR($duracionTotalDeRR)
    {
        $this->duracionTotalDeRR = $duracionTotalDeRR;

        return $this;
    }

    /**
     * Get duracionTotalDeRR
     *
     * @return integer
     */
    public function getDuracionTotalDeRR()
    {
        return $this->duracionTotalDeRR;
    }
}
