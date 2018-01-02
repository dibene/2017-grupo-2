<?php

namespace AppBundle\Controller;

use AppBundle\Entity\EcoDopplerColorArtMiemInfIzq;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;
use \Datetime;
/**
 * Ecodopplercolorartmieminfizq controller.
 *
 * @Route("estudio/ecodopplercolorartmieminfizq")
 */
class EcoDopplerColorArtMiemInfIzqController extends Controller
{
    /**
     * Lists all ecoDopplerColorArtMiemInfIzq entities.
     *
     * @Route("/", name="ecodopplercolorartmieminfizq_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ecoDopplerColorArtMiemInfIzqs = $em->getRepository('AppBundle:EcoDopplerColorArtMiemInfIzq')->findAll();

        return $this->render('ecodopplercolorartmieminfizq/index.html.twig', array(
            'ecoDopplerColorArtMiemInfIzqs' => $ecoDopplerColorArtMiemInfIzqs,
        ));
    }

    /**
     * Creates a new ecoDopplerColorArtMiemInfIzq entity.
     *
     * @Route("/new/paciente/{id}", name="ecodopplercolorartmieminfizq_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, $id)
    {
      $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($id);
      $user = $this->container->get('security.context')->getToken()->getUser();
      $medico = $this->getDoctrine()->getManager()->getRepository('AppBundle:Medico')->findOneByUsuario($user->getId());

        $ecoDopplerColorArtMiemInfIzq = new Ecodopplercolorartmieminfizq($medico, $paciente,$this->getDoctrine()->getManager());
        $form = $this->createForm('AppBundle\Form\EcoDopplerColorArtMiemInfIzqType', $ecoDopplerColorArtMiemInfIzq);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ecoDopplerColorArtMiemInfIzq);
            $em->flush();

            return $this->redirectToRoute('ecodopplercolorartmieminfizq_show', array('id' => $ecoDopplerColorArtMiemInfIzq->getId(),
          'idPaciente' => $paciente->getId(),
          'medico' => $medico,
          'paciente' => $paciente,
          'estudio' => $ecoDopplerColorArtMiemInfIzq));
        }

        return $this->render('ecodopplercolorartmieminfizq/new.html.twig', array(
            'estudio' => $ecoDopplerColorArtMiemInfIzq,
            'paciente' => $paciente,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ecoDopplerColorArtMiemInfIzq entity.
     *
     * @Route("/{id}/paciente/{idPaciente}", name="ecodopplercolorartmieminfizq_show")
     * @Method("GET")
     */
    public function showAction(EcoDopplerColorArtMiemInfIzq $ecoDopplerColorArtMiemInfIzq, $idPaciente)
    {
        $deleteForm = $this->createDeleteForm($ecoDopplerColorArtMiemInfIzq);
        $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($idPaciente);
        $user = $this->container->get('security.context')->getToken()->getUser();
        $medico = $this->getDoctrine()->getManager()->getRepository('AppBundle:Medico')->findOneByUsuario($user->getId());

        return $this->render('ecodopplercolorartmieminfizq/show.html.twig', array(
            'estudio' => $ecoDopplerColorArtMiemInfIzq,
            'paciente' => $paciente,
            'medico' => $medico,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ecoDopplerColorArtMiemInfIzq entity.
     *
     * @Route("/{id}/edit/paciente/{idPaciente}", name="ecodopplercolorartmieminfizq_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, EcoDopplerColorArtMiemInfIzq $ecoDopplerColorArtMiemInfIzq ,  $idPaciente)
    {
        $deleteForm = $this->createDeleteForm($ecoDopplerColorArtMiemInfIzq);
        $editForm = $this->createForm('AppBundle\Form\EcoDopplerColorArtMiemInfIzqType', $ecoDopplerColorArtMiemInfIzq);
        $editForm->handleRequest($request);
        $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($idPaciente);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ecodopplercolorartmieminfizq_edit', array('id' => $ecoDopplerColorArtMiemInfIzq->getId(),
            'estudio' => $ecoDopplerColorArtMiemInfIzq,
            'paciente' => $paciente,
            'idPaciente' => $paciente->getId()
          ));
        }

        return $this->render('ecodopplercolorartmieminfizq/edit.html.twig', array(
          'estudio' => $ecoDopplerColorArtMiemInfIzq,
          'paciente' => $paciente,
          'idPaciente' => $paciente->getId(),
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ecoDopplerColorArtMiemInfIzq entity.
     *
     * @Route("/{id}", name="ecodopplercolorartmieminfizq_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, EcoDopplerColorArtMiemInfIzq $ecoDopplerColorArtMiemInfIzq)
    {
        $form = $this->createDeleteForm($ecoDopplerColorArtMiemInfIzq);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ecoDopplerColorArtMiemInfIzq);
            $em->flush();
        }

        return $this->redirectToRoute('ecodopplercolorartmieminfizq_index');
    }

    /**
     * Creates a form to delete a ecoDopplerColorArtMiemInfIzq entity.
     *
     * @param EcoDopplerColorArtMiemInfIzq $ecoDopplerColorArtMiemInfIzq The ecoDopplerColorArtMiemInfIzq entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(EcoDopplerColorArtMiemInfIzq $ecoDopplerColorArtMiemInfIzq)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ecodopplercolorartmieminfizq_delete', array('id' => $ecoDopplerColorArtMiemInfIzq->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
