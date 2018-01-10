<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CardiopatiasCongenitas
 *
 * @ORM\Table(name="cardiopatias_congenitas")
 * @ORM\Entity
 */
class CardiopatiasCongenitas extends Estudio
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
     * @ORM\Column(name="situs", type="text", nullable=true)
     */
    private $situs;

    /**
     * @var text
     *
     * @ORM\Column(name="conexion_auriculoventricular", type="text", nullable=true)
     */
    private $conexionAuriculoventricular;

    /**
     * @var text
     *
     * @ORM\Column(name="conexion_ventriculo_arterial", type="text", nullable=true)
     */
    private $conexionVentriculoArterial;

    /**
     * @var integer
     *
     * @ORM\Column(name="ddvi", type="integer", nullable=true)
     */
    private $ddvi;

        /**
     * @var integer
     *
     * @ORM\Column(name="dsvi", type="integer", nullable=true)
     */
    private $dsvi;

        /**
     * @var integer
     *
     * @ORM\Column(name="siv", type="integer", nullable=true)
     */
    private $siv;

        /**
     * @var integer
     *
     * @ORM\Column(name="pp", type="integer", nullable=true)
     */
    private $pp;

        /**
     * @var integer
     *
     * @ORM\Column(name="fey", type="integer", nullable=true)
     */
    private $fey;

        /**
     * @var integer
     *
     * @ORM\Column(name="al_area", type="integer", nullable=true)
     */
    private $alArea;

        /**
     * @var integer
     *
     * @ORM\Column(name="al_vol", type="integer", nullable=true)
     */
    private $alVol;

        /**
     * @var integer
     *
     * @ORM\Column(name="aorta", type="integer", nullable=true)
     */
    private $aorta;

        /**
     * @var integer
     *
     * @ORM\Column(name="ap_vao", type="integer", nullable=true)
     */
    private $apVao;

        /**
     * @var integer
     *
     * @ORM\Column(name="tsvi", type="integer", nullable=true)
     */
    private $tsvi;

        /**
     * @var integer
     *
     * @ORM\Column(name="vel_max_ao", type="integer", nullable=true)
     */
    private $velMaxAo;

            /**
     * @var integer
     *
     * @ORM\Column(name="grad_max_ao", type="integer", nullable=true)
     */
    private $gradMaxAo;

            /**
     * @var integer
     *
     * @ORM\Column(name="grad_med_ao", type="integer", nullable=true)
     */
    private $gradMedAo;

            /**
     * @var integer
     *
     * @ORM\Column(name="insuficiencia", type="integer", nullable=true)
     */
    private $insuficiencia;

                /**
     * @var integer
     *
     * @ORM\Column(name="thp", type="integer", nullable=true)
     */
    private $thp;

                /**
     * @var integer
     *
     * @ORM\Column(name="adt", type="integer", nullable=true)
     */
    private $adt;

                /**
     * @var integer
     *
     * @ORM\Column(name="aa", type="integer", nullable=true)
     */
    private $aa;

                /**
     * @var integer
     *
     * @ORM\Column(name="vel_onda_e", type="integer", nullable=true)
     */
    private $velOndaE;

                /**
     * @var integer
     *
     * @ORM\Column(name="vel_onda_a", type="integer", nullable=true)
     */
    private $velOndaA;

                /**
     * @var integer
     *
     * @ORM\Column(name="grad_medio_trasmitral", type="integer", nullable=true)
     */
    private $gradMedioaTrasmitral;

                /**
     * @var integer
     *
     * @ORM\Column(name="insuficiencia_trasmitral", type="integer", nullable=true)
     */
    private $insuficienciaTrasmitral;

                /**
     * @var integer
     *
     * @ORM\Column(name="ore", type="integer", nullable=true)
     */
    private $ore;

                /**
     * @var integer
     *
     * @ORM\Column(name="vol_regurgitante", type="integer", nullable=true)
     */
    private $volRegurgitante;

                /**
     * @var integer
     *
     * @ORM\Column(name="dpdt", type="integer", nullable=true)
     */
    private $dpdt;

                /**
     * @var integer
     *
     * @ORM\Column(name="vel_max_pulmonar", type="integer", nullable=true)
     */
    private $velMaxPulmonar;

                /**
     * @var integer
     *
     * @ORM\Column(name="grad_max_pulmonar", type="integer", nullable=true)
     */
    private $gradMaxPulomonar;

                /**
     * @var integer
     *
     * @ORM\Column(name="insuficiencia_pulmonar", type="integer", nullable=true)
     */
    private $insuficiencia_pulmonar;

                /**
     * @var integer
     *
     * @ORM\Column(name="tpo_pico", type="integer", nullable=true)
     */
    private $tpoPico;

                /**
     * @var integer
     *
     * @ORM\Column(name="qpqs", type="integer", nullable=true)
     */
    private $qpqs;

                /**
     * @var integer
     *
     * @ORM\Column(name="insuficiencia_tricuspide", type="integer", nullable=true)
     */
    private $insuficienciaTricuspide;

                /**
     * @var integer
     *
     * @ORM\Column(name="vel_regurgitante", type="integer", nullable=true)
     */
    private $velRegurgitante;

                /**
     * @var integer
     *
     * @ORM\Column(name="grad_pico", type="integer", nullable=true)
     */
    private $gradPico;

                /**
     * @var integer
     *
     * @ORM\Column(name="pap", type="integer", nullable=true)
     */
    private $pap;

                /**
     * @var integer
     *
     * @ORM\Column(name="pad", type="integer", nullable=true)
     */
    private $pad;

                /**
     * @var integer
     *
     * @ORM\Column(name="onda_septal", type="integer", nullable=true)
     */
    private $ondaSeptal;

                /**
     * @var integer
     *
     * @ORM\Column(name="onda_lateral", type="integer", nullable=true)
     */
    private $ondaLateral;

                /**
     * @var integer
     *
     * @ORM\Column(name="onda_e", type="integer", nullable=true)
     */
    private $ondaE;

                /**
     * @var integer
     *
     * @ORM\Column(name="onda_a", type="integer", nullable=true)
     */
    private $ondaA;

                /**
     * @var integer
     *
     * @ORM\Column(name="relacion_e", type="integer", nullable=true)
     */
    private $relacionE;

                /**
     * @var integer
     *
     * @ORM\Column(name="onda_vd", type="integer", nullable=true)
     */
    private $ondaVd;



    public function __construct($medico,$paciente , $entityManager) {
      parent::__construct();
    //  $entityManager = $event->getEntityManager();
      $configuracion = $entityManager->getRepository('AppBundle:EstudioConfiguracion')->find(22);
      parent::setEstudioConfiguracion($configuracion);
      parent::setPaciente($paciente);
      parent::setMedico($medico);
    }


    /**
     * Get the value of Situs
     *
     * @return text
     */
    public function getSitus()
    {
        return $this->situs;
    }

    /**
     * Set the value of Situs
     *
     * @param text situs
     *
     * @return self
     */
    public function setSitus($situs)
    {
        $this->situs = $situs;

        return $this;
    }

    /**
     * Get the value of Conexion Auriculoventricular
     *
     * @return text
     */
    public function getConexionAuriculoventricular()
    {
        return $this->conexionAuriculoventricular;
    }

    /**
     * Set the value of Conexion Auriculoventricular
     *
     * @param text conexionAuriculoventricular
     *
     * @return self
     */
    public function setConexionAuriculoventricular($conexionAuriculoventricular)
    {
        $this->conexionAuriculoventricular = $conexionAuriculoventricular;

        return $this;
    }

    /**
     * Get the value of Conexion Ventriculo Arterial
     *
     * @return text
     */
    public function getConexionVentriculoArterial()
    {
        return $this->conexionVentriculoArterial;
    }

    /**
     * Set the value of Conexion Ventriculo Arterial
     *
     * @param text conexionVentriculoArterial
     *
     * @return self
     */
    public function setConexionVentriculoArterial($conexionVentriculoArterial)
    {
        $this->conexionVentriculoArterial = $conexionVentriculoArterial;

        return $this;
    }

    /**
     * Get the value of Ddvi
     *
     * @return integer
     */
    public function getDdvi()
    {
        return $this->ddvi;
    }

    /**
     * Set the value of Ddvi
     *
     * @param integer ddvi
     *
     * @return self
     */
    public function setDdvi($ddvi)
    {
        $this->ddvi = $ddvi;

        return $this;
    }

    /**
     * Get the value of Dsvi
     *
     * @return integer
     */
    public function getDsvi()
    {
        return $this->dsvi;
    }

    /**
     * Set the value of Dsvi
     *
     * @param integer dsvi
     *
     * @return self
     */
    public function setDsvi($dsvi)
    {
        $this->dsvi = $dsvi;

        return $this;
    }

    /**
     * Get the value of Siv
     *
     * @return integer
     */
    public function getSiv()
    {
        return $this->siv;
    }

    /**
     * Set the value of Siv
     *
     * @param integer siv
     *
     * @return self
     */
    public function setSiv($siv)
    {
        $this->siv = $siv;

        return $this;
    }

    /**
     * Get the value of Pp
     *
     * @return integer
     */
    public function getPp()
    {
        return $this->pp;
    }

    /**
     * Set the value of Pp
     *
     * @param integer pp
     *
     * @return self
     */
    public function setPp($pp)
    {
        $this->pp = $pp;

        return $this;
    }

    /**
     * Get the value of Fey
     *
     * @return integer
     */
    public function getFey()
    {
        return $this->fey;
    }

    /**
     * Set the value of Fey
     *
     * @param integer fey
     *
     * @return self
     */
    public function setFey($fey)
    {
        $this->fey = $fey;

        return $this;
    }

    /**
     * Get the value of Al Area
     *
     * @return integer
     */
    public function getAlArea()
    {
        return $this->alArea;
    }

    /**
     * Set the value of Al Area
     *
     * @param integer alArea
     *
     * @return self
     */
    public function setAlArea($alArea)
    {
        $this->alArea = $alArea;

        return $this;
    }

    /**
     * Get the value of Al Vol
     *
     * @return integer
     */
    public function getAlVol()
    {
        return $this->alVol;
    }

    /**
     * Set the value of Al Vol
     *
     * @param integer alVol
     *
     * @return self
     */
    public function setAlVol($alVol)
    {
        $this->alVol = $alVol;

        return $this;
    }

    /**
     * Get the value of Aorta
     *
     * @return integer
     */
    public function getAorta()
    {
        return $this->aorta;
    }

    /**
     * Set the value of Aorta
     *
     * @param integer aorta
     *
     * @return self
     */
    public function setAorta($aorta)
    {
        $this->aorta = $aorta;

        return $this;
    }

    /**
     * Get the value of Ap Vao
     *
     * @return integer
     */
    public function getApVao()
    {
        return $this->apVao;
    }

    /**
     * Set the value of Ap Vao
     *
     * @param integer apVao
     *
     * @return self
     */
    public function setApVao($apVao)
    {
        $this->apVao = $apVao;

        return $this;
    }

    /**
     * Get the value of Tsvi
     *
     * @return integer
     */
    public function getTsvi()
    {
        return $this->tsvi;
    }

    /**
     * Set the value of Tsvi
     *
     * @param integer tsvi
     *
     * @return self
     */
    public function setTsvi($tsvi)
    {
        $this->tsvi = $tsvi;

        return $this;
    }

    /**
     * Get the value of Vel Max Ao
     *
     * @return integer
     */
    public function getVelMaxAo()
    {
        return $this->velMaxAo;
    }

    /**
     * Set the value of Vel Max Ao
     *
     * @param integer velMaxAo
     *
     * @return self
     */
    public function setVelMaxAo($velMaxAo)
    {
        $this->velMaxAo = $velMaxAo;

        return $this;
    }

    /**
     * Get the value of Grad Max Ao
     *
     * @return integer
     */
    public function getGradMaxAo()
    {
        return $this->gradMaxAo;
    }

    /**
     * Set the value of Grad Max Ao
     *
     * @param integer gradMaxAo
     *
     * @return self
     */
    public function setGradMaxAo($gradMaxAo)
    {
        $this->gradMaxAo = $gradMaxAo;

        return $this;
    }

    /**
     * Get the value of Grad Med Ao
     *
     * @return integer
     */
    public function getGradMedAo()
    {
        return $this->gradMedAo;
    }

    /**
     * Set the value of Grad Med Ao
     *
     * @param integer gradMedAo
     *
     * @return self
     */
    public function setGradMedAo($gradMedAo)
    {
        $this->gradMedAo = $gradMedAo;

        return $this;
    }

    /**
     * Get the value of Insuficiencia
     *
     * @return integer
     */
    public function getInsuficiencia()
    {
        return $this->insuficiencia;
    }

    /**
     * Set the value of Insuficiencia
     *
     * @param integer insuficiencia
     *
     * @return self
     */
    public function setInsuficiencia($insuficiencia)
    {
        $this->insuficiencia = $insuficiencia;

        return $this;
    }

    /**
     * Get the value of Thp
     *
     * @return integer
     */
    public function getThp()
    {
        return $this->thp;
    }

    /**
     * Set the value of Thp
     *
     * @param integer thp
     *
     * @return self
     */
    public function setThp($thp)
    {
        $this->thp = $thp;

        return $this;
    }

    /**
     * Get the value of Adt
     *
     * @return integer
     */
    public function getAdt()
    {
        return $this->adt;
    }

    /**
     * Set the value of Adt
     *
     * @param integer adt
     *
     * @return self
     */
    public function setAdt($adt)
    {
        $this->adt = $adt;

        return $this;
    }

    /**
     * Get the value of Aa
     *
     * @return integer
     */
    public function getAa()
    {
        return $this->aa;
    }

    /**
     * Set the value of Aa
     *
     * @param integer aa
     *
     * @return self
     */
    public function setAa($aa)
    {
        $this->aa = $aa;

        return $this;
    }

    /**
     * Get the value of Vel Onda
     *
     * @return integer
     */
    public function getVelOndaE()
    {
        return $this->velOndaE;
    }

    /**
     * Set the value of Vel Onda
     *
     * @param integer velOndaE
     *
     * @return self
     */
    public function setVelOndaE($velOndaE)
    {
        $this->velOndaE = $velOndaE;

        return $this;
    }

    /**
     * Get the value of Vel Onda
     *
     * @return integer
     */
    public function getVelOndaA()
    {
        return $this->velOndaA;
    }

    /**
     * Set the value of Vel Onda
     *
     * @param integer velOndaA
     *
     * @return self
     */
    public function setVelOndaA($velOndaA)
    {
        $this->velOndaA = $velOndaA;

        return $this;
    }

    /**
     * Get the value of Grad Medioa Trasmitral
     *
     * @return integer
     */
    public function getGradMedioaTrasmitral()
    {
        return $this->gradMedioaTrasmitral;
    }

    /**
     * Set the value of Grad Medioa Trasmitral
     *
     * @param integer gradMedioaTrasmitral
     *
     * @return self
     */
    public function setGradMedioaTrasmitral($gradMedioaTrasmitral)
    {
        $this->gradMedioaTrasmitral = $gradMedioaTrasmitral;

        return $this;
    }

    /**
     * Get the value of Insuficiencia Trasmitral
     *
     * @return integer
     */
    public function getInsuficienciaTrasmitral()
    {
        return $this->insuficienciaTrasmitral;
    }

    /**
     * Set the value of Insuficiencia Trasmitral
     *
     * @param integer insuficienciaTrasmitral
     *
     * @return self
     */
    public function setInsuficienciaTrasmitral($insuficienciaTrasmitral)
    {
        $this->insuficienciaTrasmitral = $insuficienciaTrasmitral;

        return $this;
    }

    /**
     * Get the value of Ore
     *
     * @return integer
     */
    public function getOre()
    {
        return $this->ore;
    }

    /**
     * Set the value of Ore
     *
     * @param integer ore
     *
     * @return self
     */
    public function setOre($ore)
    {
        $this->ore = $ore;

        return $this;
    }

    /**
     * Get the value of Vol Regurgitante
     *
     * @return integer
     */
    public function getVolRegurgitante()
    {
        return $this->volRegurgitante;
    }

    /**
     * Set the value of Vol Regurgitante
     *
     * @param integer volRegurgitante
     *
     * @return self
     */
    public function setVolRegurgitante($volRegurgitante)
    {
        $this->volRegurgitante = $volRegurgitante;

        return $this;
    }

    /**
     * Get the value of Dpdt
     *
     * @return integer
     */
    public function getDpdt()
    {
        return $this->dpdt;
    }

    /**
     * Set the value of Dpdt
     *
     * @param integer dpdt
     *
     * @return self
     */
    public function setDpdt($dpdt)
    {
        $this->dpdt = $dpdt;

        return $this;
    }

    /**
     * Get the value of Vel Max Pulmonar
     *
     * @return integer
     */
    public function getVelMaxPulmonar()
    {
        return $this->velMaxPulmonar;
    }

    /**
     * Set the value of Vel Max Pulmonar
     *
     * @param integer velMaxPulmonar
     *
     * @return self
     */
    public function setVelMaxPulmonar($velMaxPulmonar)
    {
        $this->velMaxPulmonar = $velMaxPulmonar;

        return $this;
    }

    /**
     * Get the value of Grad Max Pulomonar
     *
     * @return integer
     */
    public function getGradMaxPulomonar()
    {
        return $this->gradMaxPulomonar;
    }

    /**
     * Set the value of Grad Max Pulomonar
     *
     * @param integer gradMaxPulomonar
     *
     * @return self
     */
    public function setGradMaxPulomonar($gradMaxPulomonar)
    {
        $this->gradMaxPulomonar = $gradMaxPulomonar;

        return $this;
    }

    /**
     * Get the value of Insuficiencia Pulmonar
     *
     * @return integer
     */
    public function getInsuficienciaPulmonar()
    {
        return $this->insuficiencia_pulmonar;
    }

    /**
     * Set the value of Insuficiencia Pulmonar
     *
     * @param integer insuficiencia_pulmonar
     *
     * @return self
     */
    public function setInsuficienciaPulmonar($insuficiencia_pulmonar)
    {
        $this->insuficiencia_pulmonar = $insuficiencia_pulmonar;

        return $this;
    }

    /**
     * Get the value of Tpo Pico
     *
     * @return integer
     */
    public function getTpoPico()
    {
        return $this->tpoPico;
    }

    /**
     * Set the value of Tpo Pico
     *
     * @param integer tpoPico
     *
     * @return self
     */
    public function setTpoPico($tpoPico)
    {
        $this->tpoPico = $tpoPico;

        return $this;
    }

    /**
     * Get the value of Qpqs
     *
     * @return integer
     */
    public function getQpqs()
    {
        return $this->qpqs;
    }

    /**
     * Set the value of Qpqs
     *
     * @param integer qpqs
     *
     * @return self
     */
    public function setQpqs($qpqs)
    {
        $this->qpqs = $qpqs;

        return $this;
    }

    /**
     * Get the value of Insuficiencia Tricuspide
     *
     * @return integer
     */
    public function getInsuficienciaTricuspide()
    {
        return $this->insuficienciaTricuspide;
    }

    /**
     * Set the value of Insuficiencia Tricuspide
     *
     * @param integer insuficienciaTricuspide
     *
     * @return self
     */
    public function setInsuficienciaTricuspide($insuficienciaTricuspide)
    {
        $this->insuficienciaTricuspide = $insuficienciaTricuspide;

        return $this;
    }

    /**
     * Get the value of Vel Regurgitante
     *
     * @return integer
     */
    public function getVelRegurgitante()
    {
        return $this->velRegurgitante;
    }

    /**
     * Set the value of Vel Regurgitante
     *
     * @param integer velRegurgitante
     *
     * @return self
     */
    public function setVelRegurgitante($velRegurgitante)
    {
        $this->velRegurgitante = $velRegurgitante;

        return $this;
    }

    /**
     * Get the value of Grad Pico
     *
     * @return integer
     */
    public function getGradPico()
    {
        return $this->gradPico;
    }

    /**
     * Set the value of Grad Pico
     *
     * @param integer gradPico
     *
     * @return self
     */
    public function setGradPico($gradPico)
    {
        $this->gradPico = $gradPico;

        return $this;
    }

    /**
     * Get the value of Pap
     *
     * @return integer
     */
    public function getPap()
    {
        return $this->pap;
    }

    /**
     * Set the value of Pap
     *
     * @param integer pap
     *
     * @return self
     */
    public function setPap($pap)
    {
        $this->pap = $pap;

        return $this;
    }

    /**
     * Get the value of Pad
     *
     * @return integer
     */
    public function getPad()
    {
        return $this->pad;
    }

    /**
     * Set the value of Pad
     *
     * @param integer pad
     *
     * @return self
     */
    public function setPad($pad)
    {
        $this->pad = $pad;

        return $this;
    }

    /**
     * Get the value of Onda Septal
     *
     * @return integer
     */
    public function getOndaSeptal()
    {
        return $this->ondaSeptal;
    }

    /**
     * Set the value of Onda Septal
     *
     * @param integer ondaSeptal
     *
     * @return self
     */
    public function setOndaSeptal($ondaSeptal)
    {
        $this->ondaSeptal = $ondaSeptal;

        return $this;
    }

    /**
     * Get the value of Onda Lateral
     *
     * @return integer
     */
    public function getOndaLateral()
    {
        return $this->ondaLateral;
    }

    /**
     * Set the value of Onda Lateral
     *
     * @param integer ondaLateral
     *
     * @return self
     */
    public function setOndaLateral($ondaLateral)
    {
        $this->ondaLateral = $ondaLateral;

        return $this;
    }

    /**
     * Get the value of Onda
     *
     * @return integer
     */
    public function getOndaE()
    {
        return $this->ondaE;
    }

    /**
     * Set the value of Onda
     *
     * @param integer ondaE
     *
     * @return self
     */
    public function setOndaE($ondaE)
    {
        $this->ondaE = $ondaE;

        return $this;
    }

    /**
     * Get the value of Onda
     *
     * @return integer
     */
    public function getOndaA()
    {
        return $this->ondaA;
    }

    /**
     * Set the value of Onda
     *
     * @param integer ondaA
     *
     * @return self
     */
    public function setOndaA($ondaA)
    {
        $this->ondaA = $ondaA;

        return $this;
    }

    /**
     * Get the value of Relacion
     *
     * @return integer
     */
    public function getRelacionE()
    {
        return $this->relacionE;
    }

    /**
     * Set the value of Relacion
     *
     * @param integer relacionE
     *
     * @return self
     */
    public function setRelacionE($relacionE)
    {
        $this->relacionE = $relacionE;

        return $this;
    }

    /**
     * Get the value of Onda Vd
     *
     * @return integer
     */
    public function getOndaVd()
    {
        return $this->ondaVd;
    }

    /**
     * Set the value of Onda Vd
     *
     * @param integer ondaVd
     *
     * @return self
     */
    public function setOndaVd($ondaVd)
    {
        $this->ondaVd = $ondaVd;

        return $this;
    }


}
