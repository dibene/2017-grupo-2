<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Estudio;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 * Estudio controller.
 *
 * @Route("estudio")
 */
class EstudioController extends Controller
{

  /**
   * Lists all aortaAbdominalAteromatosa entities.
   *
   * @Route("/{id}/pdf/paciente/{idPaciente}", name="estudio_pdf")
   * @Method("GET")
   */
  public function pdfAction(Estudio $estudio , $idPaciente)
  {

    $deleteForm = $this->createDeleteForm($estudio);
    $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($idPaciente);
    $user = $this->container->get('security.context')->getToken()->getUser();
    $medico = $this->getDoctrine()->getManager()->getRepository('AppBundle:Medico')->findOneByUsuario($user->getId());

      $snappy = $this->get('knp_snappy.pdf');
      $filename = 'estudio';
      $link = $estudio->getEstudioConfiguracion()->getLink().'/estudioPDF.html.twig';
      $html = $this->render($link, array(
        'id' => $estudio->getId(),
        'idPaciente' => $paciente->getId(),
        'estudio' => $estudio,
        'paciente' => $paciente,
        'medico' => $medico,
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
     * Lists all estudio entities.
     *
     *  @Route("/paciente/{id}", name="estudio_index")
     * @Method({"GET", "POST"})
     */
    public function indexAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $paciente = $em->getRepository('AppBundle:Paciente')->find($id);
        $estudios = $em->getRepository('AppBundle:Estudio')->findByPaciente($paciente);
        $nombreEstudios = $em->getRepository('AppBundle:EstudioConfiguracion')->findAll();

        $form = $this->createFormBuilder($estudios)
          ->add('fechaAlta',DateType::class , array('required' => false, 'widget' => 'single_text','attr' => array('class'=>'datepicker')))
          ->add('nombre', EntityType::class,  array('required' => false,
            'class' => 'AppBundle:EstudioConfiguracion',
            'choice_label' => 'nombre'))
          ->add('buscar', SubmitType::class ,  array( 'attr' => array('class' => 'btn waves-effect waves-light red' , 'style' => 'margin-top:40px;') ) )
          ->getForm();
          $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
          $estudioConfiguracion = $form->get('nombre')->getData();
          $fecha = $form->get('fechaAlta')->getData();
          $criterios = array();
          $criterios['paciente'] = $paciente;
          if($estudioConfiguracion!=null || $fecha != null ){
            if($estudioConfiguracion != null){
              $criterios['estudioConfiguracion'] = $estudioConfiguracion;
            }
            if($fecha != null){
              $criterios['fechaAlta'] = $fecha;
            }
            $estudios = $em->getRepository('AppBundle:Estudio')->findBy($criterios);
          }else {
            $estudios = array();
          }
        }

        return $this->render('estudio/index.html.twig', array(
            'paciente' => $paciente,
            'nombreEstudios' => $nombreEstudios,
            'estudios' => $estudios,
            'form' => $form->createView()

        ));
    }
    /**
     * Lists all estudios realizados entities.
     *
     *  @Route("/realizados", name="estudio_realizados")
     * @Method({"GET", "POST"})
     */
    public function realizadosAction(Request $request)
    {
      $em = $this->getDoctrine()->getManager();

      $user = $this->container->get('security.context')->getToken()->getUser();
      $medico = $this->getDoctrine()->getManager()->getRepository('AppBundle:Medico')->findOneByUsuario($user->getId());
      $nombreEstudios = $em->getRepository('AppBundle:EstudioConfiguracion')->findAll();
      $estudios = $em->getRepository('AppBundle:Estudio')->findByMedico($medico);

      $form = $this->createFormBuilder($estudios)
        ->add('fechaAlta',DateType::class , array('required' => false, 'widget' => 'single_text','attr' => array('class'=>'datepicker')))
        ->add('nombre', EntityType::class,  array('required' => false,
          'class' => 'AppBundle:EstudioConfiguracion',
          'choice_label' => 'nombre'))
        ->add('buscar', SubmitType::class ,  array( 'attr' => array('class' => 'btn waves-effect waves-light red' , 'style' => 'margin-top:40px;') ) )
        ->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
          $estudioConfiguracion = $form->get('nombre')->getData();
          $fecha = $form->get('fechaAlta')->getData();
          $criterios = array();
          $criterios['medico'] = $medico;
          if($estudioConfiguracion!=null || $fecha != null ){
            if($estudioConfiguracion != null){
              $criterios['estudioConfiguracion'] = $estudioConfiguracion;
            }
            if($fecha != null){
              $criterios['fechaAlta'] = $fecha;
            }
            $estudios = $em->getRepository('AppBundle:Estudio')->findBy($criterios);
          }else {
            $estudios = array();
          }
        }
        return $this->render('estudio/realizados.html.twig', array(
            'medico' => $medico,
            'estudios' => $estudios,
            'nombreEstudios' => $nombreEstudios,
            'form' => $form->createView()
        ));
    }

    /**
     * Creates a new estudio entity.
     *
     * @Route("/new/paciente/{id}", name="estudio_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request , $id)
    {
      $em = $this->getDoctrine()->getManager();

      $paciente = $em->getRepository('AppBundle:Paciente')->find($id);

      $nombreEstudios = $em->getRepository('AppBundle:EstudioConfiguracion')->findAll();

        return $this->render('estudio/new.html.twig', array(
            'paciente' => $paciente,
            'nombreEstudios' => $nombreEstudios,
        ));
    }

    /**
     * Finds and displays a estudio entity.
     *
     * @Route("/{id}", name="estudio_show")
     * @Method("GET")
     */
    public function showAction(Estudio $estudio)
    {
        $deleteForm = $this->createDeleteForm($estudio);

        return $this->render('estudio/show.html.twig', array(
            'estudio' => $estudio,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing estudio entity.
     *
     * @Route("/{id}/edit", name="estudio_edit")
     * @Method({"GET", "POST"})
     */


    public function editAction(Request $request, Estudio $estudio)
    {
        $deleteForm = $this->createDeleteForm($estudio);
        $editForm = $this->createForm('AppBundle\Form\EstudioType', $estudio);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('estudio_edit', array('id' => $estudio->getId()));
        }

        return $this->render('estudio/edit.html.twig', array(
            'estudio' => $estudio,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a estudio entity.
     *
     * @Route("/{id}", name="estudio_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Estudio $estudio)
    {
        $form = $this->createDeleteForm($estudio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($estudio);
            $em->flush();
        }

        return $this->redirectToRoute('estudio_index');
    }

    /**
     * Creates a form to delete a estudio entity.
     *
     * @param Estudio $estudio The estudio entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Estudio $estudio)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('estudio_delete', array('id' => $estudio->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
