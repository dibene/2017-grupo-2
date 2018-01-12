<?php

namespace AppBundle\Controller;

use AppBundle\Entity\EcocardiogramaValoracionDisincronia;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use \Datetime;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\Response;
/**
 * Ecocardiogramavaloraciondisincronium controller.
 *
 * @Route("estudio/ecocardiogramavaloraciondisincronia")
 */
class EcocardiogramaValoracionDisincroniaController extends Controller
{
    /**
     * Lists all ecocardiogramaValoracionDisincronium entities.
     *
     * @Route("/", name="ecocardiogramavaloraciondisincronia_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ecocardiogramaValoracionDisincronias = $em->getRepository('AppBundle:EcocardiogramaValoracionDisincronia')->findAll();

        return $this->render('ecocardiogramavaloraciondisincronia/index.html.twig', array(
            'ecocardiogramaValoracionDisincronias' => $ecocardiogramaValoracionDisincronias,
        ));
    }

    /**
     * Creates a new ecocardiogramaValoracionDisincronium entity.
     *
     * @Route("/new/paciente/{id}", name="ecocardiogramavaloraciondisincronia_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, $id)
    {
            $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($id);
            $user = $this->container->get('security.context')->getToken()->getUser();
            $medico = $this->getDoctrine()->getManager()->getRepository('AppBundle:Medico')->findOneByUsuario($user->getId());

        $ecocardiogramaValoracionDisincronium = new EcocardiogramaValoracionDisincronia($medico, $paciente,$this->getDoctrine()->getManager());
        $form = $this->createForm('AppBundle\Form\EcocardiogramaValoracionDisincroniaType', $ecocardiogramaValoracionDisincronium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ecocardiogramaValoracionDisincronium);
            $em->flush();
            $this->addFlash('mensaje', 'Estudio creado correctamente');

            return $this->redirectToRoute('ecocardiogramavaloraciondisincronia_show', array('id' => $ecocardiogramaValoracionDisincronium->getId(),
          'idPaciente' => $paciente->getId(),
          'medico' => $medico,
          'paciente' => $paciente,
          'estudio' => $ecocardiogramaValoracionDisincronium));
        }

        return $this->render('ecocardiogramavaloraciondisincronia/new.html.twig', array(
            'estudio' => $ecocardiogramaValoracionDisincronium,
                        'paciente' => $paciente,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ecocardiogramaValoracionDisincronium entity.
     *
     * @Route("/{id}/paciente/{idPaciente}",  name="ecocardiogramavaloraciondisincronia_show")
     * @Method("GET")
     */
    public function showAction(EcocardiogramaValoracionDisincronia $ecocardiogramaValoracionDisincronium, $idPaciente)
    {
        $deleteForm = $this->createDeleteForm($ecocardiogramaValoracionDisincronium);
        $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($idPaciente);
        $user = $this->container->get('security.context')->getToken()->getUser();
        $medico = $this->getDoctrine()->getManager()->getRepository('AppBundle:Medico')->findOneByUsuario($user->getId());

        return $this->render('ecocardiogramavaloraciondisincronia/show.html.twig', array(
            'estudio' => $ecocardiogramaValoracionDisincronium,
            'paciente' => $paciente,
            'medico' => $medico,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ecocardiogramaValoracionDisincronium entity.
     *
     * @Route("/{id}/edit/paciente/{idPaciente}", name="ecocardiogramavaloraciondisincronia_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, EcocardiogramaValoracionDisincronia $ecocardiogramaValoracionDisincronium,  $idPaciente)
    {
        $deleteForm = $this->createDeleteForm($ecocardiogramaValoracionDisincronium);
        $editForm = $this->createForm('AppBundle\Form\EcocardiogramaValoracionDisincroniaType', $ecocardiogramaValoracionDisincronium);
        $editForm->handleRequest($request);
        $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($idPaciente);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('mensaje', 'Estudio editado correctamente');

            return $this->redirectToRoute('ecocardiogramavaloraciondisincronia_edit', array('id' => $ecocardiogramaValoracionDisincronium->getId(),
            'estudio' => $ecocardiogramaValoracionDisincronium,
            'paciente' => $paciente,
            'idPaciente' => $paciente->getId()
          ));
        }

        return $this->render('ecocardiogramavaloraciondisincronia/edit.html.twig', array(
        'paciente' => $paciente,
        'idPaciente' => $paciente->getId(),
            'estudio' => $ecocardiogramaValoracionDisincronium,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ecocardiogramaValoracionDisincronium entity.
     *
     * @Route("/{id}", name="ecocardiogramavaloraciondisincronia_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, EcocardiogramaValoracionDisincronia $ecocardiogramaValoracionDisincronium)
    {
        $form = $this->createDeleteForm($ecocardiogramaValoracionDisincronium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ecocardiogramaValoracionDisincronium);
            $em->flush();
        }

        return $this->redirectToRoute('ecocardiogramavaloraciondisincronia_index');
    }

    /**
     * Creates a form to delete a ecocardiogramaValoracionDisincronium entity.
     *
     * @param EcocardiogramaValoracionDisincronia $ecocardiogramaValoracionDisincronium The ecocardiogramaValoracionDisincronium entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(EcocardiogramaValoracionDisincronia $ecocardiogramaValoracionDisincronium)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ecocardiogramavaloraciondisincronia_delete', array('id' => $ecocardiogramaValoracionDisincronium->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
