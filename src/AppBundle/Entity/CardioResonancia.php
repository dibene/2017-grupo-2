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
     * @var text
     *
     * @ORM\Column(name="protocolo", type="text", nullable=true)
     */
    private $protocolo;

    // CAVIDADES IZQUIERDAS
    // VENTRICULO IZQUIERDO

    /**
     * @var integer
     *
     * @ORM\Column(name="$descripcion_vi", type="integer", nullable=true)
     */
    private $descripcionVI;

    /**
     * @var integer
     *
     * @ORM\Column(name="dtdvi", type="integer", nullable=true)
     */
    private $dtdvi;

    /**
     * @var integer
     *
     * @ORM\Column(name="dtsvi", type="integer", nullable=true)
     */
    private $dtsvi;

    /**
     * @var integer
     *
     * @ORM\Column(name="vfd", type="integer", nullable=true)
     */
    private $vfd;

    /**
     * @var integer
     *
     * @ORM\Column(name="vfs", type="integer", nullable=true)
     */
    private $vfs;

    /**
     * @var integer
     *
     * @ORM\Column(name="fac", type="integer", nullable=true)
     */
    private $fac;

    /**
     * @var integer
     *
     * @ORM\Column(name="fevi", type="integer", nullable=true)
     */
    private $fevi;

    /**
     * @var integer
     *
     * @ORM\Column(name="septum", type="integer", nullable=true)
     */
    private $septum;

    /**
     * @var integer
     *
     * @ORM\Column(name="pp", type="integer", nullable=true)
     */
    private $pp;

    /**
     * @var integer
     *
     * @ORM\Column(name="masa_vi", type="integer", nullable=true)
     */
    private $masaVI;

    //PLANIMETRIA DE AI
    /**
     * @var integer
     *
     * @ORM\Column(name="area_ai", type="integer", nullable=true)
     */
    private $areaAI;

    /**
     * @var integer
     *
     * @ORM\Column(name="volumen_ai", type="integer", nullable=true)
     */
    private $volumenAI;

    /**
     * @var integer
     *
     * @ORM\Column(name="cuatro_camaras_ai", type="integer", nullable=true)
     */
    private $cuatroCamarasAI;

    //CAVIDADES DERECHAS

    //  VENTRICULO DERECHO
    /**
     * @var integer
     *
     * @ORM\Column(name="tapse_lateral", type="integer", nullable=true)
     */
    private $tapseLateral;

    /**
     * @var integer
     *
     * @ORM\Column(name="vfd_vd", type="integer", nullable=true)
     */
    private $vfdVD;

    /**
     * @var integer
     *
     * @ORM\Column(name="vfs_vd", type="integer", nullable=true)
     */
    private $vfsVD;

    /**
     * @var integer
     *
     * @ORM\Column(name="fevd", type="integer", nullable=true)
     */
    private $fevd;


        //Diametros:
    /**
     * @var integer
     *
     * @ORM\Column(name="longitudinal", type="integer", nullable=true)
     */
    private $longitudinal;

    /**
     * @var integer
     *
     * @ORM\Column(name="anillo_tricuspideo", type="integer", nullable=true)
     */
    private $anilloTricuspideo;

    /**
     * @var integer
     *
     * @ORM\Column(name="transversal_subtricuspideo", type="integer", nullable=true)
     */
    private $transversalSubtricuspideo;

    /**
     * @var integer
     *
     * @ORM\Column(name="transversal_medio", type="integer", nullable=true)
     */
    private $transversalMedio;

    /**
     * @var integer
     *
     * @ORM\Column(name="tsvd", type="integer", nullable=true)
     */
    private $tsvd;

    //    PLANIMETRIA AURICULA DERECHA:
    /**
     * @var integer
     *
     * @ORM\Column(name="area_ad", type="integer", nullable=true)
     */
    private $areaAD;

    /**
     * @var integer
     *
     * @ORM\Column(name="volumen_ad", type="integer", nullable=true)
     */
    private $volumenAD;

    /**
     * @var integer
     *
     * @ORM\Column(name="cuatro_camaras_ad", type="integer", nullable=true)
     */
    private $cuatroCamarasAD;

