<?php

namespace AppBundle\Controller;

use AppBundle\Entity\MiembrosSuperioresArterialNormal;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

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
     * @Route("/new", name="miembrossuperioresarterialnormal_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $miembrosSuperioresArterialNormal = new Miembrossuperioresarterialnormal();
        $form = $this->createForm('AppBundle\Form\MiembrosSuperioresArterialNormalType', $miembrosSuperioresArterialNormal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($miembrosSuperioresArterialNormal);
            $em->flush();

            return $this->redirectToRoute('miembrossuperioresarterialnormal_show', array('id' => $miembrosSuperioresArterialNormal->getId()));
        }

        return $this->render('miembrossuperioresarterialnormal/new.html.twig', array(
            'miembrosSuperioresArterialNormal' => $miembrosSuperioresArterialNormal,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a miembrosSuperioresArterialNormal entity.
     *
     * @Route("/{id}", name="miembrossuperioresarterialnormal_show")
     * @Method("GET")
     */
    public function showAction(MiembrosSuperioresArterialNormal $miembrosSuperioresArterialNormal)
    {
        $deleteForm = $this->createDeleteForm($miembrosSuperioresArterialNormal);

        return $this->render('miembrossuperioresarterialnormal/show.html.twig', array(
            'miembrosSuperioresArterialNormal' => $miembrosSuperioresArterialNormal,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing miembrosSuperioresArterialNormal entity.
     *
     * @Route("/{id}/edit", name="miembrossuperioresarterialnormal_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, MiembrosSuperioresArterialNormal $miembrosSuperioresArterialNormal)
    {
        $deleteForm = $this->createDeleteForm($miembrosSuperioresArterialNormal);
        $editForm = $this->createForm('AppBundle\Form\MiembrosSuperioresArterialNormalType', $miembrosSuperioresArterialNormal);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('miembrossuperioresarterialnormal_edit', array('id' => $miembrosSuperioresArterialNormal->getId()));
        }

        return $this->render('miembrossuperioresarterialnormal/edit.html.twig', array(
            'miembrosSuperioresArterialNormal' => $miembrosSuperioresArterialNormal,
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
