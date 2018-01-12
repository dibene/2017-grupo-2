<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CardioResonancia;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Cardioresonancium controller.
 *
 * @Route("estudio/cardioresonancia")
 */
class CardioResonanciaController extends Controller
{
    /**
     * Lists all cardioResonancium entities.
     *
     * @Route("/", name="cardioresonancia_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cardioResonancias = $em->getRepository('AppBundle:CardioResonancia')->findAll();

        return $this->render('cardioresonancia/index.html.twig', array(
            'cardioResonancias' => $cardioResonancias,
        ));
    }

    /**
     * Creates a new cardioResonancium entity.
     *
     * @Route("/new/paciente/{id}", name="cardioresonancia_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request,$id)
    {
      $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($id);
      $user = $this->container->get('security.context')->getToken()->getUser();
      $medico = $this->getDoctrine()->getManager()->getRepository('AppBundle:Medico')->findOneByUsuario($user->getId());

        $cardioResonancium = new Cardioresonancia($medico, $paciente,$this->getDoctrine()->getManager());
        $form = $this->createForm('AppBundle\Form\CardioResonanciaType', $cardioResonancium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cardioResonancium);
            $em->flush();
            $this->addFlash('mensaje', 'Estudio creado correctamente');

            return $this->redirectToRoute('cardioresonancia_show', array('id' => $cardioResonancium->getId(),
            'idPaciente' => $paciente->getId(),
            'medico' => $medico,
            'paciente' => $paciente,
            'estudio' => $cardioResonancium
          ));
        }

        return $this->render('cardioresonancia/new.html.twig', array(
            'estudio' => $cardioResonancium,
            'paciente' => $paciente,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a cardioResonancium entity.
     *
     * @Route("/{id}/paciente/{idPaciente}", name="cardioresonancia_show")
     * @Method("GET")
     */
    public function showAction(CardioResonancia $cardioResonancium , $idPaciente)
    {
        $deleteForm = $this->createDeleteForm($cardioResonancium);
        $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($idPaciente);
        $user = $this->container->get('security.context')->getToken()->getUser();
        $medico = $this->getDoctrine()->getManager()->getRepository('AppBundle:Medico')->findOneByUsuario($user->getId());

        return $this->render('cardioresonancia/show.html.twig', array(
            'estudio' => $cardioResonancium,
            'paciente' => $paciente,
            'medico' => $medico,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing cardioResonancium entity.
     *
     * @Route("/{id}/edit/paciente/{idPaciente}", name="cardioresonancia_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CardioResonancia $cardioResonancium, $idPaciente )
    {
        $deleteForm = $this->createDeleteForm($cardioResonancium);
        $editForm = $this->createForm('AppBundle\Form\CardioResonanciaType', $cardioResonancium);
        $editForm->handleRequest($request);
        $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($idPaciente);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('mensaje', 'Estudio editado correctamente');

            return $this->redirectToRoute('cardioresonancia_edit', array('id' => $cardioResonancium->getId(),
            'estudio' => $cardioResonancium,
            'paciente' => $paciente,
            'idPaciente' => $paciente->getId()
          ));
        }

        return $this->render('cardioresonancia/edit.html.twig', array(
          'estudio' => $cardioResonancium,
          'paciente' => $paciente,
          'idPaciente' => $paciente->getId(),
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a cardioResonancium entity.
     *
     * @Route("/{id}", name="cardioresonancia_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, CardioResonancia $cardioResonancium)
    {
        $form = $this->createDeleteForm($cardioResonancium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cardioResonancium);
            $em->flush();
        }

        return $this->redirectToRoute('cardioresonancia_index');
    }

    /**
     * Creates a form to delete a cardioResonancium entity.
     *
     * @param CardioResonancia $cardioResonancium The cardioResonancium entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CardioResonancia $cardioResonancium)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cardioresonancia_delete', array('id' => $cardioResonancium->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
