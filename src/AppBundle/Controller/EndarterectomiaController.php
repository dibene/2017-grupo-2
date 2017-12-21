<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Endarterectomia;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Endarterectomium controller.
 *
 * @Route("endarterectomia")
 */
class EndarterectomiaController extends Controller
{
    /**
     * Lists all endarterectomium entities.
     *
     * @Route("/", name="endarterectomia_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $endarterectomias = $em->getRepository('AppBundle:Endarterectomia')->findAll();

        return $this->render('endarterectomia/index.html.twig', array(
            'endarterectomias' => $endarterectomias,
        ));
    }

    /**
     * Creates a new endarterectomium entity.
     *
     * @Route("/new", name="endarterectomia_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $endarterectomium = new Endarterectomium();
        $form = $this->createForm('AppBundle\Form\EndarterectomiaType', $endarterectomium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($endarterectomium);
            $em->flush();

            return $this->redirectToRoute('endarterectomia_show', array('id' => $endarterectomium->getId()));
        }

        return $this->render('endarterectomia/new.html.twig', array(
            'endarterectomium' => $endarterectomium,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a endarterectomium entity.
     *
     * @Route("/{id}", name="endarterectomia_show")
     * @Method("GET")
     */
    public function showAction(Endarterectomia $endarterectomium)
    {
        $deleteForm = $this->createDeleteForm($endarterectomium);

        return $this->render('endarterectomia/show.html.twig', array(
            'endarterectomium' => $endarterectomium,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing endarterectomium entity.
     *
     * @Route("/{id}/edit", name="endarterectomia_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Endarterectomia $endarterectomium)
    {
        $deleteForm = $this->createDeleteForm($endarterectomium);
        $editForm = $this->createForm('AppBundle\Form\EndarterectomiaType', $endarterectomium);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('endarterectomia_edit', array('id' => $endarterectomium->getId()));
        }

        return $this->render('endarterectomia/edit.html.twig', array(
            'endarterectomium' => $endarterectomium,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a endarterectomium entity.
     *
     * @Route("/{id}", name="endarterectomia_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Endarterectomia $endarterectomium)
    {
        $form = $this->createDeleteForm($endarterectomium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($endarterectomium);
            $em->flush();
        }

        return $this->redirectToRoute('endarterectomia_index');
    }

    /**
     * Creates a form to delete a endarterectomium entity.
     *
     * @param Endarterectomia $endarterectomium The endarterectomium entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Endarterectomia $endarterectomium)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('endarterectomia_delete', array('id' => $endarterectomium->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
