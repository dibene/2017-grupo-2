<?php

namespace AppBundle\Controller;

use AppBundle\Entity\VenosoNormal;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Venosonormal controller.
 *
 * @Route("estudio/venosonormal")
 */
class VenosoNormalController extends Controller
{
    /**
     * Lists all venosoNormal entities.
     *
     * @Route("/", name="venosonormal_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $venosoNormals = $em->getRepository('AppBundle:VenosoNormal')->findAll();

        return $this->render('venosonormal/index.html.twig', array(
            'venosoNormals' => $venosoNormals,
        ));
    }

    /**
     * Creates a new venosoNormal entity.
     *
     * @Route("/new/paciente/{id}", name="venosonormal_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, $id)
    {
        $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($id);
        $user = $this->container->get('security.context')->getToken()->getUser();
        $medico = $this->getDoctrine()->getManager()->getRepository('AppBundle:Medico')->findOneByUsuario($user->getId());

        $venosoNormal = new VenosoNormal($medico, $paciente,$this->getDoctrine()->getManager());
        $form = $this->createForm('AppBundle\Form\VenosoNormalType', $venosoNormal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($venosoNormal);
            $em->flush();

            return $this->redirectToRoute('venosonormal_show', array(
                'id' => $venosoNormal->getId(),
                'idPaciente' => $paciente->getId(),
                'medico' => $medico,
                'paciente' => $paciente,
                'estudio' => $venosoNormal));
        }

        return $this->render('venosonormal/new.html.twig', array(
            'estudio' => $venosoNormal,
            'paciente' => $paciente,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a venosoNormal entity.
     *
     * @Route("/{id}/paciente/{idPaciente}", name="venosonormal_show")
     * @Method("GET")
     */
    public function showAction(VenosoNormal $venosoNormal, $idPaciente )
    {
        $deleteForm = $this->createDeleteForm($venosoNormal);
        $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($idPaciente);
        $user = $this->container->get('security.context')->getToken()->getUser();
        $medico = $this->getDoctrine()->getManager()->getRepository('AppBundle:Medico')->findOneByUsuario($user->getId());

        return $this->render('venosonormal/show.html.twig', array(
            'estudio' => $venosoNormal,
            'paciente' => $paciente,
            'medico' => $medico,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing venosoNormal entity.
     *
     * @Route("/{id}/edit/paciente/{idPaciente}", name="venosonormal_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, VenosoNormal $venosoNormal, $idPaciente)
    {
        $deleteForm = $this->createDeleteForm($venosoNormal);
        $editForm = $this->createForm('AppBundle\Form\VenosoNormalType', $venosoNormal);
        $editForm->handleRequest($request);
        $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($idPaciente);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('venosonormal_edit', array('id' => $venosoNormal->getId(),
            'estudio' => $venosoNormal,
            'paciente' => $paciente,
            'idPaciente' => $paciente->getId()
          ));
        }

        return $this->render('venosonormal/edit.html.twig', array(
            'estudio' => $venosoNormal,
            'paciente' => $paciente,
            'idPaciente' => $paciente->getId(),
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a venosoNormal entity.
     *
     * @Route("/{id}", name="venosonormal_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, VenosoNormal $venosoNormal)
    {
        $form = $this->createDeleteForm($venosoNormal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($venosoNormal);
            $em->flush();
        }

        return $this->redirectToRoute('venosonormal_index');
    }

    /**
     * Creates a form to delete a venosoNormal entity.
     *
     * @param VenosoNormal $venosoNormal The venosoNormal entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(VenosoNormal $venosoNormal)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('venosonormal_delete', array('id' => $venosoNormal->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
