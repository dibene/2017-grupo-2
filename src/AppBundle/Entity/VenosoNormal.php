<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VenosoNormal
 *
 * @ORM\Table(name="venoso_normal")
 * @ORM\Entity
 */
class VenosoNormal extends Estudio
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
     * @ORM\Column(name="vena_safena_interna_izq", type="integer", nullable=false)
     */
    private $venaSafenaInternaIzq;

    /**
     * @var integer
     *
     * @ORM\Column(name="diametro_VSI_izq", type="integer", nullable=false)
     */
    private $diametroVSIIzq;

    /**
     * @var integer
     *
     * @ORM\Column(name="vena_safena_externa_izq", type="integer", nullable=false)
     */
    private $venaSafenaExternaIzq;

    /**
     * @var integer
     *
     * @ORM\Column(name="diametro_VSE_izq", type="integer", nullable=false)
     */
    private $diametroVSEIzq;


    /**
     * @var integer
     *
     * @ORM\Column(name="vena_safena_interna_der", type="integer", nullable=false)
     */
    private $venaSafenaInternaDer;

    /**
     * @var integer
     *
     * @ORM\Column(name="diametro_VSI_der", type="integer", nullable=false)
     */
    private $diametroVSIDer;

    /**
     * @var integer
     *
     * @ORM\Column(name="vena_safena_externa_der", type="integer", nullable=false)
     */
    private $venaSafenaExternaDer;

    /**
     * @var integer
     *
     * @ORM\Column(name="diametro_VSE_der", type="integer", nullable=false)
     */
    private $diametroVSEDer;

    public function __construct($medico,$paciente , $entityManager) {
      parent::__construct();
    //  $entityManager = $event->getEntityManager();
      $configuracion = $entityManager->getRepository('AppBundle:EstudioConfiguracion')->find(21);
      parent::setEstudioConfiguracion($configuracion);
      parent::setPaciente($paciente);
      parent::setMedico($medico);
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

    /**
     * Set venaSafenaInternaIzq
     *
     * @param integer $venaSafenaInternaIzq
     *
     * @return VenosoNormal
     */
    public function setVenaSafenaInternaIzq($venaSafenaInternaIzq)
    {
        $this->venaSafenaInternaIzq = $venaSafenaInternaIzq;

        return $this;
    }

    /**
     * Get venaSafenaInternaIzq
     *
     * @return integer
     */
    public function getVenaSafenaInternaIzq()
    {
        return $this->venaSafenaInternaIzq;
    }

    /**
     * Set diametroVSIIzq
     *
     * @param integer $diametroVSIIzq
     *
     * @return VenosoNormal
     */
    public function setDiametroVSIIzq($diametroVSIIzq)
    {
        $this->diametroVSIIzq = $diametroVSIIzq;

        return $this;
    }

    /**
     * Get diametroVSIIzq
     *
     * @return integer
     */
    public function getDiametroVSIIzq()
    {
        return $this->diametroVSIIzq;
    }

    /**
     * Set venaSafenaExternaIzq
     *
     * @param integer $venaSafenaExternaIzq
     *
     * @return VenosoNormal
     */
    public function setVenaSafenaExternaIzq($venaSafenaExternaIzq)
    {
        $this->venaSafenaExternaIzq = $venaSafenaExternaIzq;

        return $this;
    }

    /**
     * Get venaSafenaExternaIzq
     *
     * @return integer
     */
    public function getVenaSafenaExternaIzq()
    {
        return $this->venaSafenaExternaIzq;
    }

    /**
     * Set diametroVSEIzq
     *
     * @param integer $diametroVSEIzq
     *
     * @return VenosoNormal
     */
    public function setDiametroVSEIzq($diametroVSEIzq)
    {
        $this->diametroVSEIzq = $diametroVSEIzq;

        return $this;
    }

    /**
     * Get diametroVSEIzq
     *
     * @return integer
     */
    public function getDiametroVSEIzq()
    {
        return $this->diametroVSEIzq;
    }

    /**
     * Set venaSafenaInternaDer
     *
     * @param integer $venaSafenaInternaDer
     *
     * @return VenosoNormal
     */
    public function setVenaSafenaInternaDer($venaSafenaInternaDer)
    {
        $this->venaSafenaInternaDer = $venaSafenaInternaDer;

        return $this;
    }

    /**
     * Get venaSafenaInternaDer
     *
     * @return integer
     */
    public function getVenaSafenaInternaDer()
    {
        return $this->venaSafenaInternaDer;
    }

    /**
     * Set diametroVSIDer
     *
     * @param integer $diametroVSIDer
     *
     * @return VenosoNormal
     */
    public function setDiametroVSIDer($diametroVSIDer)
    {
        $this->diametroVSIDer = $diametroVSIDer;

        return $this;
    }

    /**
     * Get diametroVSIDer
     *
     * @return integer
     */
    public function getDiametroVSIDer()
    {
        return $this->diametroVSIDer;
    }

    /**
     * Set venaSafenaExternaDer
     *
     * @param integer $venaSafenaExternaDer
     *
     * @return VenosoNormal
     */
    public function setVenaSafenaExternaDer($venaSafenaExternaDer)
    {
        $this->venaSafenaExternaDer = $venaSafenaExternaDer;

        return $this;
    }

    /**
     * Get venaSafenaExternaDer
     *
     * @return integer
     */
    public function getVenaSafenaExternaDer()
    {
        return $this->venaSafenaExternaDer;
    }

    /**
     * Set diametroVSEDer
     *
     * @param integer $diametroVSEDer
     *
     * @return VenosoNormal
     */
    public function setDiametroVSEDer($diametroVSEDer)
    {
        $this->diametroVSEDer = $diametroVSEDer;

        return $this;
    }

    /**
     * Get diametroVSEDer
     *
     * @return integer
     */
    public function getDiametroVSEDer()
    {
        return $this->diametroVSEDer;
    }
}
