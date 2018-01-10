<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CardiopatiasCongenitas;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * CardiopatiasCongenitas controller.
 *
 * @Route("estudio/cardiopatiascongenitas")
 */
class CardiopatiasCongenitasController extends Controller
{
    /**
     * Lists all cardiopatiascongenitas entities.
     *
     * @Route("/", name="cardiopatiascongenitas_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cardiopatiascongenitas = $em->getRepository('AppBundle:CardiopatiasCongenitas')->findAll();

        return $this->render('cardiopatiascongenitas/index.html.twig', array(
            'cardiopatiascongenitas' => $cardiopatiascongenitas,
        ));
    }

    /**
     * Creates a new cardiopatiascongenitas entity.
     *
     * @Route("/new/paciente/{id}", name="cardiopatiascongenitas_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request , $id)
    {
      $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($id);
      $user = $this->container->get('security.context')->getToken()->getUser();
      $medico = $this->getDoctrine()->getManager()->getRepository('AppBundle:Medico')->findOneByUsuario($user->getId());
        $cardiopatiascongenitas = new CardiopatiasCongenitas($medico, $paciente,$this->getDoctrine()->getManager());
        $form = $this->createForm('AppBundle\Form\CardiopatiasCongenitasType', $cardiopatiascongenitas);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cardiopatiascongenitas);
            $em->flush();

            return $this->redirectToRoute('cardiopatiascongenitas_show', array('id' => $cardiopatiascongenitas->getId(),
            'idPaciente' => $paciente->getId(),
            'medico' => $medico,
            'paciente' => $paciente,
            'estudio' => $cardiopatiascongenitas ));
        }

        return $this->render('cardiopatiascongenitas/new.html.twig', array(
            'estudio' => $cardiopatiascongenitas,
            'paciente' => $paciente,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a cardiopatiascongenitas entity.
     *
     * @Route("/{id}/paciente/{idPaciente}", name="cardiopatiascongenitas_show")
     * @Method("GET")
     */
    public function showAction(CardiopatiasCongenitas $cardiopatiascongenitas, $idPaciente)
    {
        $deleteForm = $this->createDeleteForm($cardiopatiascongenitas);
        $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($idPaciente);
        $user = $this->container->get('security.context')->getToken()->getUser();
        $medico = $this->getDoctrine()->getManager()->getRepository('AppBundle:Medico')->findOneByUsuario($user->getId());

        return $this->render('cardiopatiascongenitas/show.html.twig', array(
            'estudio' => $cardiopatiascongenitas,
            'paciente' => $paciente,
            'medico' => $medico,
            'delete_form' => $deleteForm->createView()
        ));
    }

    /**
     * Displays a form to edit an existing cardiopatiascongenitas entity.
     *
     * @Route("/{id}/edit/paciente/{idPaciente}", name="cardiopatiascongenitas_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CardiopatiasCongenitas $cardiopatiascongenitas ,  $idPaciente)
    {
        $deleteForm = $this->createDeleteForm($cardiopatiascongenitas);
        $editForm = $this->createForm('AppBundle\Form\CardiopatiasCongenitasType', $cardiopatiascongenitas);
        $editForm->handleRequest($request);
        $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($idPaciente);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cardiopatiascongenitas_edit', array('id' => $cardiopatiascongenitas->getId(),
            'estudio' => $cardiopatiascongenitas,
            'paciente' => $paciente,
            'idPaciente' => $paciente->getId()
          ));
        }

        return $this->render('cardiopatiascongenitas/edit.html.twig', array(
          'estudio' => $cardiopatiascongenitas,
          'paciente' => $paciente,
          'idPaciente' => $paciente->getId(),
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a cardiopatiascongenitas entity.
     *
     * @Route("/{id}", name="cardiopatiascongenitas_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, CardiopatiasCongenitas $cardiopatiascongenitas)
    {
        $form = $this->createDeleteForm($cardiopatiascongenitas);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cardiopatiascongenitas);
            $em->flush();
        }

        return $this->redirectToRoute('cardiopatiascongenitas_index');
    }

    /**
     * Creates a form to delete a cardiopatiascongenitas entity.
     *
     * @param cardiopatiascongenitas $cardiopatiascongenitas The cardiopatiascongenitas entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CardiopatiasCongenitas $cardiopatiascongenitas)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cardiopatiascongenitas_delete', array('id' => $cardiopatiascongenitas->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
