<?php

namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use \Datetime;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\Response;
/**
 * Especialidad controller.
 *
 * @Route("estadisticas")
 */
class EstadisticaController extends Controller
{
  /**
   *
   * @Route("/tipodeestudiopdf/desde/{fdesde}/hasta/{fhasta}", name="tipodeestudio_pdf")
   * @Method("GET")
   */
  public function tipodeestudiopdfAction($fdesde,$fhasta)
  {

      $snappy = $this->get('knp_snappy.pdf');
      $filename = 'estadistica';

      $em = $this->getDoctrine()->getManager();
      $qb = $em->createQueryBuilder();
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
        $html = $this->renderView('estadistica/tipodeestudioPDF.html.twig', array(
          'fdesde' => $fdesde,
          'fhasta' => $fhasta,
          'res' => $res,
          'totalEstudios' => $totalEstudios
         ));

      return new Response(
          $snappy->getOutputFromHtml($html),
          200,
          array(
              'Content-Type'          => 'application/pdf',
              'Content-Disposition'   => 'inline; filename="'.$filename.'.pdf"'
          )
      );
  }
  /**
   *
   * @Route("/diagnosticopdf/desde/{fdesde}/hasta/{fhasta}", name="diagnostico_pdf")
   * @Method("GET")
   */
  public function diagnosticopdfAction($fdesde,$fhasta)
  {

      $snappy = $this->get('knp_snappy.pdf');
      $filename = 'estadistica';

      $em = $this->getDoctrine()->getManager();
      $qb = $em->createQueryBuilder();

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
        $html = $this->renderView('estadistica/diagnosticoPDF.html.twig', array(
          'fdesde' => $fdesde,
          'fhasta' => $fhasta,
          'res' => $res,
          'total' => $total,
          'totalEstudios' => $totalEstudios
         ));

      return new Response(
          $snappy->getOutputFromHtml($html),
          200,
          array(
              'Content-Type'          => 'application/pdf',
              'Content-Disposition'   => 'inline; filename="'.$filename.'.pdf"'
          )
      );
  }

