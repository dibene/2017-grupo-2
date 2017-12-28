<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ecocardiograma2d
 *
 * @ORM\Table(name="ecocardiograma_2d")
 * @ORM\Entity
 */
class Ecocardiograma2d extends Estudio
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
     * @ORM\Column(name="situs", type="text", nullable=false)
     */
    private $situs;

    /**
     * @var text
     *
     * @ORM\Column(name="conexion_auriculoventricular", type="text", nullable=false)
     */
    private $conexionAuriculoventricular;

    /**
     * @var text
     *
     * @ORM\Column(name="conexion_ventriculo_arterial", type="text", nullable=false)
     */
    private $conexionVentriculoArterial;

    /**
     * @var integer
     *
     * @ORM\Column(name="ddvi", type="integer", nullable=false)
     */
    private $ddvi;

        /**
     * @var integer
     *
     * @ORM\Column(name="dsvi", type="integer", nullable=false)
     */
    private $dsvi;

        /**
     * @var integer
     *
     * @ORM\Column(name="siv", type="integer", nullable=false)
     */
    private $siv;

        /**
     * @var integer
     *
     * @ORM\Column(name="pp", type="integer", nullable=false)
     */
    private $pp;

        /**
     * @var integer
     *
     * @ORM\Column(name="fey", type="integer", nullable=false)
     */
    private $fey;

        /**
     * @var integer
     *
     * @ORM\Column(name="al_area", type="integer", nullable=false)
     */
    private $alArea;

        /**
     * @var integer
     *
     * @ORM\Column(name="al_vol", type="integer", nullable=false)
     */
    private $alVol;

        /**
     * @var integer
     *
     * @ORM\Column(name="aorta", type="integer", nullable=false)
     */
    private $aorta;

        /**
     * @var integer
     *
     * @ORM\Column(name="ap_vao", type="integer", nullable=false)
     */
    private $apVao;

        /**
     * @var integer
     *
     * @ORM\Column(name="tsvi", type="integer", nullable=false)
     */
    private $tsvi;

        /**
     * @var integer
     *
     * @ORM\Column(name="vel_max_ao", type="integer", nullable=false)
     */
    private $velMaxAo;

            /**
     * @var integer
     *
     * @ORM\Column(name="grad_max_ao", type="integer", nullable=false)
     */
    private $gradMaxAo;

            /**
     * @var integer
     *
     * @ORM\Column(name="grad_med_ao", type="integer", nullable=false)
     */
    private $gradMedAo;

            /**
     * @var integer
     *
     * @ORM\Column(name="insuficiencia", type="integer", nullable=false)
     */
    private $insuficiencia;

                /**
     * @var integer
     *
     * @ORM\Column(name="thp", type="integer", nullable=false)
     */
    private $thp;

                /**
     * @var integer
     *
     * @ORM\Column(name="adt", type="integer", nullable=false)
     */
    private $adt;

                /**
     * @var integer
     *
     * @ORM\Column(name="aa", type="integer", nullable=false)
     */
    private $aa;

                /**
     * @var integer
     *
     * @ORM\Column(name="vel_onda_e", type="integer", nullable=false)
     */
    private $velOndaE;

                /**
     * @var integer
     *
     * @ORM\Column(name="vel_onda_a", type="integer", nullable=false)
     */
    private $velOndaA;

                /**
     * @var integer
     *
     * @ORM\Column(name="grad_medio_trasmitral", type="integer", nullable=false)
     */
    private $gradMedioaTrasmitral;

                /**
     * @var integer
     *
     * @ORM\Column(name="insuficiencia_trasmitral", type="integer", nullable=false)
     */
    private $insuficienciaTrasmitral;

                /**
     * @var integer
     *
     * @ORM\Column(name="ore", type="integer", nullable=false)
     */
    private $ore;

                /**
     * @var integer
     *
     * @ORM\Column(name="vol_regurgitante", type="integer", nullable=false)
     */
    private $volRegurgitante;

                /**
     * @var integer
     *
     * @ORM\Column(name="dpdt", type="integer", nullable=false)
     */
    private $dpdt;

                /**
     * @var integer
     *
     * @ORM\Column(name="vel_max_pulmonar", type="integer", nullable=false)
     */
    private $velMaxPulmonar;

                /**
     * @var integer
     *
     * @ORM\Column(name="grad_max_pulmonar", type="integer", nullable=false)
     */
    private $gradMaxPulomonar;

                /**
     * @var integer
     *
     * @ORM\Column(name="insuficiencia_pulmonar", type="integer", nullable=false)
     */
    private $insuficiencia_pulmonar;

                /**
     * @var integer
     *
     * @ORM\Column(name="tpo_pico", type="integer", nullable=false)
     */
    private $tpoPico;

                /**
     * @var integer
     *
     * @ORM\Column(name="qpqs", type="integer", nullable=false)
     */
    private $qpqs;

                /**
     * @var integer
     *
     * @ORM\Column(name="insuficiencia_tricuspide", type="integer", nullable=false)
     */
    private $insuficienciaTricuspide;

                /**
     * @var integer
     *
     * @ORM\Column(name="vel_regurgitante", type="integer", nullable=false)
     */
    private $velRegurgitante;

                /**
     * @var integer
     *
     * @ORM\Column(name="grad_pico", type="integer", nullable=false)
     */
    private $gradPico;

                /**
     * @var integer
     *
     * @ORM\Column(name="pap", type="integer", nullable=false)
     */
    private $pap; 

                /**
     * @var integer
     *
     * @ORM\Column(name="pad", type="integer", nullable=false)
     */
    private $pad;

                /**
     * @var integer
     *
     * @ORM\Column(name="onda_septal", type="integer", nullable=false)
     */
    private $ondaSeptal;

                /**
     * @var integer
     *
     * @ORM\Column(name="onda_lateral", type="integer", nullable=false)
     */
    private $ondaLateral;

                /**
     * @var integer
     *
     * @ORM\Column(name="onda_e", type="integer", nullable=false)
     */
    private $ondaE;

                /**
     * @var integer
     *
     * @ORM\Column(name="onda_a", type="integer", nullable=false)
     */
    private $ondaA;

                /**
     * @var integer
     *
     * @ORM\Column(name="relacion_e", type="integer", nullable=false)
     */
    private $relacionE;

                /**
     * @var integer
     *
     * @ORM\Column(name="onda_vd", type="integer", nullable=false)
     */
    private $ondaVd;




    /**
     * @var text
     *
     * @ORM\Column(name="ventriculoIzq_l1_c1", type="text", nullable=false)
     */
    private $ventriculoIzqL1C1;



    /**
     * @var text
     *
     * @ORM\Column(name="ventriculoIzq_l1_c2", type="text", nullable=false)
     */
    private $ventriculoIzqL1C2;



    /**
     * @var text
     *
     * @ORM\Column(name="ventriculoIzq_l2_c1", type="text", nullable=false)
     */
    private $ventriculoIzqL2C1;



    /**
     * @var text
     *
     * @ORM\Column(name="ventriculoIzq_l2_c2", type="text", nullable=false)
     */
    private $ventriculoIzqL2C2;

        

    /**
     * @var text
     *
     * @ORM\Column(name="ventriculoIzq_l3_c1", type="text", nullable=false)
     */
    private $ventriculoIzqL3C1;



    /**
     * @var text
     *
     * @ORM\Column(name="ventriculoIzq_l3_c2", type="text", nullable=false)
     */
    private $ventriculoIzqL3C2;



    /**
     * @var text
     *
     * @ORM\Column(name="ventriculoIzq_l1_imvi", type="text", nullable=false)
     */
      private $ventriculoIzqL1Imvi;



    /**
     * @var text
     *
     * @ORM\Column(name="ventriculoIzq_l1_epr", type="text", nullable=false)
     */
    private $ventriculoIzqL1Epr;



    /**
     * @var text
     *
     * @ORM\Column(name="ventriculoIzq_l4_c1", type="text", nullable=false)
     */
    private $ventriculoIzqL4C1;



    /**
     * @var text
     *
     * @ORM\Column(name="raizAorta_l1_c1", type="text", nullable=false)
     */
    private $raizAortaL1C1;



    /**
     * @var text
     *
     * @ORM\Column(name="raizAorta_l1_c2", type="text", nullable=false)
     */
    private $raizAortaL1C2;



    /**
     * @var text
     *
     * @ORM\Column(name="raizAorta_l1_c3", type="text", nullable=false)
     */
    private $raizAortaL1C3;



    /**
     * @var text
     *
     * @ORM\Column(name="aorta_l1_c1", type="text", nullable=false)
     */
    private $aortaL1C1;



    /**
     * @var text
     *
     * @ORM\Column(name="aorta_l1_c2", type="text", nullable=false)
     */
    private $aortaL1C2;



    /**
     * @var text
     *
     * @ORM\Column(name="aorta_l2_c1", type="text", nullable=false)
     */
    private $aortaL2C1;



    /**
     * @var text
     *
     * @ORM\Column(name="aorta_l2_c2", type="text", nullable=false)
     */
    private $aortaL2C2;



    /**
     * @var text
     *
     * @ORM\Column(name="aorta_l3_c1", type="text", nullable=false)
     */
    private $aortaL3C1;



    /**
     * @var text
     *
     * @ORM\Column(name="aorta_l3_c2", type="text", nullable=false)
     */
    private $aortaL3C2;



    /**
     * @var text
     *
     * @ORM\Column(name="valvula_mitral_l1_c1", type="text", nullable=false)
     */
    private $valvulaMitralL1C1;



    /**
     * @var text
     *
     * @ORM\Column(name="valvula_mitral_l1_c2", type="text", nullable=false)
     */
    private $valvulaMitralL1C2;

    

    /**
     * @var text
     *
     * @ORM\Column(name="valvula_mitral_l2_c1", type="text", nullable=false)
     */
    private $valvulaMitralL2C1;


    /**
     * @var text
     *
     * @ORM\Column(name="valvula_mitral_l2_c2", type="text", nullable=false)
     */
    private $valvulaMitralL2C2;


    /**
     * @var text
     *
     * @ORM\Column(name="valvula_mitral_l2_c3", type="text", nullable=false)
     */
    private $valvulaMitralL2C3;


    /**
     * @var text
     *
     * @ORM\Column(name="auricula_izq_l1_c1", type="text", nullable=false)
     */
    private $auriculaIzqL1C1;



    /**
     * @var text
     *
     * @ORM\Column(name="auricula_izq_l1_c2", type="text", nullable=false)
     */
    private $auriculaIzqL1C2;


    /**
     * @var text
     *
     * @ORM\Column(name="auricula_izq_l1_c3", type="text", nullable=false)
     */
    private $auriculaIzqL1C3;


    /**
     * @var text
     *
     * @ORM\Column(name="valvula_pulmonar_l1_c1", type="text", nullable=false)
     */
    private $valvulaPulmonarL1C1;


    /**
     * @var text
     *
     * @ORM\Column(name="valvula_pulmonar_l1_c2", type="text", nullable=false)
     */
    private $valvulaPulmonarL1C2;


    /**
     * @var text
     *
     * @ORM\Column(name="valvula_pulmonar_l2_c1", type="text", nullable=false)
     */
    private $valvulaPulmonarL2C1;


    /**
     * @var text
     *
     * @ORM\Column(name="valvula_pulmonar_l2_c2", type="text", nullable=false)
     */
    private $valvulaPulmonarL2C2;


    /**
     * @var text
     *
     * @ORM\Column(name="valvula_pulmonar_l2_c3", type="text", nullable=false)
     */
    private $valvulaPulmonarL2C3;


    /**
     * @var text
     *
     * @ORM\Column(name="valvula_tricupside_l1_c1", type="text", nullable=false)
     */
    private $valvulatricuspideL1C1;


    /**
     * @var text
     *
     * @ORM\Column(name="valvula_tricupside_l1_c2", type="text", nullable=false)
     */
    private $valvulatricuspideL1C2;


    /**
     * @var text
     *
     * @ORM\Column(name="valvula_tricupside_l2_c1", type="text", nullable=false)
     */
    private $valvulatricuspideL2C1;


    /**
     * @var text
     *
     * @ORM\Column(name="valvula_tricupside_l2_c2", type="text", nullable=false)
     */
    private $valvulatricuspideL2C2;


    /**
     * @var text
     *
     * @ORM\Column(name="valvula_tricupside_l2_c3", type="text", nullable=false)
     */
    private $valvulatricuspideL2C3;


    /**
     * @var text
     *
     * @ORM\Column(name="cavidad_derecha_l1_c1", type="text", nullable=false)
     */
    private $cavidadDerechaL1C1;


    /**
     * @var text
     *
     * @ORM\Column(name="cavidad_derecha_l1_c2", type="text", nullable=false)
     */
    private $cavidadDerechaL1C2;


    /**
     * @var text
     *
     * @ORM\Column(name="cavidad_derecha_l1_c3", type="text", nullable=false)
     */
    private $cavidadDerechaL1C3;


    /**
     * @var text
     *
     * @ORM\Column(name="vena_cava_inferior_l1_c1", type="text", nullable=false)
     */
    private $venaCavaInferiorL1C1;


    /**
     * @var text
     *
     * @ORM\Column(name="pericardio_l1_c1", type="text", nullable=false)
     */
    private $pericardioL1C1;


    /**
     * @var text
     *
     * @ORM\Column(name="pericardio_l1_c2", type="text", nullable=false)
     */
    private $pericardioL1C2;


    /**
     * @var text
     *
     * @ORM\Column(name="pericardio_l1_c3", type="text", nullable=false)
     */
    private $pericardioL1C3;


    /**
     * @var text
     *
     * @ORM\Column(name="conclusion_libre", type="text", nullable=false)
     */
    private $conclusionLibre;


    /**
     * @var text
     *
     * @ORM\Column(name="conclusion_l1_c1", type="text", nullable=false)
     */
    private $conclusionL1C1;


    /**
     * @var text
     *
     * @ORM\Column(name="conclusion_l1_c2", type="text", nullable=false)
     */
    private $conclusionL1C2;



    /**
     * Set situs
     *
     * @param string $situs
     *
     * @return Ecocardiograma2d
     */
    public function setSitus($situs)
    {
        $this->situs = $situs;

        return $this;
    }

    /**
     * Get situs
     *
     * @return string
     */
    public function getSitus()
    {
        return $this->situs;
    }

    /**
     * Set conexionAuriculoventricular
     *
     * @param string $conexionAuriculoventricular
     *
     * @return Ecocardiograma2d
     */
    public function setConexionAuriculoventricular($conexionAuriculoventricular)
    {
        $this->conexionAuriculoventricular = $conexionAuriculoventricular;

        return $this;
    }

    /**
     * Get conexionAuriculoventricular
     *
     * @return string
     */
    public function getConexionAuriculoventricular()
    {
        return $this->conexionAuriculoventricular;
    }

    /**
     * Set conexionVentriculoArterial
     *
     * @param string $conexionVentriculoArterial
     *
     * @return Ecocardiograma2d
     */
    public function setConexionVentriculoArterial($conexionVentriculoArterial)
    {
        $this->conexionVentriculoArterial = $conexionVentriculoArterial;

        return $this;
    }

    /**
     * Get conexionVentriculoArterial
     *
     * @return string
     */
    public function getConexionVentriculoArterial()
    {
        return $this->conexionVentriculoArterial;
    }

    /**
     * Set ddvi
     *
     * @param integer $ddvi
     *
     * @return Ecocardiograma2d
     */
    public function setDdvi($ddvi)
    {
        $this->ddvi = $ddvi;

        return $this;
    }

    /**
     * Get ddvi
     *
     * @return integer
     */
    public function getDdvi()
    {
        return $this->ddvi;
    }

    /**
     * Set dsvi
     *
     * @param integer $dsvi
     *
     * @return Ecocardiograma2d
     */
    public function setDsvi($dsvi)
    {
        $this->dsvi = $dsvi;

        return $this;
    }

    /**
     * Get dsvi
     *
     * @return integer
     */
    public function getDsvi()
    {
        return $this->dsvi;
    }

    /**
     * Set siv
     *
     * @param integer $siv
     *
     * @return Ecocardiograma2d
     */
    public function setSiv($siv)
    {
        $this->siv = $siv;

        return $this;
    }

    /**
     * Get siv
     *
     * @return integer
     */
    public function getSiv()
    {
        return $this->siv;
    }

    /**
     * Set pp
     *
     * @param integer $pp
     *
     * @return Ecocardiograma2d
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
     * Set fey
     *
     * @param integer $fey
     *
     * @return Ecocardiograma2d
     */
    public function setFey($fey)
    {
        $this->fey = $fey;

        return $this;
    }

    /**
     * Get fey
     *
     * @return integer
     */
    public function getFey()
    {
        return $this->fey;
    }

    /**
     * Set alArea
     *
     * @param integer $alArea
     *
     * @return Ecocardiograma2d
     */
    public function setAlArea($alArea)
    {
        $this->alArea = $alArea;

        return $this;
    }

    /**
     * Get alArea
     *
     * @return integer
     */
    public function getAlArea()
    {
        return $this->alArea;
    }

    /**
     * Set alVol
     *
     * @param integer $alVol
     *
     * @return Ecocardiograma2d
     */
    public function setAlVol($alVol)
    {
        $this->alVol = $alVol;

        return $this;
    }

    /**
     * Get alVol
     *
     * @return integer
     */
    public function getAlVol()
    {
        return $this->alVol;
    }

    /**
     * Set aorta
     *
     * @param integer $aorta
     *
     * @return Ecocardiograma2d
     */
    public function setAorta($aorta)
    {
        $this->aorta = $aorta;

        return $this;
    }

    /**
     * Get aorta
     *
     * @return integer
     */
    public function getAorta()
    {
        return $this->aorta;
    }

    /**
     * Set apVao
     *
     * @param integer $apVao
     *
     * @return Ecocardiograma2d
     */
    public function setApVao($apVao)
    {
        $this->apVao = $apVao;

        return $this;
    }

    /**
     * Get apVao
     *
     * @return integer
     */
    public function getApVao()
    {
        return $this->apVao;
    }

    /**
     * Set tsvi
     *
     * @param integer $tsvi
     *
     * @return Ecocardiograma2d
     */
    public function setTsvi($tsvi)
    {
        $this->tsvi = $tsvi;

        return $this;
    }

    /**
     * Get tsvi
     *
     * @return integer
     */
    public function getTsvi()
    {
        return $this->tsvi;
    }

    /**
     * Set velMaxAo
     *
     * @param integer $velMaxAo
     *
     * @return Ecocardiograma2d
     */
    public function setVelMaxAo($velMaxAo)
    {
        $this->velMaxAo = $velMaxAo;

        return $this;
    }

    /**
     * Get velMaxAo
     *
     * @return integer
     */
    public function getVelMaxAo()
    {
        return $this->velMaxAo;
    }

    /**
     * Set gradMaxAo
     *
     * @param integer $gradMaxAo
     *
     * @return Ecocardiograma2d
     */
    public function setGradMaxAo($gradMaxAo)
    {
        $this->gradMaxAo = $gradMaxAo;

        return $this;
    }

    /**
     * Get gradMaxAo
     *
     * @return integer
     */
    public function getGradMaxAo()
    {
        return $this->gradMaxAo;
    }

    /**
     * Set gradMedAo
     *
     * @param integer $gradMedAo
     *
     * @return Ecocardiograma2d
     */
    public function setGradMedAo($gradMedAo)
    {
        $this->gradMedAo = $gradMedAo;

        return $this;
    }

    /**
     * Get gradMedAo
     *
     * @return integer
     */
    public function getGradMedAo()
    {
        return $this->gradMedAo;
    }

    /**
     * Set insuficiencia
     *
     * @param integer $insuficiencia
     *
     * @return Ecocardiograma2d
     */
    public function setInsuficiencia($insuficiencia)
    {
        $this->insuficiencia = $insuficiencia;

        return $this;
    }

    /**
     * Get insuficiencia
     *
     * @return integer
     */
    public function getInsuficiencia()
    {
        return $this->insuficiencia;
    }

    /**
     * Set thp
     *
     * @param integer $thp
     *
     * @return Ecocardiograma2d
     */
    public function setThp($thp)
    {
        $this->thp = $thp;

        return $this;
    }

    /**
     * Get thp
     *
     * @return integer
     */
    public function getThp()
    {
        return $this->thp;
    }

    /**
     * Set adt
     *
     * @param integer $adt
     *
     * @return Ecocardiograma2d
     */
    public function setAdt($adt)
    {
        $this->adt = $adt;

        return $this;
    }

    /**
     * Get adt
     *
     * @return integer
     */
    public function getAdt()
    {
        return $this->adt;
    }

    /**
     * Set aa
     *
     * @param integer $aa
     *
     * @return Ecocardiograma2d
     */
    public function setAa($aa)
    {
        $this->aa = $aa;

        return $this;
    }

    /**
     * Get aa
     *
     * @return integer
     */
    public function getAa()
    {
        return $this->aa;
    }

    /**
     * Set velOndaE
     *
     * @param integer $velOndaE
     *
     * @return Ecocardiograma2d
     */
    public function setVelOndaE($velOndaE)
    {
        $this->velOndaE = $velOndaE;

        return $this;
    }

    /**
     * Get velOndaE
     *
     * @return integer
     */
    public function getVelOndaE()
    {
        return $this->velOndaE;
    }

    /**
     * Set velOndaA
     *
     * @param integer $velOndaA
     *
     * @return Ecocardiograma2d
     */
    public function setVelOndaA($velOndaA)
    {
        $this->velOndaA = $velOndaA;

        return $this;
    }

    /**
     * Get velOndaA
     *
     * @return integer
     */
    public function getVelOndaA()
    {
        return $this->velOndaA;
    }

    /**
     * Set gradMedioaTrasmitral
     *
     * @param integer $gradMedioaTrasmitral
     *
     * @return Ecocardiograma2d
     */
    public function setGradMedioaTrasmitral($gradMedioaTrasmitral)
    {
        $this->gradMedioaTrasmitral = $gradMedioaTrasmitral;

        return $this;
    }

    /**
     * Get gradMedioaTrasmitral
     *
     * @return integer
     */
    public function getGradMedioaTrasmitral()
    {
        return $this->gradMedioaTrasmitral;
    }

    /**
     * Set insuficienciaTrasmitral
     *
     * @param integer $insuficienciaTrasmitral
     *
     * @return Ecocardiograma2d
     */
    public function setInsuficienciaTrasmitral($insuficienciaTrasmitral)
    {
        $this->insuficienciaTrasmitral = $insuficienciaTrasmitral;

        return $this;
    }

    /**
     * Get insuficienciaTrasmitral
     *
     * @return integer
     */
    public function getInsuficienciaTrasmitral()
    {
        return $this->insuficienciaTrasmitral;
    }

    /**
     * Set ore
     *
     * @param integer $ore
     *
     * @return Ecocardiograma2d
     */
    public function setOre($ore)
    {
        $this->ore = $ore;

        return $this;
    }

    /**
     * Get ore
     *
     * @return integer
     */
    public function getOre()
    {
        return $this->ore;
    }

    /**
     * Set volRegurgitante
     *
     * @param integer $volRegurgitante
     *
     * @return Ecocardiograma2d
     */
    public function setVolRegurgitante($volRegurgitante)
    {
        $this->volRegurgitante = $volRegurgitante;

        return $this;
    }

    /**
     * Get volRegurgitante
     *
     * @return integer
     */
    public function getVolRegurgitante()
    {
        return $this->volRegurgitante;
    }

    /**
     * Set dpdt
     *
     * @param integer $dpdt
     *
     * @return Ecocardiograma2d
     */
    public function setDpdt($dpdt)
    {
        $this->dpdt = $dpdt;

        return $this;
    }

    /**
     * Get dpdt
     *
     * @return integer
     */
    public function getDpdt()
    {
        return $this->dpdt;
    }

    /**
     * Set velMaxPulmonar
     *
     * @param integer $velMaxPulmonar
     *
     * @return Ecocardiograma2d
     */
    public function setVelMaxPulmonar($velMaxPulmonar)
    {
        $this->velMaxPulmonar = $velMaxPulmonar;

        return $this;
    }

    /**
     * Get velMaxPulmonar
     *
     * @return integer
     */
    public function getVelMaxPulmonar()
    {
        return $this->velMaxPulmonar;
    }

    /**
     * Set gradMaxPulomonar
     *
     * @param integer $gradMaxPulomonar
     *
     * @return Ecocardiograma2d
     */
    public function setGradMaxPulomonar($gradMaxPulomonar)
    {
        $this->gradMaxPulomonar = $gradMaxPulomonar;

        return $this;
    }

    /**
     * Get gradMaxPulomonar
     *
     * @return integer
     */
    public function getGradMaxPulomonar()
    {
        return $this->gradMaxPulomonar;
    }

    /**
     * Set insuficienciaPulmonar
     *
     * @param integer $insuficienciaPulmonar
     *
     * @return Ecocardiograma2d
     */
    public function setInsuficienciaPulmonar($insuficienciaPulmonar)
    {
        $this->insuficiencia_pulmonar = $insuficienciaPulmonar;

        return $this;
    }

    /**
     * Get insuficienciaPulmonar
     *
     * @return integer
     */
    public function getInsuficienciaPulmonar()
    {
        return $this->insuficiencia_pulmonar;
    }

    /**
     * Set tpoPico
     *
     * @param integer $tpoPico
     *
     * @return Ecocardiograma2d
     */
    public function setTpoPico($tpoPico)
    {
        $this->tpoPico = $tpoPico;

        return $this;
    }

    /**
     * Get tpoPico
     *
     * @return integer
     */
    public function getTpoPico()
    {
        return $this->tpoPico;
    }

    /**
     * Set qpqs
     *
     * @param integer $qpqs
     *
     * @return Ecocardiograma2d
     */
    public function setQpqs($qpqs)
    {
        $this->qpqs = $qpqs;

        return $this;
    }

    /**
     * Get qpqs
     *
     * @return integer
     */
    public function getQpqs()
    {
        return $this->qpqs;
    }

    /**
     * Set insuficienciaTricuspide
     *
     * @param integer $insuficienciaTricuspide
     *
     * @return Ecocardiograma2d
     */
    public function setInsuficienciaTricuspide($insuficienciaTricuspide)
    {
        $this->insuficienciaTricuspide = $insuficienciaTricuspide;

        return $this;
    }

    /**
     * Get insuficienciaTricuspide
     *
     * @return integer
     */
    public function getInsuficienciaTricuspide()
    {
        return $this->insuficienciaTricuspide;
    }

    /**
     * Set velRegurgitante
     *
     * @param integer $velRegurgitante
     *
     * @return Ecocardiograma2d
     */
    public function setVelRegurgitante($velRegurgitante)
    {
        $this->velRegurgitante = $velRegurgitante;

        return $this;
    }

    /**
     * Get velRegurgitante
     *
     * @return integer
     */
    public function getVelRegurgitante()
    {
        return $this->velRegurgitante;
    }

    /**
     * Set gradPico
     *
     * @param integer $gradPico
     *
     * @return Ecocardiograma2d
     */
    public function setGradPico($gradPico)
    {
        $this->gradPico = $gradPico;

        return $this;
    }

    /**
     * Get gradPico
     *
     * @return integer
     */
    public function getGradPico()
    {
        return $this->gradPico;
    }

    /**
     * Set pap
     *
     * @param integer $pap
     *
     * @return Ecocardiograma2d
     */
    public function setPap($pap)
    {
        $this->pap = $pap;

        return $this;
    }

    /**
     * Get pap
     *
     * @return integer
     */
    public function getPap()
    {
        return $this->pap;
    }

    /**
     * Set pad
     *
     * @param integer $pad
     *
     * @return Ecocardiograma2d
     */
    public function setPad($pad)
    {
        $this->pad = $pad;

        return $this;
    }

    /**
     * Get pad
     *
     * @return integer
     */
    public function getPad()
    {
        return $this->pad;
    }

    /**
     * Set ondaSeptal
     *
     * @param integer $ondaSeptal
     *
     * @return Ecocardiograma2d
     */
    public function setOndaSeptal($ondaSeptal)
    {
        $this->ondaSeptal = $ondaSeptal;

        return $this;
    }

    /**
     * Get ondaSeptal
     *
     * @return integer
     */
    public function getOndaSeptal()
    {
        return $this->ondaSeptal;
    }

    /**
     * Set ondaLateral
     *
     * @param integer $ondaLateral
     *
     * @return Ecocardiograma2d
     */
    public function setOndaLateral($ondaLateral)
    {
        $this->ondaLateral = $ondaLateral;

        return $this;
    }

    /**
     * Get ondaLateral
     *
     * @return integer
     */
    public function getOndaLateral()
    {
        return $this->ondaLateral;
    }

    /**
     * Set ondaE
     *
     * @param integer $ondaE
     *
     * @return Ecocardiograma2d
     */
    public function setOndaE($ondaE)
    {
        $this->ondaE = $ondaE;

        return $this;
    }

    /**
     * Get ondaE
     *
     * @return integer
     */
    public function getOndaE()
    {
        return $this->ondaE;
    }

    /**
     * Set ondaA
     *
     * @param integer $ondaA
     *
     * @return Ecocardiograma2d
     */
    public function setOndaA($ondaA)
    {
        $this->ondaA = $ondaA;

        return $this;
    }

    /**
     * Get ondaA
     *
     * @return integer
     */
    public function getOndaA()
    {
        return $this->ondaA;
    }

    /**
     * Set relacionE
     *
     * @param integer $relacionE
     *
     * @return Ecocardiograma2d
     */
    public function setRelacionE($relacionE)
    {
        $this->relacionE = $relacionE;

        return $this;
    }

    /**
     * Get relacionE
     *
     * @return integer
     */
    public function getRelacionE()
    {
        return $this->relacionE;
    }

    /**
     * Set ondaVd
     *
     * @param integer $ondaVd
     *
     * @return Ecocardiograma2d
     */
    public function setOndaVd($ondaVd)
    {
        $this->ondaVd = $ondaVd;

        return $this;
    }

    /**
     * Get ondaVd
     *
     * @return integer
     */
    public function getOndaVd()
    {
        return $this->ondaVd;
    }

    /**
     * Set ventriculoIzqL1C1
     *
     * @param string $ventriculoIzqL1C1
     *
     * @return Ecocardiograma2d
     */
    public function setVentriculoIzqL1C1($ventriculoIzqL1C1)
    {
        $this->ventriculoIzqL1C1 = $ventriculoIzqL1C1;

        return $this;
    }

    /**
     * Get ventriculoIzqL1C1
     *
     * @return string
     */
    public function getVentriculoIzqL1C1()
    {
        return $this->ventriculoIzqL1C1;
    }

    /**
     * Set ventriculoIzqL1C2
     *
     * @param string $ventriculoIzqL1C2
     *
     * @return Ecocardiograma2d
     */
    public function setVentriculoIzqL1C2($ventriculoIzqL1C2)
    {
        $this->ventriculoIzqL1C2 = $ventriculoIzqL1C2;

        return $this;
    }

    /**
     * Get ventriculoIzqL1C2
     *
     * @return string
     */
    public function getVentriculoIzqL1C2()
    {
        return $this->ventriculoIzqL1C2;
    }

    /**
     * Set ventriculoIzqL2C1
     *
     * @param string $ventriculoIzqL2C1
     *
     * @return Ecocardiograma2d
     */
    public function setVentriculoIzqL2C1($ventriculoIzqL2C1)
    {
        $this->ventriculoIzqL2C1 = $ventriculoIzqL2C1;

        return $this;
    }

    /**
     * Get ventriculoIzqL2C1
     *
     * @return string
     */
    public function getVentriculoIzqL2C1()
    {
        return $this->ventriculoIzqL2C1;
    }

    /**
     * Set ventriculoIzqL2C2
     *
     * @param string $ventriculoIzqL2C2
     *
     * @return Ecocardiograma2d
     */
    public function setVentriculoIzqL2C2($ventriculoIzqL2C2)
    {
        $this->ventriculoIzqL2C2 = $ventriculoIzqL2C2;

        return $this;
    }

    /**
     * Get ventriculoIzqL2C2
     *
     * @return string
     */
    public function getVentriculoIzqL2C2()
    {
        return $this->ventriculoIzqL2C2;
    }

    /**
     * Set ventriculoIzqL3C1
     *
     * @param string $ventriculoIzqL3C1
     *
     * @return Ecocardiograma2d
     */
    public function setVentriculoIzqL3C1($ventriculoIzqL3C1)
    {
        $this->ventriculoIzqL3C1 = $ventriculoIzqL3C1;

        return $this;
    }

    /**
     * Get ventriculoIzqL3C1
     *
     * @return string
     */
    public function getVentriculoIzqL3C1()
    {
        return $this->ventriculoIzqL3C1;
    }

    /**
     * Set ventriculoIzqL3C2
     *
     * @param string $ventriculoIzqL3C2
     *
     * @return Ecocardiograma2d
     */
    public function setVentriculoIzqL3C2($ventriculoIzqL3C2)
    {
        $this->ventriculoIzqL3C2 = $ventriculoIzqL3C2;

        return $this;
    }

    /**
     * Get ventriculoIzqL3C2
     *
     * @return string
     */
    public function getVentriculoIzqL3C2()
    {
        return $this->ventriculoIzqL3C2;
    }

    /**
     * Set ventriculoIzqL1Imvi
     *
     * @param string $ventriculoIzqL1Imvi
     *
     * @return Ecocardiograma2d
     */
    public function setVentriculoIzqL1Imvi($ventriculoIzqL1Imvi)
    {
        $this->ventriculoIzqL1Imvi = $ventriculoIzqL1Imvi;

        return $this;
    }

    /**
     * Get ventriculoIzqL1Imvi
     *
     * @return string
     */
    public function getVentriculoIzqL1Imvi()
    {
        return $this->ventriculoIzqL1Imvi;
    }

    /**
     * Set ventriculoIzqL1Epr
     *
     * @param string $ventriculoIzqL1Epr
     *
     * @return Ecocardiograma2d
     */
    public function setVentriculoIzqL1Epr($ventriculoIzqL1Epr)
    {
        $this->ventriculoIzqL1Epr = $ventriculoIzqL1Epr;

        return $this;
    }

    /**
     * Get ventriculoIzqL1Epr
     *
     * @return string
     */
    public function getVentriculoIzqL1Epr()
    {
        return $this->ventriculoIzqL1Epr;
    }

    /**
     * Set ventriculoIzqL4C1
     *
     * @param string $ventriculoIzqL4C1
     *
     * @return Ecocardiograma2d
     */
    public function setVentriculoIzqL4C1($ventriculoIzqL4C1)
    {
        $this->ventriculoIzqL4C1 = $ventriculoIzqL4C1;

        return $this;
    }

    /**
     * Get ventriculoIzqL4C1
     *
     * @return string
     */
    public function getVentriculoIzqL4C1()
    {
        return $this->ventriculoIzqL4C1;
    }

    /**
     * Set raizAortaL1C1
     *
     * @param string $raizAortaL1C1
     *
     * @return Ecocardiograma2d
     */
    public function setRaizAortaL1C1($raizAortaL1C1)
    {
        $this->raizAortaL1C1 = $raizAortaL1C1;

        return $this;
    }

    /**
     * Get raizAortaL1C1
     *
     * @return string
     */
    public function getRaizAortaL1C1()
    {
        return $this->raizAortaL1C1;
    }

    /**
     * Set raizAortaL1C2
     *
     * @param string $raizAortaL1C2
     *
     * @return Ecocardiograma2d
     */
    public function setRaizAortaL1C2($raizAortaL1C2)
    {
        $this->raizAortaL1C2 = $raizAortaL1C2;

        return $this;
    }

    /**
     * Get raizAortaL1C2
     *
     * @return string
     */
    public function getRaizAortaL1C2()
    {
        return $this->raizAortaL1C2;
    }

    /**
     * Set raizAortaL1C3
     *
     * @param string $raizAortaL1C3
     *
     * @return Ecocardiograma2d
     */
    public function setRaizAortaL1C3($raizAortaL1C3)
    {
        $this->raizAortaL1C3 = $raizAortaL1C3;

        return $this;
    }

    /**
     * Get raizAortaL1C3
     *
     * @return string
     */
    public function getRaizAortaL1C3()
    {
        return $this->raizAortaL1C3;
    }

    /**
     * Set aortaL1C1
     *
     * @param string $aortaL1C1
     *
     * @return Ecocardiograma2d
     */
    public function setAortaL1C1($aortaL1C1)
    {
        $this->aortaL1C1 = $aortaL1C1;

        return $this;
    }

    /**
     * Get aortaL1C1
     *
     * @return string
     */
    public function getAortaL1C1()
    {
        return $this->aortaL1C1;
    }

    /**
     * Set aortaL1C2
     *
     * @param string $aortaL1C2
     *
     * @return Ecocardiograma2d
     */
    public function setAortaL1C2($aortaL1C2)
    {
        $this->aortaL1C2 = $aortaL1C2;

        return $this;
    }

    /**
     * Get aortaL1C2
     *
     * @return string
     */
    public function getAortaL1C2()
    {
        return $this->aortaL1C2;
    }

    /**
     * Set aortaL2C1
     *
     * @param string $aortaL2C1
     *
     * @return Ecocardiograma2d
     */
    public function setAortaL2C1($aortaL2C1)
    {
        $this->aortaL2C1 = $aortaL2C1;

        return $this;
    }

    /**
     * Get aortaL2C1
     *
     * @return string
     */
    public function getAortaL2C1()
    {
        return $this->aortaL2C1;
    }

    /**
     * Set aortaL2C2
     *
     * @param string $aortaL2C2
     *
     * @return Ecocardiograma2d
     */
    public function setAortaL2C2($aortaL2C2)
    {
        $this->aortaL2C2 = $aortaL2C2;

        return $this;
    }

    /**
     * Get aortaL2C2
     *
     * @return string
     */
    public function getAortaL2C2()
    {
        return $this->aortaL2C2;
    }

    /**
     * Set aortaL3C1
     *
     * @param string $aortaL3C1
     *
     * @return Ecocardiograma2d
     */
    public function setAortaL3C1($aortaL3C1)
    {
        $this->aortaL3C1 = $aortaL3C1;

        return $this;
    }

    /**
     * Get aortaL3C1
     *
     * @return string
     */
    public function getAortaL3C1()
    {
        return $this->aortaL3C1;
    }

    /**
     * Set aortaL3C2
     *
     * @param string $aortaL3C2
     *
     * @return Ecocardiograma2d
     */
    public function setAortaL3C2($aortaL3C2)
    {
        $this->aortaL3C2 = $aortaL3C2;

        return $this;
    }

    /**
     * Get aortaL3C2
     *
     * @return string
     */
    public function getAortaL3C2()
    {
        return $this->aortaL3C2;
    }

    /**
     * Set valvulaMitralL1C1
     *
     * @param string $valvulaMitralL1C1
     *
     * @return Ecocardiograma2d
     */
    public function setValvulaMitralL1C1($valvulaMitralL1C1)
    {
        $this->valvulaMitralL1C1 = $valvulaMitralL1C1;

        return $this;
    }

    /**
     * Get valvulaMitralL1C1
     *
     * @return string
     */
    public function getValvulaMitralL1C1()
    {
        return $this->valvulaMitralL1C1;
    }

    /**
     * Set valvulaMitralL1C2
     *
     * @param string $valvulaMitralL1C2
     *
     * @return Ecocardiograma2d
     */
    public function setValvulaMitralL1C2($valvulaMitralL1C2)
    {
        $this->valvulaMitralL1C2 = $valvulaMitralL1C2;

        return $this;
    }

    /**
     * Get valvulaMitralL1C2
     *
     * @return string
     */
    public function getValvulaMitralL1C2()
    {
        return $this->valvulaMitralL1C2;
    }

    /**
     * Set valvulaMitralL2C1
     *
     * @param string $valvulaMitralL2C1
     *
     * @return Ecocardiograma2d
     */
    public function setValvulaMitralL2C1($valvulaMitralL2C1)
    {
        $this->valvulaMitralL2C1 = $valvulaMitralL2C1;

        return $this;
    }

    /**
     * Get valvulaMitralL2C1
     *
     * @return string
     */
    public function getValvulaMitralL2C1()
    {
        return $this->valvulaMitralL2C1;
    }

    /**
     * Set valvulaMitralL2C2
     *
     * @param string $valvulaMitralL2C2
     *
     * @return Ecocardiograma2d
     */
    public function setValvulaMitralL2C2($valvulaMitralL2C2)
    {
        $this->valvulaMitralL2C2 = $valvulaMitralL2C2;

        return $this;
    }

    /**
     * Get valvulaMitralL2C2
     *
     * @return string
     */
    public function getValvulaMitralL2C2()
    {
        return $this->valvulaMitralL2C2;
    }

    /**
     * Set valvulaMitralL2C3
     *
     * @param string $valvulaMitralL2C3
     *
     * @return Ecocardiograma2d
     */
    public function setValvulaMitralL2C3($valvulaMitralL2C3)
    {
        $this->valvulaMitralL2C3 = $valvulaMitralL2C3;

        return $this;
    }

    /**
     * Get valvulaMitralL2C3
     *
     * @return string
     */
    public function getValvulaMitralL2C3()
    {
        return $this->valvulaMitralL2C3;
    }

    /**
     * Set auriculaIzqL1C1
     *
     * @param string $auriculaIzqL1C1
     *
     * @return Ecocardiograma2d
     */
    public function setAuriculaIzqL1C1($auriculaIzqL1C1)
    {
        $this->auriculaIzqL1C1 = $auriculaIzqL1C1;

        return $this;
    }

    /**
     * Get auriculaIzqL1C1
     *
     * @return string
     */
    public function getAuriculaIzqL1C1()
    {
        return $this->auriculaIzqL1C1;
    }

    /**
     * Set auriculaIzqL1C2
     *
     * @param string $auriculaIzqL1C2
     *
     * @return Ecocardiograma2d
     */
    public function setAuriculaIzqL1C2($auriculaIzqL1C2)
    {
        $this->auriculaIzqL1C2 = $auriculaIzqL1C2;

        return $this;
    }

    /**
     * Get auriculaIzqL1C2
     *
     * @return string
     */
    public function getAuriculaIzqL1C2()
    {
        return $this->auriculaIzqL1C2;
    }

    /**
     * Set auriculaIzqL1C3
     *
     * @param string $auriculaIzqL1C3
     *
     * @return Ecocardiograma2d
     */
    public function setAuriculaIzqL1C3($auriculaIzqL1C3)
    {
        $this->auriculaIzqL1C3 = $auriculaIzqL1C3;

        return $this;
    }

    /**
     * Get auriculaIzqL1C3
     *
     * @return string
     */
    public function getAuriculaIzqL1C3()
    {
        return $this->auriculaIzqL1C3;
    }

    /**
     * Set valvulaPulmonarL1C1
     *
     * @param string $valvulaPulmonarL1C1
     *
     * @return Ecocardiograma2d
     */
    public function setValvulaPulmonarL1C1($valvulaPulmonarL1C1)
    {
        $this->valvulaPulmonarL1C1 = $valvulaPulmonarL1C1;

        return $this;
    }

    /**
     * Get valvulaPulmonarL1C1
     *
     * @return string
     */
    public function getValvulaPulmonarL1C1()
    {
        return $this->valvulaPulmonarL1C1;
    }

    /**
     * Set valvulaPulmonarL1C2
     *
     * @param string $valvulaPulmonarL1C2
     *
     * @return Ecocardiograma2d
     */
    public function setValvulaPulmonarL1C2($valvulaPulmonarL1C2)
    {
        $this->valvulaPulmonarL1C2 = $valvulaPulmonarL1C2;

        return $this;
    }

    /**
     * Get valvulaPulmonarL1C2
     *
     * @return string
     */
    public function getValvulaPulmonarL1C2()
    {
        return $this->valvulaPulmonarL1C2;
    }

    /**
     * Set valvulaPulmonarL2C1
     *
     * @param string $valvulaPulmonarL2C1
     *
     * @return Ecocardiograma2d
     */
    public function setValvulaPulmonarL2C1($valvulaPulmonarL2C1)
    {
        $this->valvulaPulmonarL2C1 = $valvulaPulmonarL2C1;

        return $this;
    }

    /**
     * Get valvulaPulmonarL2C1
     *
     * @return string
     */
    public function getValvulaPulmonarL2C1()
    {
        return $this->valvulaPulmonarL2C1;
    }

    /**
     * Set valvulaPulmonarL2C2
     *
     * @param string $valvulaPulmonarL2C2
     *
     * @return Ecocardiograma2d
     */
    public function setValvulaPulmonarL2C2($valvulaPulmonarL2C2)
    {
        $this->valvulaPulmonarL2C2 = $valvulaPulmonarL2C2;

        return $this;
    }

    /**
     * Get valvulaPulmonarL2C2
     *
     * @return string
     */
    public function getValvulaPulmonarL2C2()
    {
        return $this->valvulaPulmonarL2C2;
    }

    /**
     * Set valvulaPulmonarL2C3
     *
     * @param string $valvulaPulmonarL2C3
     *
     * @return Ecocardiograma2d
     */
    public function setValvulaPulmonarL2C3($valvulaPulmonarL2C3)
    {
        $this->valvulaPulmonarL2C3 = $valvulaPulmonarL2C3;

        return $this;
    }

    /**
     * Get valvulaPulmonarL2C3
     *
     * @return string
     */
    public function getValvulaPulmonarL2C3()
    {
        return $this->valvulaPulmonarL2C3;
    }

    /**
     * Set valvulatricuspideL1C1
     *
     * @param string $valvulatricuspideL1C1
     *
     * @return Ecocardiograma2d
     */
    public function setValvulatricuspideL1C1($valvulatricuspideL1C1)
    {
        $this->valvulatricuspideL1C1 = $valvulatricuspideL1C1;

        return $this;
    }

    /**
     * Get valvulatricuspideL1C1
     *
     * @return string
     */
    public function getValvulatricuspideL1C1()
    {
        return $this->valvulatricuspideL1C1;
    }

    /**
     * Set valvulatricuspideL1C2
     *
     * @param string $valvulatricuspideL1C2
     *
     * @return Ecocardiograma2d
     */
    public function setValvulatricuspideL1C2($valvulatricuspideL1C2)
    {
        $this->valvulatricuspideL1C2 = $valvulatricuspideL1C2;

        return $this;
    }

    /**
     * Get valvulatricuspideL1C2
     *
     * @return string
     */
    public function getValvulatricuspideL1C2()
    {
        return $this->valvulatricuspideL1C2;
    }

    /**
     * Set valvulatricuspideL2C1
     *
     * @param string $valvulatricuspideL2C1
     *
     * @return Ecocardiograma2d
     */
    public function setValvulatricuspideL2C1($valvulatricuspideL2C1)
    {
        $this->valvulatricuspideL2C1 = $valvulatricuspideL2C1;

        return $this;
    }

    /**
     * Get valvulatricuspideL2C1
     *
     * @return string
     */
    public function getValvulatricuspideL2C1()
    {
        return $this->valvulatricuspideL2C1;
    }

    /**
     * Set valvulatricuspideL2C2
     *
     * @param string $valvulatricuspideL2C2
     *
     * @return Ecocardiograma2d
     */
    public function setValvulatricuspideL2C2($valvulatricuspideL2C2)
    {
        $this->valvulatricuspideL2C2 = $valvulatricuspideL2C2;

        return $this;
    }

    /**
     * Get valvulatricuspideL2C2
     *
     * @return string
     */
    public function getValvulatricuspideL2C2()
    {
        return $this->valvulatricuspideL2C2;
    }

    /**
     * Set valvulatricuspideL2C3
     *
     * @param string $valvulatricuspideL2C3
     *
     * @return Ecocardiograma2d
     */
    public function setValvulatricuspideL2C3($valvulatricuspideL2C3)
    {
        $this->valvulatricuspideL2C3 = $valvulatricuspideL2C3;

        return $this;
    }

    /**
     * Get valvulatricuspideL2C3
     *
     * @return string
     */
    public function getValvulatricuspideL2C3()
    {
        return $this->valvulatricuspideL2C3;
    }

    /**
     * Set cavidadDerechaL1C1
     *
     * @param string $cavidadDerechaL1C1
     *
     * @return Ecocardiograma2d
     */
    public function setCavidadDerechaL1C1($cavidadDerechaL1C1)
    {
        $this->cavidadDerechaL1C1 = $cavidadDerechaL1C1;

        return $this;
    }

    /**
     * Get cavidadDerechaL1C1
     *
     * @return string
     */
    public function getCavidadDerechaL1C1()
    {
        return $this->cavidadDerechaL1C1;
    }

    /**
     * Set cavidadDerechaL1C2
     *
     * @param string $cavidadDerechaL1C2
     *
     * @return Ecocardiograma2d
     */
    public function setCavidadDerechaL1C2($cavidadDerechaL1C2)
    {
        $this->cavidadDerechaL1C2 = $cavidadDerechaL1C2;

        return $this;
    }

    /**
     * Get cavidadDerechaL1C2
     *
     * @return string
     */
    public function getCavidadDerechaL1C2()
    {
        return $this->cavidadDerechaL1C2;
    }

    /**
     * Set cavidadDerechaL1C3
     *
     * @param string $cavidadDerechaL1C3
     *
     * @return Ecocardiograma2d
     */
    public function setCavidadDerechaL1C3($cavidadDerechaL1C3)
    {
        $this->cavidadDerechaL1C3 = $cavidadDerechaL1C3;

        return $this;
    }

    /**
     * Get cavidadDerechaL1C3
     *
     * @return string
     */
    public function getCavidadDerechaL1C3()
    {
        return $this->cavidadDerechaL1C3;
    }

    /**
     * Set venaCavaInferiorL1C1
     *
     * @param string $venaCavaInferiorL1C1
     *
     * @return Ecocardiograma2d
     */
    public function setVenaCavaInferiorL1C1($venaCavaInferiorL1C1)
    {
        $this->venaCavaInferiorL1C1 = $venaCavaInferiorL1C1;

        return $this;
    }

    /**
     * Get venaCavaInferiorL1C1
     *
     * @return string
     */
    public function getVenaCavaInferiorL1C1()
    {
        return $this->venaCavaInferiorL1C1;
    }

    /**
     * Set pericardioL1C1
     *
     * @param string $pericardioL1C1
     *
     * @return Ecocardiograma2d
     */
    public function setPericardioL1C1($pericardioL1C1)
    {
        $this->pericardioL1C1 = $pericardioL1C1;

        return $this;
    }

    /**
     * Get pericardioL1C1
     *
     * @return string
     */
    public function getPericardioL1C1()
    {
        return $this->pericardioL1C1;
    }

    /**
     * Set pericardioL1C2
     *
     * @param string $pericardioL1C2
     *
     * @return Ecocardiograma2d
     */
    public function setPericardioL1C2($pericardioL1C2)
    {
        $this->pericardioL1C2 = $pericardioL1C2;

        return $this;
    }

    /**
     * Get pericardioL1C2
     *
     * @return string
     */
    public function getPericardioL1C2()
    {
        return $this->pericardioL1C2;
    }

    /**
     * Set pericardioL1C3
     *
     * @param string $pericardioL1C3
     *
     * @return Ecocardiograma2d
     */
    public function setPericardioL1C3($pericardioL1C3)
    {
        $this->pericardioL1C3 = $pericardioL1C3;

        return $this;
    }

    /**
     * Get pericardioL1C3
     *
     * @return string
     */
    public function getPericardioL1C3()
    {
        return $this->pericardioL1C3;
    }

    /**
     * Set conclusionLibre
     *
     * @param string $conclusionLibre
     *
     * @return Ecocardiograma2d
     */
    public function setConclusionLibre($conclusionLibre)
    {
        $this->conclusionLibre = $conclusionLibre;

        return $this;
    }

    /**
     * Get conclusionLibre
     *
     * @return string
     */
    public function getConclusionLibre()
    {
        return $this->conclusionLibre;
    }

    /**
     * Set conclusionL1C1
     *
     * @param string $conclusionL1C1
     *
     * @return Ecocardiograma2d
     */
    public function setConclusionL1C1($conclusionL1C1)
    {
        $this->conclusionL1C1 = $conclusionL1C1;

        return $this;
    }

    /**
     * Get conclusionL1C1
     *
     * @return string
     */
    public function getConclusionL1C1()
    {
        return $this->conclusionL1C1;
    }

    /**
     * Set conclusionL1C2
     *
     * @param string $conclusionL1C2
     *
     * @return Ecocardiograma2d
     */
    public function setConclusionL1C2($conclusionL1C2)
    {
        $this->conclusionL1C2 = $conclusionL1C2;

        return $this;
    }

    /**
     * Get conclusionL1C2
     *
     * @return string
     */
    public function getConclusionL1C2()
    {
        return $this->conclusionL1C2;
    }
}
