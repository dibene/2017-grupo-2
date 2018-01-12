<?php

namespace AppBundle\Controller;

use AppBundle\Entity\EcoDoppColorMiemInfDer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;
use \Datetime;
/**
 * Ecodoppcolormieminfder controller.
 *
 * @Route("estudio/ecodoppcolormieminfder")
 */
class EcoDoppColorMiemInfDerController extends Controller
{
    /**
     * Lists all ecoDoppColorMiemInfDer entities.
     *
     * @Route("/", name="ecodoppcolormieminfder_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ecoDoppColorMiemInfDers = $em->getRepository('AppBundle:EcoDoppColorMiemInfDer')->findAll();

        return $this->render('ecodoppcolormieminfder/index.html.twig', array(
            'ecoDoppColorMiemInfDers' => $ecoDoppColorMiemInfDers,
        ));
    }

    /**
     * Creates a new ecoDoppColorMiemInfDer entity.
     *
     * @Route("/new/paciente/{id}", name="ecodoppcolormieminfder_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, $id)
    {
      $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($id);
      $user = $this->container->get('security.context')->getToken()->getUser();
      $medico = $this->getDoctrine()->getManager()->getRepository('AppBundle:Medico')->findOneByUsuario($user->getId());

        $ecoDoppColorMiemInfDer = new Ecodoppcolormieminfder($medico, $paciente,$this->getDoctrine()->getManager());
        $form = $this->createForm('AppBundle\Form\EcoDoppColorMiemInfDerType', $ecoDoppColorMiemInfDer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ecoDoppColorMiemInfDer);
            $em->flush();
            $this->addFlash('mensaje', 'Estudio creado correctamente');

            return $this->redirectToRoute('ecodoppcolormieminfder_show', array('id' => $ecoDoppColorMiemInfDer->getId(),
          'idPaciente' => $paciente->getId(),
          'medico' => $medico,
          'paciente' => $paciente,
          'estudio' => $ecoDoppColorMiemInfDer));
        }

        return $this->render('ecodoppcolormieminfder/new.html.twig', array(
            'estudio' => $ecoDoppColorMiemInfDer,
            'paciente' => $paciente,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ecoDoppColorMiemInfDer entity.
     *
     * @Route("/{id}/paciente/{idPaciente}", name="ecodoppcolormieminfder_show")
     * @Method("GET")
     */
    public function showAction(EcoDoppColorMiemInfDer $ecoDoppColorMiemInfDer, $idPaciente)
    {
        $deleteForm = $this->createDeleteForm($ecoDoppColorMiemInfDer);
        $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($idPaciente);
        $user = $this->container->get('security.context')->getToken()->getUser();
        $medico = $this->getDoctrine()->getManager()->getRepository('AppBundle:Medico')->findOneByUsuario($user->getId());

        return $this->render('ecodoppcolormieminfder/show.html.twig', array(
            'estudio' => $ecoDoppColorMiemInfDer,
            'paciente' => $paciente,
            'medico' => $medico,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ecoDoppColorMiemInfDer entity.
     *
     * @Route("/{id}/edit/paciente/{idPaciente}", name="ecodoppcolormieminfder_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, EcoDoppColorMiemInfDer $ecoDoppColorMiemInfDer ,  $idPaciente)
    {
        $deleteForm = $this->createDeleteForm($ecoDoppColorMiemInfDer);
        $editForm = $this->createForm('AppBundle\Form\EcoDoppColorMiemInfDerType', $ecoDoppColorMiemInfDer);
        $editForm->handleRequest($request);
        $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($idPaciente);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('mensaje', 'Estudio editado correctamente');

            return $this->redirectToRoute('ecodoppcolormieminfder_edit', array('id' => $ecoDoppColorMiemInfDer->getId(),
            'estudio' => $ecoDoppColorMiemInfDer,
            'paciente' => $paciente,
            'idPaciente' => $paciente->getId()
          ));
        }

        return $this->render('ecodoppcolormieminfder/edit.html.twig', array(
          'estudio' => $ecoDoppColorMiemInfDer,
          'paciente' => $paciente,
          'idPaciente' => $paciente->getId(),
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ecoDoppColorMiemInfDer entity.
     *
     * @Route("/{id}", name="ecodoppcolormieminfder_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, EcoDoppColorMiemInfDer $ecoDoppColorMiemInfDer)
    {
        $form = $this->createDeleteForm($ecoDoppColorMiemInfDer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ecoDoppColorMiemInfDer);
            $em->flush();
        }

        return $this->redirectToRoute('ecodoppcolormieminfder_index');
    }

    /**
     * Creates a form to delete a ecoDoppColorMiemInfDer entity.
     *
     * @param EcoDoppColorMiemInfDer $ecoDoppColorMiemInfDer The ecoDoppColorMiemInfDer entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(EcoDoppColorMiemInfDer $ecoDoppColorMiemInfDer)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ecodoppcolormieminfder_delete', array('id' => $ecoDoppColorMiemInfDer->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
