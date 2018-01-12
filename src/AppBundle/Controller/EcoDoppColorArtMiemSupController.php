<?php

namespace AppBundle\Controller;

use AppBundle\Entity\EcoDoppColorArtMiemSup;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;
use \Datetime;
/**
 * Ecodoppcolorartmiemsup controller.
 *
 * @Route("estudio/ecodoppcolorartmiemsup")
 */
class EcoDoppColorArtMiemSupController extends Controller
{
    /**
     * Lists all ecoDoppColorArtMiemSup entities.
     *
     * @Route("/", name="ecodoppcolorartmiemsup_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ecoDoppColorArtMiemSups = $em->getRepository('AppBundle:EcoDoppColorArtMiemSup')->findAll();

        return $this->render('ecodoppcolorartmiemsup/index.html.twig', array(
            'ecoDoppColorArtMiemSups' => $ecoDoppColorArtMiemSups,
        ));
    }

    /**
     * Creates a new ecoDoppColorArtMiemSup entity.
     *
     * @Route("/new/paciente/{id}", name="ecodoppcolorartmiemsup_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, $id)
    {
      $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($id);
      $user = $this->container->get('security.context')->getToken()->getUser();
      $medico = $this->getDoctrine()->getManager()->getRepository('AppBundle:Medico')->findOneByUsuario($user->getId());

        $ecoDoppColorArtMiemSup = new Ecodoppcolorartmiemsup($medico, $paciente,$this->getDoctrine()->getManager());
        $form = $this->createForm('AppBundle\Form\EcoDoppColorArtMiemSupType', $ecoDoppColorArtMiemSup);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ecoDoppColorArtMiemSup);
            $em->flush();
            $this->addFlash('mensaje', 'Estudio creado correctamente');

            return $this->redirectToRoute('ecodoppcolorartmiemsup_show', array('id' => $ecoDoppColorArtMiemSup->getId(),
          'idPaciente' => $paciente->getId(),
          'medico' => $medico,
          'paciente' => $paciente,
          'estudio' => $ecoDoppColorArtMiemSup));
        }

        return $this->render('ecodoppcolorartmiemsup/new.html.twig', array(
            'estudio' => $ecoDoppColorArtMiemSup,
            'paciente' => $paciente,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ecoDoppColorArtMiemSup entity.
     *
     * @Route("/{id}/paciente/{idPaciente}", name="ecodoppcolorartmiemsup_show")
     * @Method("GET")
     */
    public function showAction(EcoDoppColorArtMiemSup $ecoDoppColorArtMiemSup, $idPaciente)
    {
        $deleteForm = $this->createDeleteForm($ecoDoppColorArtMiemSup);
        $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($idPaciente);
        $user = $this->container->get('security.context')->getToken()->getUser();
        $medico = $this->getDoctrine()->getManager()->getRepository('AppBundle:Medico')->findOneByUsuario($user->getId());

        return $this->render('ecodoppcolorartmiemsup/show.html.twig', array(
            'estudio' => $ecoDoppColorArtMiemSup,
            'paciente' => $paciente,
            'medico' => $medico,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ecoDoppColorArtMiemSup entity.
     *
     * @Route("/{id}/edit/paciente/{idPaciente}", name="ecodoppcolorartmiemsup_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, EcoDoppColorArtMiemSup $ecoDoppColorArtMiemSup ,  $idPaciente)
    {
        $deleteForm = $this->createDeleteForm($ecoDoppColorArtMiemSup);
        $editForm = $this->createForm('AppBundle\Form\EcoDoppColorArtMiemSupType', $ecoDoppColorArtMiemSup);
        $editForm->handleRequest($request);
        $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($idPaciente);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('mensaje', 'Estudio editado correctamente');

            return $this->redirectToRoute('ecodoppcolorartmiemsup_edit', array('id' => $ecoDoppColorArtMiemSup->getId(),
            'estudio' => $ecoDoppColorArtMiemSup,
            'paciente' => $paciente,
            'idPaciente' => $paciente->getId()
          ));
        }

        return $this->render('ecodoppcolorartmiemsup/edit.html.twig', array(
          'estudio' => $ecoDoppColorArtMiemSup,
          'paciente' => $paciente,
          'idPaciente' => $paciente->getId(),
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ecoDoppColorArtMiemSup entity.
     *
     * @Route("/{id}", name="ecodoppcolorartmiemsup_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, EcoDoppColorArtMiemSup $ecoDoppColorArtMiemSup)
    {
        $form = $this->createDeleteForm($ecoDoppColorArtMiemSup);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ecoDoppColorArtMiemSup);
            $em->flush();
        }

        return $this->redirectToRoute('ecodoppcolorartmiemsup_index');
    }

    /**
     * Creates a form to delete a ecoDoppColorArtMiemSup entity.
     *
     * @param EcoDoppColorArtMiemSup $ecoDoppColorArtMiemSup The ecoDoppColorArtMiemSup entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(EcoDoppColorArtMiemSup $ecoDoppColorArtMiemSup)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ecodoppcolorartmiemsup_delete', array('id' => $ecoDoppColorArtMiemSup->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
