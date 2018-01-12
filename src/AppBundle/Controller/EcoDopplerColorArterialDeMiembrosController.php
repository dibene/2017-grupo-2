<?php

namespace AppBundle\Controller;

use AppBundle\Entity\EcoDopplerColorArterialDeMiembros;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use \Datetime;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\Response;
/**
 * Ecodopplercolorarterialdemiembro controller.
 *
 * @Route("estudio/ecodopplercolorarterialdemiembros")
 */
class EcoDopplerColorArterialDeMiembrosController extends Controller
{
    /**
     * Lists all ecoDopplerColorArterialDeMiembro entities.
     *
     * @Route("/", name="ecodopplercolorarterialdemiembros_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ecoDopplerColorArterialDeMiembros = $em->getRepository('AppBundle:EcoDopplerColorArterialDeMiembros')->findAll();

        return $this->render('ecodopplercolorarterialdemiembros/index.html.twig', array(
            'ecoDopplerColorArterialDeMiembros' => $ecoDopplerColorArterialDeMiembros,
        ));
    }

    /**
     * Creates a new ecoDopplerColorArterialDeMiembro entity.
     *
     * @Route("/new/paciente/{id}", name="ecodopplercolorarterialdemiembros_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, $id)
    {
            $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($id);
            $user = $this->container->get('security.context')->getToken()->getUser();
            $medico = $this->getDoctrine()->getManager()->getRepository('AppBundle:Medico')->findOneByUsuario($user->getId());

        $ecoDopplerColorArterialDeMiembro = new EcoDopplerColorArterialDeMiembros($medico, $paciente,$this->getDoctrine()->getManager());
        $form = $this->createForm('AppBundle\Form\EcoDopplerColorArterialDeMiembrosType', $ecoDopplerColorArterialDeMiembro);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ecoDopplerColorArterialDeMiembro);
            $em->flush();
            $this->addFlash('mensaje', 'Estudio creado correctamente');

            return $this->redirectToRoute('ecodopplercolorarterialdemiembros_show', array('id' => $ecoDopplerColorArterialDeMiembro->getId(),
          'idPaciente' => $paciente->getId(),
          'medico' => $medico,
          'paciente' => $paciente,
          'estudio' => $ecoDopplerColorArterialDeMiembro));
        }

        return $this->render('ecodopplercolorarterialdemiembros/new.html.twig', array(
            'estudio' => $ecoDopplerColorArterialDeMiembro,
                        'paciente' => $paciente,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ecoDopplerColorArterialDeMiembro entity.
     *
     * @Route("/{id}/paciente/{idPaciente}",  name="ecodopplercolorarterialdemiembros_show")
     * @Method("GET")
     */
    public function showAction(EcoDopplerColorArterialDeMiembros $ecoDopplerColorArterialDeMiembro, $idPaciente)
    {
        $deleteForm = $this->createDeleteForm($ecoDopplerColorArterialDeMiembro);
        $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($idPaciente);
        $user = $this->container->get('security.context')->getToken()->getUser();
        $medico = $this->getDoctrine()->getManager()->getRepository('AppBundle:Medico')->findOneByUsuario($user->getId());

        return $this->render('ecodopplercolorarterialdemiembros/show.html.twig', array(
            'estudio' => $ecoDopplerColorArterialDeMiembro,
            'paciente' => $paciente,
            'medico' => $medico,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ecoDopplerColorArterialDeMiembro entity.
     *
       * @Route("/{id}/edit/paciente/{idPaciente}",  name="ecodopplercolorarterialdemiembros_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, EcoDopplerColorArterialDeMiembros $ecoDopplerColorArterialDeMiembro,  $idPaciente)
    {
        $deleteForm = $this->createDeleteForm($ecoDopplerColorArterialDeMiembro);
        $editForm = $this->createForm('AppBundle\Form\EcoDopplerColorArterialDeMiembrosType', $ecoDopplerColorArterialDeMiembro);
        $editForm->handleRequest($request);
        $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($idPaciente);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('mensaje', 'Estudio editado correctamente');

            return $this->redirectToRoute('ecodopplercolorarterialdemiembros_edit', array('id' => $ecoDopplerColorArterialDeMiembro->getId(),
            'estudio' => $ecoDopplerColorArterialDeMiembro,
            'paciente' => $paciente,
            'idPaciente' => $paciente->getId()
          ));
        }

        return $this->render('ecodopplercolorarterialdemiembros/edit.html.twig', array(
        'paciente' => $paciente,
        'idPaciente' => $paciente->getId(),
            'estudio' => $ecoDopplerColorArterialDeMiembro,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ecoDopplerColorArterialDeMiembro entity.
     *
     * @Route("/{id}", name="ecodopplercolorarterialdemiembros_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, EcoDopplerColorArterialDeMiembros $ecoDopplerColorArterialDeMiembro)
    {
        $form = $this->createDeleteForm($ecoDopplerColorArterialDeMiembro);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ecoDopplerColorArterialDeMiembro);
            $em->flush();
        }

        return $this->redirectToRoute('ecodopplercolorarterialdemiembros_index');
    }

    /**
     * Creates a form to delete a ecoDopplerColorArterialDeMiembro entity.
     *
     * @param EcoDopplerColorArterialDeMiembros $ecoDopplerColorArterialDeMiembro The ecoDopplerColorArterialDeMiembro entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(EcoDopplerColorArterialDeMiembros $ecoDopplerColorArterialDeMiembro)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ecodopplercolorarterialdemiembros_delete', array('id' => $ecoDopplerColorArterialDeMiembro->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