  /**
   *
   * @Route("/datospdf/desde/{fdesde}/hasta/{fhasta}", name="datos_pdf")
   * @Method("GET")
   */
  public function datospdfAction($fdesde,$fhasta)
  {

      $snappy = $this->get('knp_snappy.pdf');
      $filename = 'estadistica';

      $em = $this->getDoctrine()->getManager();
      $qb = $em->createQueryBuilder();
      $qb->select('e.internacion, count(e.id) as cantidad')
          ->from('AppBundle:Estudio', 'e')
          ->where('(e.fechaAlta >= :desde AND e.fechaAlta <= :hasta OR e.fechaAlta IS NULL) ')
          ->setParameters(array('desde'=>$fdesde,'hasta'=>$fhasta ))
          ->groupby('e.internacion')
          ->getQuery();
      $query = $qb->getQuery();
      $res=$query->getResult();


      $qb = $em->createQueryBuilder();
      $qb->select('p.localidad, count(e.id) as cantidad')
          ->from('AppBundle:Estudio', 'e')
          ->leftJoin('e.paciente', 'p')
          ->where('(e.fechaAlta >= :desde AND e.fechaAlta <= :hasta OR e.fechaAlta IS NULL) ')
          ->setParameters(array('desde'=>$fdesde,'hasta'=>$fhasta ))
          ->groupby('p.localidad')
          ->getQuery();
      $query = $qb->getQuery();
      $res2=$query->getResult();

      $totalEstudios=0;
      foreach ($res as $r) {
        $totalEstudios+=$r['cantidad'];
      }
        // replace this example code with whatever you need
        $html = $this->renderView('estadistica/datosPDF.html.twig', array(
          'fdesde' => $fdesde,
          'fhasta' => $fhasta,
          'res' => $res,
          'res2' => $res2,
          'totalEstudios' => $totalEstudios
         ));
      return new Response(
          $snappy->getOutputFromHtml($html),
          200,
          array(
              'Content-Type'          => 'application/pdf',
              'Content-Disposition'   => 'inline; filename="'.$filename.'.pdf"'
          )
      );
  }
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
      $form = $this->createFormBuilder()
      ->add('fdesde',DateType::class , array('required' => true, 'widget' => 'single_text','attr' => array('class'=>'datepicker')))
      ->add('fhasta',DateType::class , array('required' => true, 'widget' => 'single_text','attr' => array('class'=>'datepicker')))
      ->add('generar', SubmitType::class ,  array( 'attr' => array('class' => 'btn waves-effect waves-light red' , 'style' => 'margin-top:40px;') ) )
      ->getForm();
      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {
        // valores formulario
        $fdesde = $form->get('fdesde')->getData();
        $fhasta = $form->get('fhasta')->getData();
      }else {
        //default
        $fhasta = new Datetime(date("Y-m-d"));
        $fecha = date('Y-m-d');
        $fdesde = strtotime ( '-1 month' , strtotime ( $fecha ) ) ;
        $fdesde = new Datetime(date ( 'Y-m-d' , $fdesde ));
      }
      $em = $this->getDoctrine()->getManager();
      $qb = $em->createQueryBuilder();
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
          'form' => $form->createView(),
          'fdesde' => $fdesde,
          'fhasta' => $fhasta,
          'res' => $res,
          'totalEstudios' => $totalEstudios
         ));
    }

    /**
     * @Route("/datos", name="estadisticas_datos")
     */
    public function datosAction(Request $request)
    {
      $form = $this->createFormBuilder()
      ->add('fdesde',DateType::class , array('required' => true, 'widget' => 'single_text','attr' => array('class'=>'datepicker')))
      ->add('fhasta',DateType::class , array('required' => true, 'widget' => 'single_text','attr' => array('class'=>'datepicker')))
      ->add('generar', SubmitType::class ,  array( 'attr' => array('class' => 'btn waves-effect waves-light red' , 'style' => 'margin-top:40px;') ) )
      ->getForm();
      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {
        // valores formulario
        $fdesde = $form->get('fdesde')->getData();
        $fhasta = $form->get('fhasta')->getData();
      }else {
        //default
        $fhasta = new Datetime(date("Y-m-d"));
        $fecha = date('Y-m-d');
        $fdesde = strtotime ( '-1 month' , strtotime ( $fecha ) ) ;
        $fdesde = new Datetime(date ( 'Y-m-d' , $fdesde ));
      }
      $em = $this->getDoctrine()->getManager();
      $qb = $em->createQueryBuilder();
      $qb->select('e.internacion, count(e.id) as cantidad')
          ->from('AppBundle:Estudio', 'e')
          ->where('(e.fechaAlta >= :desde AND e.fechaAlta <= :hasta OR e.fechaAlta IS NULL) ')
          ->setParameters(array('desde'=>$fdesde,'hasta'=>$fhasta ))
          ->groupby('e.internacion')
          ->getQuery();
      $query = $qb->getQuery();
      $res=$query->getResult();


      $qb = $em->createQueryBuilder();
      $qb->select('p.localidad, count(e.id) as cantidad')
          ->from('AppBundle:Estudio', 'e')
          ->leftJoin('e.paciente', 'p')
          ->where('(e.fechaAlta >= :desde AND e.fechaAlta <= :hasta OR e.fechaAlta IS NULL) ')
          ->setParameters(array('desde'=>$fdesde,'hasta'=>$fhasta ))
          ->groupby('p.localidad')
          ->getQuery();
      $query = $qb->getQuery();
      $res2=$query->getResult();

      $totalEstudios=0;
      foreach ($res as $r) {
        $totalEstudios+=$r['cantidad'];
      }
        // replace this example code with whatever you need
        return $this->render('estadistica/datos.html.twig', array(
          'form' => $form->createView(),
          'fdesde' => $fdesde,
          'fhasta' => $fhasta,
          'res' => $res,
          'res2' => $res2,
          'totalEstudios' => $totalEstudios
         ));
    }

    /**
     * @Route("/diagnostico", name="estadisticas_diagnostico")
     * @Method({"GET", "POST"})
     */
    public function diagnosticoAction(Request $request)
    {

      $form = $this->createFormBuilder()
      ->add('fdesde',DateType::class , array('required' => true, 'widget' => 'single_text','attr' => array('class'=>'datepicker')))
      ->add('fhasta',DateType::class , array('required' => true, 'widget' => 'single_text','attr' => array('class'=>'datepicker')))
      ->add('generar', SubmitType::class ,  array( 'attr' => array('class' => 'btn waves-effect waves-light red' , 'style' => 'margin-top:40px;') ) )
      ->getForm();
      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {
        // valores formulario
        $fdesde = $form->get('fdesde')->getData();
        $fhasta = $form->get('fhasta')->getData();
      }else {
        //default
        $fhasta = new Datetime(date("Y-m-d"));
        $fecha = date('Y-m-d');
        $fdesde = strtotime ( '-1 month' , strtotime ( $fecha ) ) ;
        $fdesde = new Datetime(date ( 'Y-m-d' , $fdesde ));
      }

      $em = $this->getDoctrine()->getManager();
      $qb = $em->createQueryBuilder();

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
          'form' => $form->createView(),
          'fdesde' => $fdesde,
          'fhasta' => $fhasta,
          'res' => $res,
          'total' => $total,
          'totalEstudios' => $totalEstudios
         ));
    }
    /**
     * @Route("/paciente", name="estadisticas_paciente")
     */
    public function pacienteAction(Request $request)
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
