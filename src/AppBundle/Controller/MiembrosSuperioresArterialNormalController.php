<?php

namespace AppBundle\Controller;

use AppBundle\Entity\MiembrosSuperioresArterialNormal;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use \Datetime;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\Response;
/**
 * Miembrossuperioresarterialnormal controller.
 *
 * @Route("estudio/miembrossuperioresarterialnormal")
 */
class MiembrosSuperioresArterialNormalController extends Controller
{
    /**
     * Lists all miembrosSuperioresArterialNormal entities.
     *
     * @Route("/", name="miembrossuperioresarterialnormal_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $miembrosSuperioresArterialNormals = $em->getRepository('AppBundle:MiembrosSuperioresArterialNormal')->findAll();

        return $this->render('miembrossuperioresarterialnormal/index.html.twig', array(
            'miembrosSuperioresArterialNormals' => $miembrosSuperioresArterialNormals,
        ));
    }

    /**
     * Creates a new miembrosSuperioresArterialNormal entity.
     *
     * @Route("/new/paciente/{id}", name="miembrossuperioresarterialnormal_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, $id)
    {
            $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($id);
            $user = $this->container->get('security.context')->getToken()->getUser();
            $medico = $this->getDoctrine()->getManager()->getRepository('AppBundle:Medico')->findOneByUsuario($user->getId());

        $miembrosSuperioresArterialNormal = new Miembrossuperioresarterialnormal($medico, $paciente,$this->getDoctrine()->getManager());
        $form = $this->createForm('AppBundle\Form\MiembrosSuperioresArterialNormalType', $miembrosSuperioresArterialNormal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($miembrosSuperioresArterialNormal);
            $em->flush();
            $this->addFlash('mensaje', 'Estudio creado correctamente');

            return $this->redirectToRoute('miembrossuperioresarterialnormal_show', array('id' => $miembrosSuperioresArterialNormal->getId(),
          'idPaciente' => $paciente->getId(),
          'medico' => $medico,
          'paciente' => $paciente,
          'estudio' => $miembrosSuperioresArterialNormal));
        }

        return $this->render('miembrossuperioresarterialnormal/new.html.twig', array(
            'estudio' => $miembrosSuperioresArterialNormal,
            'paciente' => $paciente,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a miembrosSuperioresArterialNormal entity.
     *
     * @Route("/{id}/paciente/{idPaciente}",  name="miembrossuperioresarterialnormal_show")
     * @Method("GET")
     */
    public function showAction(MiembrosSuperioresArterialNormal $miembrosSuperioresArterialNormal, $idPaciente)
    {
        $deleteForm = $this->createDeleteForm($miembrosSuperioresArterialNormal);
        $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($idPaciente);
        $user = $this->container->get('security.context')->getToken()->getUser();
        $medico = $this->getDoctrine()->getManager()->getRepository('AppBundle:Medico')->findOneByUsuario($user->getId());

        return $this->render('miembrossuperioresarterialnormal/show.html.twig', array(
            'estudio' => $miembrosSuperioresArterialNormal,
            'paciente' => $paciente,
            'medico' => $medico,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing miembrosSuperioresArterialNormal entity.
     *
     * @Route("/{id}/edit/paciente/{idPaciente}", name="miembrossuperioresarterialnormal_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, MiembrosSuperioresArterialNormal $miembrosSuperioresArterialNormal,  $idPaciente)
    {
        $deleteForm = $this->createDeleteForm($miembrosSuperioresArterialNormal);
        $editForm = $this->createForm('AppBundle\Form\MiembrosSuperioresArterialNormalType', $miembrosSuperioresArterialNormal);
        $editForm->handleRequest($request);
        $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($idPaciente);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('mensaje', 'Estudio editado correctamente');

            return $this->redirectToRoute('miembrossuperioresarterialnormal_edit', array('id' => $miembrosSuperioresArterialNormal->getId(),
            'estudio' => $miembrosSuperioresArterialNormal,
            'paciente' => $paciente,
            'idPaciente' => $paciente->getId()
          ));
        }

        return $this->render('miembrossuperioresarterialnormal/edit.html.twig', array(
        'paciente' => $paciente,
        'idPaciente' => $paciente->getId(),
            'estudio' => $miembrosSuperioresArterialNormal,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a miembrosSuperioresArterialNormal entity.
     *
     * @Route("/{id}", name="miembrossuperioresarterialnormal_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, MiembrosSuperioresArterialNormal $miembrosSuperioresArterialNormal)
    {
        $form = $this->createDeleteForm($miembrosSuperioresArterialNormal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($miembrosSuperioresArterialNormal);
            $em->flush();
        }

        return $this->redirectToRoute('miembrossuperioresarterialnormal_index');
    }

    /**
     * Creates a form to delete a miembrosSuperioresArterialNormal entity.
     *
     * @param MiembrosSuperioresArterialNormal $miembrosSuperioresArterialNormal The miembrosSuperioresArterialNormal entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(MiembrosSuperioresArterialNormal $miembrosSuperioresArterialNormal)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('miembrossuperioresarterialnormal_delete', array('id' => $miembrosSuperioresArterialNormal->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
