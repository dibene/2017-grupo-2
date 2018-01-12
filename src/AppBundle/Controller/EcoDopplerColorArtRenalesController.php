<?php

namespace AppBundle\Controller;

use AppBundle\Entity\EcoDopplerColorArtRenales;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;
use \Datetime;
/**
 * Ecodopplercolorartrenale controller.
 *
 * @Route("estudio/ecodopplercolorartrenales")
 */
class EcoDopplerColorArtRenalesController extends Controller
{
    /**
     * Lists all ecoDopplerColorArtRenale entities.
     *
     * @Route("/", name="ecodopplercolorartrenales_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ecoDopplerColorArtRenales = $em->getRepository('AppBundle:EcoDopplerColorArtRenales')->findAll();

        return $this->render('ecodopplercolorartrenales/index.html.twig', array(
            'ecoDopplerColorArtRenales' => $ecoDopplerColorArtRenales,
        ));
    }

    /**
     * Creates a new ecoDopplerColorArtRenale entity.
     *
     * @Route("/new/paciente/{id}", name="ecodopplercolorartrenales_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, $id)
    {
      $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($id);
      $user = $this->container->get('security.context')->getToken()->getUser();
      $medico = $this->getDoctrine()->getManager()->getRepository('AppBundle:Medico')->findOneByUsuario($user->getId());

        $ecoDopplerColorArtRenale = new Ecodopplercolorartrenales($medico, $paciente,$this->getDoctrine()->getManager());
        $form = $this->createForm('AppBundle\Form\EcoDopplerColorArtRenalesType', $ecoDopplerColorArtRenale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ecoDopplerColorArtRenale);
            $em->flush();
            $this->addFlash('mensaje', 'Estudio creado correctamente');

            return $this->redirectToRoute('ecodopplercolorartrenales_show', array('id' => $ecoDopplerColorArtRenale->getId(),
          'idPaciente' => $paciente->getId(),
          'medico' => $medico,
          'paciente' => $paciente,
          'estudio' => $ecoDopplerColorArtRenale));
        }

        return $this->render('ecodopplercolorartrenales/new.html.twig', array(
            'estudio' => $ecoDopplerColorArtRenale,
            'paciente' => $paciente,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ecoDopplerColorArtRenale entity.
     *
     * @Route("/{id}/paciente/{idPaciente}", name="ecodopplercolorartrenales_show")
     * @Method("GET")
     */
    public function showAction(EcoDopplerColorArtRenales $ecoDopplerColorArtRenale, $idPaciente)
    {
        $deleteForm = $this->createDeleteForm($ecoDopplerColorArtRenale);
        $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($idPaciente);
        $user = $this->container->get('security.context')->getToken()->getUser();
        $medico = $this->getDoctrine()->getManager()->getRepository('AppBundle:Medico')->findOneByUsuario($user->getId());

        return $this->render('ecodopplercolorartrenales/show.html.twig', array(
            'estudio' => $ecoDopplerColorArtRenale,
            'paciente' => $paciente,
            'medico' => $medico,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ecoDopplerColorArtRenale entity.
     *
     * @Route("/{id}/edit/paciente/{idPaciente}", name="ecodopplercolorartrenales_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, EcoDopplerColorArtRenales $ecoDopplerColorArtRenale ,  $idPaciente)
    {
        $deleteForm = $this->createDeleteForm($ecoDopplerColorArtRenale);
        $editForm = $this->createForm('AppBundle\Form\EcoDopplerColorArtRenalesType', $ecoDopplerColorArtRenale);
        $editForm->handleRequest($request);
        $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($idPaciente);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('mensaje', 'Estudio editado correctamente');

            return $this->redirectToRoute('ecodopplercolorartrenales_edit', array('id' => $ecoDopplerColorArtRenale->getId(),
            'estudio' => $ecoDopplerColorArtRenale,
            'paciente' => $paciente,
            'idPaciente' => $paciente->getId()
          ));
        }

        return $this->render('ecodopplercolorartrenales/edit.html.twig', array(
          'estudio' => $ecoDopplerColorArtRenale,
          'paciente' => $paciente,
          'idPaciente' => $paciente->getId(),
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ecoDopplerColorArtRenale entity.
     *
     * @Route("/{id}", name="ecodopplercolorartrenales_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, EcoDopplerColorArtRenales $ecoDopplerColorArtRenale)
    {
        $form = $this->createDeleteForm($ecoDopplerColorArtRenale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ecoDopplerColorArtRenale);
            $em->flush();
        }

        return $this->redirectToRoute('ecodopplercolorartrenales_index');
    }

    /**
     * Creates a form to delete a ecoDopplerColorArtRenale entity.
     *
     * @param EcoDopplerColorArtRenales $ecoDopplerColorArtRenale The ecoDopplerColorArtRenale entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(EcoDopplerColorArtRenales $ecoDopplerColorArtRenale)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ecodopplercolorartrenales_delete', array('id' => $ecoDopplerColorArtRenale->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
