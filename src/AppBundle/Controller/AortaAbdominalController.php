<?php

namespace AppBundle\Controller;

use AppBundle\Entity\AortaAbdominal;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use \Datetime;

/**
 * Aortaabdominal controller.
 *
 * @Route("estudio/aortaabdominal")
 */
class AortaAbdominalController extends Controller
{
    /**
     * Lists all aortaAbdominal entities.
     *
     * @Route("/", name="aortaabdominal_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $aortaAbdominals = $em->getRepository('AppBundle:AortaAbdominal')->findAll();

        return $this->render('aortaabdominal/index.html.twig', array(
            'aortaAbdominals' => $aortaAbdominals,
        ));
    }

    /**
     * Creates a new aortaAbdominal entity.
     *
     * @Route("/new/paciente/{id}", name="aortaabdominal_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request , $id)
    {
      $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($id);
      $user = $this->container->get('security.context')->getToken()->getUser();
      $medico = $this->getDoctrine()->getManager()->getRepository('AppBundle:Medico')->findOneByUsuario($user->getId());

        $aortaAbdominal = new AortaAbdominal($medico, $paciente,$this->getDoctrine()->getManager());
        $form = $this->createForm('AppBundle\Form\AortaAbdominalType', $aortaAbdominal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($aortaAbdominal);
            $em->flush();
            $this->addFlash('mensaje', 'Estudio creado correctamente');

            return $this->redirectToRoute('aortaabdominal_show', array('id' => $aortaAbdominal->getId(),
          'idPaciente' => $paciente->getId(),
          'medico' => $medico,
          'paciente' => $paciente,
          'estudio' => $aortaAbdominal));
        }

        return $this->render('aortaabdominal/new.html.twig', array(
            'aortaAbdominal' => $aortaAbdominal,
            'paciente' => $paciente,
            'form' => $form->createView(),
            'estudio' => $aortaAbdominal));

    }

    /**
     * Finds and displays a aortaAbdominal entity.
     *
     * @Route("/{id}/paciente/{idPaciente}", name="aortaabdominal_show")
     * @Method("GET")
     */
    public function showAction(AortaAbdominal $aortaAbdominal, $idPaciente)
    {
        $deleteForm = $this->createDeleteForm($aortaAbdominal);
        $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($idPaciente);
        $user = $this->container->get('security.context')->getToken()->getUser();
        $medico = $this->getDoctrine()->getManager()->getRepository('AppBundle:Medico')->findOneByUsuario($user->getId());

        return $this->render('aortaabdominal/show.html.twig', array(
            'estudio' => $aortaAbdominal,
            'paciente' => $paciente,
            'medico' => $medico,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing aortaAbdominal entity.
     *
     * @Route("/{id}/edit/paciente/{idPaciente}", name="aortaabdominal_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, AortaAbdominal $aortaAbdominal ,  $idPaciente)
    {
        $deleteForm = $this->createDeleteForm($aortaAbdominal);
        $editForm = $this->createForm('AppBundle\Form\AortaAbdominalType', $aortaAbdominal);
        $editForm->handleRequest($request);
        $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($idPaciente);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('aortaabdominal_edit', array('id' => $aortaAbdominal->getId(),
            'estudio' => $aortaAbdominal,
            'paciente' => $paciente,
            'idPaciente' => $paciente->getId()
          ));
        }

        return $this->render('aortaabdominal/edit.html.twig', array(
          'estudio' => $aortaAbdominal,
          'paciente' => $paciente,
          'idPaciente' => $paciente->getId(),
          'edit_form' => $editForm->createView(),
          'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a aortaAbdominal entity.
     *
     * @Route("/{id}", name="aortaabdominal_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, AortaAbdominal $aortaAbdominal)
    {
        $form = $this->createDeleteForm($aortaAbdominal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($aortaAbdominal);
            $em->flush();
        }

        return $this->redirectToRoute('aortaabdominal_index');
    }

    /**
     * Creates a form to delete a aortaAbdominal entity.
     *
     * @param AortaAbdominal $aortaAbdominal The aortaAbdominal entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(AortaAbdominal $aortaAbdominal)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('aortaabdominal_delete', array('id' => $aortaAbdominal->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
