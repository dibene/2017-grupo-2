<?php

namespace AppBundle\Controller;

use AppBundle\Entity\EcoCardiogramaInySolSalAgit;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use \Datetime;
/**
 * Ecocardiogramainysolsalagit controller.
 *
 * @Route("estudio/ecocardiogramainysolsalagit")
 */
class EcoCardiogramaInySolSalAgitController extends Controller
{
    /**
     * Lists all ecoCardiogramaInySolSalAgit entities.
     *
     * @Route("/", name="ecocardiogramainysolsalagit_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ecoCardiogramaInySolSalAgits = $em->getRepository('AppBundle:EcoCardiogramaInySolSalAgit')->findAll();

        return $this->render('ecocardiogramainysolsalagit/index.html.twig', array(
            'ecoCardiogramaInySolSalAgits' => $ecoCardiogramaInySolSalAgits,
        ));
    }

    /**
     * Creates a new ecoCardiogramaInySolSalAgit entity.
     *
     * @Route("/new/paciente/{id}", name="ecocardiogramainysolsalagit_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, $id)
    {
      $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($id);
      $user = $this->container->get('security.context')->getToken()->getUser();
      $medico = $this->getDoctrine()->getManager()->getRepository('AppBundle:Medico')->findOneByUsuario($user->getId());

      $ecoCardiogramaInySolSalAgit = new EcoCardiogramaInySolSalAgit($medico, $paciente,$this->getDoctrine()->getManager());
        $form = $this->createForm('AppBundle\Form\EcoCardiogramaInySolSalAgitType', $ecoCardiogramaInySolSalAgit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ecoCardiogramaInySolSalAgit);
            $em->flush();
            $this->addFlash('mensaje', 'Estudio creado correctamente');

            return $this->redirectToRoute('ecocardiogramainysolsalagit_show', array('id' => $ecoCardiogramaInySolSalAgit->getId(),
          'idPaciente' => $paciente->getId(),
          'medico' => $medico,
          'paciente' => $paciente,
          'estudio' => $ecoCardiogramaInySolSalAgit));
        }


        return $this->render('ecocardiogramainysolsalagit/new.html.twig', array(
            'estudio' => $ecoCardiogramaInySolSalAgit,
            'paciente' => $paciente,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ecoCardiogramaInySolSalAgit entity.
     *
     * @Route("/{id}/paciente/{idPaciente}", name="ecocardiogramainysolsalagit_show")
     * @Method("GET")
     */
    public function showAction(EcoCardiogramaInySolSalAgit $ecoCardiogramaInySolSalAgit, $idPaciente)
    {
        $deleteForm = $this->createDeleteForm($ecoCardiogramaInySolSalAgit);
        $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($idPaciente);
        $user = $this->container->get('security.context')->getToken()->getUser();
        $medico = $this->getDoctrine()->getManager()->getRepository('AppBundle:Medico')->findOneByUsuario($user->getId());
        return $this->render('ecocardiogramainysolsalagit/show.html.twig', array(
            'estudio' => $ecoCardiogramaInySolSalAgit,
            'paciente' => $paciente,
            'medico' => $medico,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ecoCardiogramaInySolSalAgit entity.
     *
     * @Route("/{id}/edit/paciente/{idPaciente}", name="ecocardiogramainysolsalagit_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, EcoCardiogramaInySolSalAgit $ecoCardiogramaInySolSalAgit ,  $idPaciente)
    {
        $deleteForm = $this->createDeleteForm($ecoCardiogramaInySolSalAgit);
        $editForm = $this->createForm('AppBundle\Form\EcoCardiogramaInySolSalAgitType', $ecoCardiogramaInySolSalAgit);
        $editForm->handleRequest($request);
        $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($idPaciente);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('mensaje', 'Estudio editado correctamente');

            return $this->redirectToRoute('ecocardiogramainysolsalagit_edit', array('id' => $ecoCardiogramaInySolSalAgit->getId(),
            'estudio' => $ecoCardiogramaInySolSalAgit,
            'paciente' => $paciente,
            'idPaciente' => $paciente->getId()
          ));
        }

        return $this->render('ecocardiogramainysolsalagit/edit.html.twig', array(
          'estudio' => $ecoCardiogramaInySolSalAgit,
          'paciente' => $paciente,
          'idPaciente' => $paciente->getId(),
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ecoCardiogramaInySolSalAgit entity.
     *
     * @Route("/{id}", name="ecocardiogramainysolsalagit_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, EcoCardiogramaInySolSalAgit $ecoCardiogramaInySolSalAgit)
    {
        $form = $this->createDeleteForm($ecoCardiogramaInySolSalAgit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ecoCardiogramaInySolSalAgit);
            $em->flush();
        }

        return $this->redirectToRoute('ecocardiogramainysolsalagit_index');
    }

    /**
     * Creates a form to delete a ecoCardiogramaInySolSalAgit entity.
     *
     * @param EcoCardiogramaInySolSalAgit $ecoCardiogramaInySolSalAgit The ecoCardiogramaInySolSalAgit entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(EcoCardiogramaInySolSalAgit $ecoCardiogramaInySolSalAgit)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ecocardiogramainysolsalagit_delete', array('id' => $ecoCardiogramaInySolSalAgit->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
