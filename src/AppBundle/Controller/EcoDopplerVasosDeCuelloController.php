<?php

namespace AppBundle\Controller;

use AppBundle\Entity\EcoDopplerVasosDeCuello;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Ecodopplervasosdecuello controller.
 *
 * @Route("ecodopplervasosdecuello")
 */
class EcoDopplerVasosDeCuelloController extends Controller
{
    /**
     * Lists all ecoDopplerVasosDeCuello entities.
     *
     * @Route("/", name="ecodopplervasosdecuello_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ecoDopplerVasosDeCuellos = $em->getRepository('AppBundle:EcoDopplerVasosDeCuello')->findAll();

        return $this->render('ecodopplervasosdecuello/index.html.twig', array(
            'ecoDopplerVasosDeCuellos' => $ecoDopplerVasosDeCuellos,
        ));
    }

    /**
     * Creates a new ecoDopplerVasosDeCuello entity.
     *
       * @Route("/new/paciente/{id}", name="ecodopplervasosdecuello_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, $id)
    {
      $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($id);
    $user = $this->container->get('security.context')->getToken()->getUser();
    $medico = $this->getDoctrine()->getManager()->getRepository('AppBundle:Medico')->findOneByUsuario($user->getId());

        $ecoDopplerVasosDeCuello = new EcoDopplerVasosDecuello($medico, $paciente,$this->getDoctrine()->getManager());
        $form = $this->createForm('AppBundle\Form\EcoDopplerVasosDeCuelloType', $ecoDopplerVasosDeCuello);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ecoDopplerVasosDeCuello);
            $em->flush();
            $this->addFlash('mensaje', 'Estudio creado correctamente');

            return $this->redirectToRoute('ecodopplervasosdecuello_show', array('id' => $ecoDopplerVasosDeCuello->getId(),
          'idPaciente' => $paciente->getId(),
          'medico' => $medico,
          'paciente' => $paciente,
          'estudio' => $ecoDopplerVasosDeCuello));
        }

        return $this->render('ecodopplervasosdecuello/new.html.twig', array(
            'estudio' => $ecoDopplerVasosDeCuello,
            'paciente' => $paciente,
            'form' => $form->createView()
        ));
    }

    /**
     * Finds and displays a ecoDopplerVasosDeCuello entity.
     *
     * @Route("/{id}/paciente/{idPaciente}", name="ecodopplervasosdecuello_show")
     * @Method("GET")
     */
    public function showAction(EcoDopplerVasosDeCuello $ecoDopplerVasosDeCuello, $idPaciente)
    {
        $deleteForm = $this->createDeleteForm($ecoDopplerVasosDeCuello);
        $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($idPaciente);
        $user = $this->container->get('security.context')->getToken()->getUser();
        $medico = $this->getDoctrine()->getManager()->getRepository('AppBundle:Medico')->findOneByUsuario($user->getId());

        return $this->render('ecodopplervasosdecuello/show.html.twig', array(
            'estudio' => $ecoDopplerVasosDeCuello,
            'paciente' => $paciente,
            'medico' => $medico,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ecoDopplerVasosDeCuello entity.
     *
     * @Route("/{id}/edit/paciente/{idPaciente}", name="ecodopplervasosdecuello_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, EcoDopplerVasosDeCuello $ecoDopplerVasosDeCuello ,  $idPaciente)
    {
        $deleteForm = $this->createDeleteForm($ecoDopplerVasosDeCuello);
        $editForm = $this->createForm('AppBundle\Form\EcoDopplerVasosDeCuelloType', $ecoDopplerVasosDeCuello);
        $editForm->handleRequest($request);
        $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($idPaciente);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('mensaje', 'Estudio editado correctamente');

            return $this->redirectToRoute('ecodopplervasosdecuello_edit', array('id' => $ecoDopplerVasosDeCuello->getId(),
            'estudio' => $ecoDopplerVasosDeCuello,
            'paciente' => $paciente,));
        }

        return $this->render('ecodopplervasosdecuello/edit.html.twig', array(
            'estudio' => $ecoDopplerVasosDeCuello,
            'paciente' => $paciente,
            'idPaciente' => $paciente->getId(),
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ecoDopplerVasosDeCuello entity.
     *
     * @Route("/{id}", name="ecodopplervasosdecuello_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, EcoDopplerVasosDeCuello $ecoDopplerVasosDeCuello)
    {
        $form = $this->createDeleteForm($ecoDopplerVasosDeCuello);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ecoDopplerVasosDeCuello);
            $em->flush();
        }

        return $this->redirectToRoute('ecodopplervasosdecuello_index');
    }

    /**
     * Creates a form to delete a ecoDopplerVasosDeCuello entity.
     *
     * @param EcoDopplerVasosDeCuello $ecoDopplerVasosDeCuello The ecoDopplerVasosDeCuello entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(EcoDopplerVasosDeCuello $ecoDopplerVasosDeCuello)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ecodopplervasosdecuello_delete', array('id' => $ecoDopplerVasosDeCuello->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
