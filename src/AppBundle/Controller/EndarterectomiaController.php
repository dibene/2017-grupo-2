<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Endarterectomia;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;
use \Datetime;
/**
 * Endarterectomium controller.
 *
 * @Route("estudio/endarterectomia")
 */
class EndarterectomiaController extends Controller
{
    /**
     * Lists all endarterectomium entities.
     *
     * @Route("/", name="endarterectomia_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $endarterectomias = $em->getRepository('AppBundle:Endarterectomia')->findAll();

        return $this->render('endarterectomia/index.html.twig', array(
            'endarterectomias' => $endarterectomias,
        ));
    }

    /**
     * Creates a new endarterectomium entity.
     *
     * @Route("/new/paciente/{id}",  name="endarterectomia_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, $id)
    {
      $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($id);
      $user = $this->container->get('security.context')->getToken()->getUser();
      $medico = $this->getDoctrine()->getManager()->getRepository('AppBundle:Medico')->findOneByUsuario($user->getId());

        $endarterectomium = new Endarterectomia($medico, $paciente,$this->getDoctrine()->getManager());
        $form = $this->createForm('AppBundle\Form\EndarterectomiaType', $endarterectomium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($endarterectomium);
            $em->flush();
            $this->addFlash('mensaje', 'Estudio creado correctamente');

            return $this->redirectToRoute('endarterectomia_show', array('id' => $endarterectomium->getId(),
          'idPaciente' => $paciente->getId(),
          'medico' => $medico,
          'paciente' => $paciente,
          'estudio' => $endarterectomium));
        }

        return $this->render('endarterectomia/new.html.twig', array(
            'estudio' => $endarterectomium,
            'paciente' => $paciente,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a endarterectomium entity.
     *
     * @Route("/{id}/paciente/{idPaciente}", name="endarterectomia_show")
     * @Method("GET")
     */
    public function showAction(Endarterectomia $endarterectomium , $idPaciente)
    {
        $deleteForm = $this->createDeleteForm($endarterectomium);
        $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($idPaciente);
        $user = $this->container->get('security.context')->getToken()->getUser();
        $medico = $this->getDoctrine()->getManager()->getRepository('AppBundle:Medico')->findOneByUsuario($user->getId());

        return $this->render('endarterectomia/show.html.twig', array(
            'estudio' => $endarterectomium,
            'paciente' => $paciente,
            'medico' => $medico,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing endarterectomium entity.
     *
     * @Route("/{id}/edit/paciente/{idPaciente}", name="endarterectomia_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Endarterectomia $endarterectomium ,  $idPaciente)
    {
        $deleteForm = $this->createDeleteForm($endarterectomium);
        $editForm = $this->createForm('AppBundle\Form\EndarterectomiaType', $endarterectomium);
        $editForm->handleRequest($request);
        $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($idPaciente);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('mensaje', 'Estudio editado correctamente');

            return $this->redirectToRoute('endarterectomia_edit', array('id' => $endarterectomium->getId(),
            'estudio' => $endarterectomium,
            'paciente' => $paciente,
            'idPaciente' => $paciente->getId()
          ));
        }

        return $this->render('endarterectomia/edit.html.twig', array(
            'estudio' => $endarterectomium,
            'paciente' => $paciente,
            'idPaciente' => $paciente->getId(),
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a endarterectomium entity.
     *
     * @Route("/{id}", name="endarterectomia_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Endarterectomia $endarterectomium)
    {
        $form = $this->createDeleteForm($endarterectomium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($endarterectomium);
            $em->flush();
        }

        return $this->redirectToRoute('endarterectomia_index');
    }

    /**
     * Creates a form to delete a endarterectomium entity.
     *
     * @param Endarterectomia $endarterectomium The endarterectomium entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Endarterectomia $endarterectomium)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('endarterectomia_delete', array('id' => $endarterectomium->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
