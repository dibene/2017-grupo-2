<?php

namespace AppBundle\Controller;

use AppBundle\Entity\EcoDopplerColorVenMiemSup;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;
use \Datetime;
/**
 * Ecodopplercolorvenmiemsup controller.
 *
 * @Route("estudio/ecodopplercolorvenmiemsup")
 */
class EcoDopplerColorVenMiemSupController extends Controller
{
    /**
     * Lists all ecoDopplerColorVenMiemSup entities.
     *
     * @Route("/", name="ecodopplercolorvenmiemsup_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ecoDopplerColorVenMiemSups = $em->getRepository('AppBundle:EcoDopplerColorVenMiemSup')->findAll();

        return $this->render('ecodopplercolorvenmiemsup/index.html.twig', array(
            'ecoDopplerColorVenMiemSups' => $ecoDopplerColorVenMiemSups,
        ));
    }

    /**
     * Creates a new ecoDopplerColorVenMiemSup entity.
     *
     * @Route("/new/paciente/{id}", name="ecodopplercolorvenmiemsup_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, $id)
    {
      $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($id);
      $user = $this->container->get('security.context')->getToken()->getUser();
      $medico = $this->getDoctrine()->getManager()->getRepository('AppBundle:Medico')->findOneByUsuario($user->getId());

        $ecoDopplerColorVenMiemSup = new Ecodopplercolorvenmiemsup($medico, $paciente,$this->getDoctrine()->getManager());
        $form = $this->createForm('AppBundle\Form\EcoDopplerColorVenMiemSupType', $ecoDopplerColorVenMiemSup);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ecoDopplerColorVenMiemSup);
            $em->flush();
            $this->addFlash('mensaje', 'Estudio creado correctamente');

            return $this->redirectToRoute('ecodopplercolorvenmiemsup_show', array('id' => $ecoDopplerColorVenMiemSup->getId(),
          'idPaciente' => $paciente->getId(),
          'medico' => $medico,
          'paciente' => $paciente,
          'estudio' => $ecoDopplerColorVenMiemSup));
        }

        return $this->render('ecodopplercolorvenmiemsup/new.html.twig', array(
            'estudio' => $ecoDopplerColorVenMiemSup,
            'paciente' => $paciente,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ecoDopplerColorVenMiemSup entity.
     *
     * @Route("/{id}/paciente/{idPaciente}", name="ecodopplercolorvenmiemsup_show")
     * @Method("GET")
     */
    public function showAction(EcoDopplerColorVenMiemSup $ecoDopplerColorVenMiemSup, $idPaciente)
    {
        $deleteForm = $this->createDeleteForm($ecoDopplerColorVenMiemSup);
        $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($idPaciente);
        $user = $this->container->get('security.context')->getToken()->getUser();
        $medico = $this->getDoctrine()->getManager()->getRepository('AppBundle:Medico')->findOneByUsuario($user->getId());

        return $this->render('ecodopplercolorvenmiemsup/show.html.twig', array(
            'estudio' => $ecoDopplerColorVenMiemSup,
            'paciente' => $paciente,
            'medico' => $medico,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ecoDopplerColorVenMiemSup entity.
     *
     * @Route("/{id}/edit/paciente/{idPaciente}", name="ecodopplercolorvenmiemsup_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, EcoDopplerColorVenMiemSup $ecoDopplerColorVenMiemSup ,  $idPaciente)
    {
        $deleteForm = $this->createDeleteForm($ecoDopplerColorVenMiemSup);
        $editForm = $this->createForm('AppBundle\Form\EcoDopplerColorVenMiemSupType', $ecoDopplerColorVenMiemSup);
        $editForm->handleRequest($request);
        $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($idPaciente);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('mensaje', 'Estudio editado correctamente');

            return $this->redirectToRoute('ecodopplercolorvenmiemsup_edit', array('id' => $ecoDopplerColorVenMiemSup->getId(),
            'estudio' => $ecoDopplerColorVenMiemSup,
            'paciente' => $paciente,
            'idPaciente' => $paciente->getId()
          ));
        }

        return $this->render('ecodopplercolorvenmiemsup/edit.html.twig', array(
          'estudio' => $ecoDopplerColorVenMiemSup,
          'paciente' => $paciente,
          'idPaciente' => $paciente->getId(),
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ecoDopplerColorVenMiemSup entity.
     *
     * @Route("/{id}", name="ecodopplercolorvenmiemsup_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, EcoDopplerColorVenMiemSup $ecoDopplerColorVenMiemSup)
    {
        $form = $this->createDeleteForm($ecoDopplerColorVenMiemSup);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ecoDopplerColorVenMiemSup);
            $em->flush();
        }

        return $this->redirectToRoute('ecodopplercolorvenmiemsup_index');
    }

    /**
     * Creates a form to delete a ecoDopplerColorVenMiemSup entity.
     *
     * @param EcoDopplerColorVenMiemSup $ecoDopplerColorVenMiemSup The ecoDopplerColorVenMiemSup entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(EcoDopplerColorVenMiemSup $ecoDopplerColorVenMiemSup)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ecodopplercolorvenmiemsup_delete', array('id' => $ecoDopplerColorVenMiemSup->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
