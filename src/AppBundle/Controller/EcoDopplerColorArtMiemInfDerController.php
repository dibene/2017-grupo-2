<?php

namespace AppBundle\Controller;

use AppBundle\Entity\EcoDopplerColorArtMiemInfDer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use \Datetime;
/**
 * Ecodopplercolorartmieminfder controller.
 *
 * @Route("estudio/ecodopplercolorartmieminfder")
 */
class EcoDopplerColorArtMiemInfDerController extends Controller
{
    /**
     * Lists all ecoDopplerColorArtMiemInfDer entities.
     *
     * @Route("/", name="ecodopplercolorartmieminfder_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ecoDopplerColorArtMiemInfDers = $em->getRepository('AppBundle:EcoDopplerColorArtMiemInfDer')->findAll();

        return $this->render('ecodopplercolorartmieminfder/index.html.twig', array(
            'ecoDopplerColorArtMiemInfDers' => $ecoDopplerColorArtMiemInfDers,
        ));
    }

    /**
     * Creates a new ecoDopplerColorArtMiemInfDer entity.
     *
     * @Route("/new/paciente/{id}", name="ecodopplercolorartmieminfder_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, $id)
    {
      $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($id);
      $user = $this->container->get('security.context')->getToken()->getUser();
      $medico = $this->getDoctrine()->getManager()->getRepository('AppBundle:Medico')->findOneByUsuario($user->getId());

        $ecoDopplerColorArtMiemInfDer = new Ecodopplercolorartmieminfder($medico, $paciente,$this->getDoctrine()->getManager());
        $form = $this->createForm('AppBundle\Form\EcoDopplerColorArtMiemInfDerType', $ecoDopplerColorArtMiemInfDer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ecoDopplerColorArtMiemInfDer);
            $em->flush();

            return $this->redirectToRoute('ecodopplercolorartmieminfder_show', array('id' => $ecoDopplerColorArtMiemInfDer->getId(),
          'idPaciente' => $paciente->getId(),
          'medico' => $medico,
          'paciente' => $paciente,
          'estudio' => $ecoDopplerColorArtMiemInfDer));
        }

        return $this->render('ecodopplercolorartmieminfder/new.html.twig', array(
            'estudio' => $ecoDopplerColorArtMiemInfDer,
            'paciente' => $paciente,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ecoDopplerColorArtMiemInfDer entity.
     *
     * @Route("/{id}/paciente/{idPaciente}", name="ecodopplercolorartmieminfder_show")
     * @Method("GET")
     */
    public function showAction(EcoDopplerColorArtMiemInfDer $ecoDopplerColorArtMiemInfDer, $idPaciente)
    {
        $deleteForm = $this->createDeleteForm($ecoDopplerColorArtMiemInfDer);
        $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($idPaciente);
        $user = $this->container->get('security.context')->getToken()->getUser();
        $medico = $this->getDoctrine()->getManager()->getRepository('AppBundle:Medico')->findOneByUsuario($user->getId());

        return $this->render('ecodopplercolorartmieminfder/show.html.twig', array(
            'estudio' => $ecoDopplerColorArtMiemInfDer,
            'paciente' => $paciente,
            'medico' => $medico,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ecoDopplerColorArtMiemInfDer entity.
     *
     * @Route("/{id}/edit/paciente/{idPaciente}", name="ecodopplercolorartmieminfder_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, EcoDopplerColorArtMiemInfDer $ecoDopplerColorArtMiemInfDer ,  $idPaciente)
    {
        $deleteForm = $this->createDeleteForm($ecoDopplerColorArtMiemInfDer);
        $editForm = $this->createForm('AppBundle\Form\EcoDopplerColorArtMiemInfDerType', $ecoDopplerColorArtMiemInfDer);
        $editForm->handleRequest($request);
        $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($idPaciente);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ecodopplercolorartmieminfder_edit', array('id' => $ecoDopplerColorArtMiemInfDer->getId(),
            'estudio' => $ecoDopplerColorArtMiemInfDer,
            'paciente' => $paciente,
            'idPaciente' => $paciente->getId()
          ));
        }

        return $this->render('ecodopplercolorartmieminfder/edit.html.twig', array(
          'estudio' => $ecoDopplerColorArtMiemInfDer,
          'paciente' => $paciente,
          'idPaciente' => $paciente->getId(),
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ecoDopplerColorArtMiemInfDer entity.
     *
     * @Route("/{id}", name="ecodopplercolorartmieminfder_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, EcoDopplerColorArtMiemInfDer $ecoDopplerColorArtMiemInfDer)
    {
        $form = $this->createDeleteForm($ecoDopplerColorArtMiemInfDer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ecoDopplerColorArtMiemInfDer);
            $em->flush();
        }

        return $this->redirectToRoute('ecodopplercolorartmieminfder_index');
    }

    /**
     * Creates a form to delete a ecoDopplerColorArtMiemInfDer entity.
     *
     * @param EcoDopplerColorArtMiemInfDer $ecoDopplerColorArtMiemInfDer The ecoDopplerColorArtMiemInfDer entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(EcoDopplerColorArtMiemInfDer $ecoDopplerColorArtMiemInfDer)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ecodopplercolorartmieminfder_delete', array('id' => $ecoDopplerColorArtMiemInfDer->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