//secuencias
    /**
     * @var integer
     *
     * @ORM\Column(name="secuencias", type="text", nullable=true)
     */
    private $secuencias;

    public function __construct($medico,$paciente , $entityManager) {
      parent::__construct();
    //  $entityManager = $event->getEntityManager();
      $configuracion = $entityManager->getRepository('AppBundle:EstudioConfiguracion')->find(17);
      parent::setEstudioConfiguracion($configuracion);
      parent::setPaciente($paciente);
      parent::setMedico($medico);
    }
    /**
     * Set protocolo
     *
     * @param string $protocolo
     *
     * @return CardioResonancia
     */
    public function setProtocolo($protocolo)
    {
        $this->protocolo = $protocolo;

        return $this;
    }

    /**
     * Get protocolo
     *
     * @return string
     */
    public function getProtocolo()
    {
        return $this->protocolo;
    }

    /**
     * Set descripcionVI
     *
     * @param integer $descripcionVI
     *
     * @return CardioResonancia
     */
    public function setDescripcionVI($descripcionVI)
    {
        $this->descripcionVI = $descripcionVI;

        return $this;
    }

    /**
     * Get descripcionVI
     *
     * @return integer
     */
    public function getDescripcionVI()
    {
        return $this->descripcionVI;
    }

    /**
     * Set dtdvi
     *
     * @param integer $dtdvi
     *
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
     *
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
     *
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
     *
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

    /**
     * Set fac
     *
     * @param integer $fac
     *
     * @return CardioResonancia
     */
    public function setFac($fac)
    {
        $this->fac = $fac;

        return $this;
    }

    /**
     * Get fac
     *
     * @return integer
     */
    public function getFac()
    {
        return $this->fac;
    }

    /**
     * Set fevi
     *
     * @param integer $fevi
     *
     * @return CardioResonancia
     */
    public function setFevi($fevi)
    {
        $this->fevi = $fevi;

        return $this;
    }

    /**
     * Get fevi
     *
     * @return integer
     */
    public function getFevi()
    {
        return $this->fevi;
    }

    /**
     * Set septum
     *
     * @param integer $septum
     *
     * @return CardioResonancia
     */
    public function setSeptum($septum)
    {
        $this->septum = $septum;

        return $this;
    }

    /**
     * Get septum
     *
     * @return integer
     */
    public function getSeptum()
    {
        return $this->septum;
    }

    /**
     * Set pp
     *
     * @param integer $pp
     *
     * @return CardioResonancia
     */
    public function setPp($pp)
    {
        $this->pp = $pp;

        return $this;
    }

    /**
     * Get pp
     *
     * @return integer
     */
    public function getPp()
    {
        return $this->pp;
    }

    /**
     * Set masaVI
     *
     * @param integer $masaVI
     *
     * @return CardioResonancia
     */
    public function setMasaVI($masaVI)
    {
        $this->masaVI = $masaVI;

        return $this;
    }

    /**
     * Get masaVI
     *
     * @return integer
     */
    public function getMasaVI()
    {
        return $this->masaVI;
    }

    /**
     * Set areaAI
     *
     * @param integer $areaAI
     *
     * @return CardioResonancia
     */
    public function setAreaAI($areaAI)
    {
        $this->areaAI = $areaAI;

        return $this;
    }

    /**
     * Get areaAI
     *
     * @return integer
     */
    public function getAreaAI()
    {
        return $this->areaAI;
    }

    /**
     * Set volumenAI
     *
     * @param integer $volumenAI
     *
     * @return CardioResonancia
     */
    public function setVolumenAI($volumenAI)
    {
        $this->volumenAI = $volumenAI;

        return $this;
    }

    /**
     * Get volumenAI
     *
     * @return integer
     */
    public function getVolumenAI()
    {
        return $this->volumenAI;
    }

    /**
     * Set cuatroCamarasAI
     *
     * @param integer $cuatroCamarasAI
     *
     * @return CardioResonancia
     */
    public function setCuatroCamarasAI($cuatroCamarasAI)
    {
        $this->cuatroCamarasAI = $cuatroCamarasAI;

        return $this;
    }

    /**
     * Get cuatroCamarasAI
     *
     * @return integer
     */
    public function getCuatroCamarasAI()
    {
        return $this->cuatroCamarasAI;
    }

    /**
     * Set tapseLateral
     *
     * @param integer $tapseLateral
     *
     * @return CardioResonancia
     */
    public function setTapseLateral($tapseLateral)
    {
        $this->tapseLateral = $tapseLateral;

        return $this;
    }

    /**
     * Get tapseLateral
     *
     * @return integer
     */
    public function getTapseLateral()
    {
        return $this->tapseLateral;
    }

    /**
     * Set vfdVD
     *
     * @param integer $vfdVD
     *
     * @return CardioResonancia
     */
    public function setVfdVD($vfdVD)
    {
        $this->vfdVD = $vfdVD;

        return $this;
    }

    /**
     * Get vfdVD
     *
     * @return integer
     */
    public function getVfdVD()
    {
        return $this->vfdVD;
    }

    /**
     * Set vfsVD
     *
     * @param integer $vfsVD
     *
     * @return CardioResonancia
     */
    public function setVfsVD($vfsVD)
    {
        $this->vfsVD = $vfsVD;

        return $this;
    }

    /**
     * Get vfsVD
     *
     * @return integer
     */
    public function getVfsVD()
    {
        return $this->vfsVD;
    }

    /**
     * Set fevd
     *
     * @param integer $fevd
     *
     * @return CardioResonancia
     */
    public function setFevd($fevd)
    {
        $this->fevd = $fevd;

        return $this;
    }

    /**
     * Get fevd
     *
     * @return integer
     */
    public function getFevd()
    {
        return $this->fevd;
    }

    /**
     * Set longitudinal
     *
     * @param integer $longitudinal
     *
     * @return CardioResonancia
     */
    public function setLongitudinal($longitudinal)
    {
        $this->longitudinal = $longitudinal;

        return $this;
    }

    /**
     * Get longitudinal
     *
     * @return integer
     */
    public function getLongitudinal()
    {
        return $this->longitudinal;
    }

    /**
     * Set anilloTricuspideo
     *
     * @param integer $anilloTricuspideo
     *
     * @return CardioResonancia
     */
    public function setAnilloTricuspideo($anilloTricuspideo)
    {
        $this->anilloTricuspideo = $anilloTricuspideo;

        return $this;
    }

    /**
     * Get anilloTricuspideo
     *
     * @return integer
     */
    public function getAnilloTricuspideo()
    {
        return $this->anilloTricuspideo;
    }

    /**
     * Set transversalSubtricuspideo
     *
     * @param integer $transversalSubtricuspideo
     *
     * @return CardioResonancia
     */
    public function setTransversalSubtricuspideo($transversalSubtricuspideo)
    {
        $this->transversalSubtricuspideo = $transversalSubtricuspideo;

        return $this;
    }

    /**
     * Get transversalSubtricuspideo
     *
     * @return integer
     */
    public function getTransversalSubtricuspideo()
    {
        return $this->transversalSubtricuspideo;
    }

    /**
     * Set transversalMedio
     *
     * @param integer $transversalMedio
     *
     * @return CardioResonancia
     */
    public function setTransversalMedio($transversalMedio)
    {
        $this->transversalMedio = $transversalMedio;

        return $this;
    }

    /**
     * Get transversalMedio
     *
     * @return integer
     */
    public function getTransversalMedio()
    {
        return $this->transversalMedio;
    }

    /**
     * Set tsvd
     *
     * @param integer $tsvd
     *
     * @return CardioResonancia
     */
    public function setTsvd($tsvd)
    {
        $this->tsvd = $tsvd;

        return $this;
    }

    /**
     * Get tsvd
     *
     * @return integer
     */
    public function getTsvd()
    {
        return $this->tsvd;
    }

    /**
     * Set areaAD
     *
     * @param integer $areaAD
     *
     * @return CardioResonancia
     */
    public function setAreaAD($areaAD)
    {
        $this->areaAD = $areaAD;

        return $this;
    }

    /**
     * Get areaAD
     *
     * @return integer
     */
    public function getAreaAD()
    {
        return $this->areaAD;
    }

    /**
     * Set volumenAD
     *
     * @param integer $volumenAD
     *
     * @return CardioResonancia
     */
    public function setVolumenAD($volumenAD)
    {
        $this->volumenAD = $volumenAD;

        return $this;
    }

    /**
     * Get volumenAD
     *
     * @return integer
     */
    public function getVolumenAD()
    {
        return $this->volumenAD;
    }

    /**
     * Set cuatroCamarasAD
     *
     * @param integer $cuatroCamarasAD
     *
     * @return CardioResonancia
     */
    public function setCuatroCamarasAD($cuatroCamarasAD)
    {
        $this->cuatroCamarasAD = $cuatroCamarasAD;

        return $this;
    }

    /**
     * Get cuatroCamarasAD
     *
     * @return integer
     */
    public function getCuatroCamarasAD()
    {
        return $this->cuatroCamarasAD;
    }

    /**
     * Set secuencias
     *
     * @param string $secuencias
     *
     * @return CardioResonancia
     */
    public function setSecuencias($secuencias)
    {
        $this->secuencias = $secuencias;

        return $this;
    }

    /**
     * Get secuencias
     *
     * @return string
     */
    public function getSecuencias()
    {
        return $this->secuencias;
    }
}
