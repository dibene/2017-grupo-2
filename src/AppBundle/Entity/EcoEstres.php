<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EcoEstres
 *
 * @ORM\Table(name="eco_estres")
 * @ORM\Entity
 */
class EcoEstres extends Estudio
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
     * @ORM\Column(name="informe_1_normal", type="integer", nullable=false)
     */
    private $informe1Normal;

    /**
     * @var integer
     *
     * @ORM\Column(name="informe_2_normal", type="integer", nullable=false)
     */
    private $informe2Normal;

    /**
     * @var integer
     *
     * @ORM\Column(name="informe_respuesta_isquemica_1", type="integer", nullable=false)
     */
    private $informeRespuestaIsquemica1;

    /**
     * @var integer
     *
     * @ORM\Column(name="informe_3_infarto_sin_isquemia", type="integer", nullable=false)
     */
    private $informe3InfartoSinIsquemia;
    public function __construct($medico,$paciente , $entityManager) {
      parent::__construct();
    //  $entityManager = $event->getEntityManager();
      $configuracion = $entityManager->getRepository('AppBundle:EstudioConfiguracion')->find(20);
      parent::setEstudioConfiguracion($configuracion);
      parent::setPaciente($paciente);
      parent::setMedico($medico);
    }
    /**
     * Set informe1Normal
     *
     * @param integer $informe1Normal
     * @return EcoEstres
     */
    public function setInforme1Normal($informe1Normal)
    {
        $this->informe1Normal = $informe1Normal;

        return $this;
    }

    /**
     * Get informe1Normal
     *
     * @return integer
     */
    public function getInforme1Normal()
    {
        return $this->informe1Normal;
    }

    /**
     * Set informe2Normal
     *
     * @param integer $informe2Normal
     * @return EcoEstres
     */
    public function setInforme2Normal($informe2Normal)
    {
        $this->informe2Normal = $informe2Normal;

        return $this;
    }

    /**
     * Get informe2Normal
     *
     * @return integer
     */
    public function getInforme2Normal()
    {
        return $this->informe2Normal;
    }

    /**
     * Set informeRespuestaIsquemica1
     *
     * @param integer $informeRespuestaIsquemica1
     * @return EcoEstres
     */
    public function setInformeRespuestaIsquemica1($informeRespuestaIsquemica1)
    {
        $this->informeRespuestaIsquemica1 = $informeRespuestaIsquemica1;

        return $this;
    }

    /**
     * Get informeRespuestaIsquemica1
     *
     * @return integer
     */
    public function getInformeRespuestaIsquemica1()
    {
        return $this->informeRespuestaIsquemica1;
    }

    /**
     * Set informe3InfartoSinIsquemia
     *
     * @param integer $informe3InfartoSinIsquemia
     * @return EcoEstres
     */
    public function setInforme3InfartoSinIsquemia($informe3InfartoSinIsquemia)
    {
        $this->informe3InfartoSinIsquemia = $informe3InfartoSinIsquemia;

        return $this;
    }

    /**
     * Get informe3InfartoSinIsquemia
     *
     * @return integer
     */
    public function getInforme3InfartoSinIsquemia()
    {
        return $this->informe3InfartoSinIsquemia;
    }
}
