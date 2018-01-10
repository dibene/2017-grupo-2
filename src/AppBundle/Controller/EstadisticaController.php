<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use \Datetime;

/**
 * Especialidad controller.
 *
 * @Route("estadisticas")
 */
class EstadisticaController extends Controller
{
    /**
     * @Route("/", name="estadisticas_index")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('estadistica/index.html.twig', array(        ));
    }

    /**
     * @Route("/tipodeestudio", name="estadisticas_tipo_estudio")
     */
    public function tipodeestudioAction(Request $request)
    {
      $em = $this->getDoctrine()->getManager();
      $qb = $em->createQueryBuilder();
      $factual = new Datetime(date("Y-m-d"));
      $fdesde = new Datetime('2018-01-09');
      $fhasta = new Datetime('2018-01-10');
      $qb->select('ec.nombre, count(e.id) as cantidad')
          ->from('AppBundle:EstudioConfiguracion', 'ec')
          ->leftJoin('AppBundle:Estudio', 'e', 'WITH', 'e.estudioConfiguracion = ec ')
          ->where('e.fechaAlta >= :desde AND e.fechaAlta <= :hasta OR e.fechaAlta IS NULL ')
          ->setParameters(array('desde'=>$fdesde,'hasta'=>$fhasta ))
          ->groupby('ec.nombre')
          ->getQuery();
      $query = $qb->getQuery();
      $res=$query->getResult();
      $totalEstudios=0;
      foreach ($res as $r) {
        $totalEstudios+=$r['cantidad'];
      }
        // replace this example code with whatever you need
        return $this->render('estadistica/tipodeestudio.html.twig', array(
          'fdesde' => $fdesde,
          'fhasta' => $fhasta,
          'res' => $res,
          'totalEstudios' => $totalEstudios
         ));
    }

    /**
     * @Route("/diagnostico", name="estadisticas_diagnostico")
     */
    public function diagnosticoAction(Request $request)
    {
      $em = $this->getDoctrine()->getManager();
      $qb = $em->createQueryBuilder();
      $factual = new Datetime(date("Y-m-d"));
      $fdesde = new Datetime('2018-01-09');
      $fhasta = new Datetime('2018-01-10');
      
      $qb->select('d.nombre, count(e.id) as cantidad')
          ->from('AppBundle:GrupoDiagnostico', 'd')
          ->leftJoin('d.estudios', 'e')
          ->where(' (e.fechaAlta >= :desde AND e.fechaAlta <= :hasta OR e.fechaAlta IS NULL )')
          ->setParameters(array('desde'=>$fdesde,'hasta'=>$fhasta ))
          ->groupby('d.nombre')
          ->getQuery();
      $query = $qb->getQuery();
      $res=$query->getResult();

      $qb = $em->createQueryBuilder();
            $qb->select('a.id')
                ->from('AppBundle:Estudio', 'a')
                ->where('a.fechaAlta >= :desde AND a.fechaAlta <= :hasta ')
                ->setParameters(array('desde'=>$fdesde,'hasta'=>$fhasta ))
                ->getQuery();
            $query = $qb->getQuery();
            $estudios =$query->getResult();
            $totalEstudios = count($estudios);

      $total=0;
      foreach ($res as $r) {
        $total+=$r['cantidad'];
      }
        // replace this example code with whatever you need
        return $this->render('estadistica/diagnostico.html.twig', array(
          'fdesde' => $fdesde,
          'fhasta' => $fhasta,
          'res' => $res,
          'total' => $total,
          'totalEstudios' => $totalEstudios
         ));
    }
}
