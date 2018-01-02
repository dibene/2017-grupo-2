<?php

namespace AppBundle\Controller;

use AppBundle\Entity\EcoDopplerVasosDeCuello;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Ecodopplervasosdecuello controller.
 *
 * @Route("estudio/ecodopplervasosdecuello")
 */
class EcoDopplerVasosDeCuelloController extends Controller
{
    /**
     * Lists all ecoDopplerVasosDeCuello entities.
     *
     * @Route("/", name="ecodopplervasosdecuello_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ecoDopplerVasosDeCuellos = $em->getRepository('AppBundle:EcoDopplerVasosDeCuello')->findAll();

        return $this->render('ecodopplervasosdecuello/index.html.twig', array(
            'ecoDopplerVasosDeCuellos' => $ecoDopplerVasosDeCuellos,
        ));
    }

    /**
     * Creates a new ecoDopplerVasosDeCuello entity.
     *
     * @Route("/new", name="ecodopplervasosdecuello_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $ecoDopplerVasosDeCuello = new Ecodopplervasosdecuello();
        $form = $this->createForm('AppBundle\Form\EcoDopplerVasosDeCuelloType', $ecoDopplerVasosDeCuello);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ecoDopplerVasosDeCuello);
            $em->flush();

            return $this->redirectToRoute('ecodopplervasosdecuello_show', array('id' => $ecoDopplerVasosDeCuello->getId()));
        }

        return $this->render('ecodopplervasosdecuello/new.html.twig', array(
            'ecoDopplerVasosDeCuello' => $ecoDopplerVasosDeCuello,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ecoDopplerVasosDeCuello entity.
     *
     * @Route("/{id}", name="ecodopplervasosdecuello_show")
     * @Method("GET")
     */
    public function showAction(EcoDopplerVasosDeCuello $ecoDopplerVasosDeCuello)
    {
        $deleteForm = $this->createDeleteForm($ecoDopplerVasosDeCuello);

        return $this->render('ecodopplervasosdecuello/show.html.twig', array(
            'ecoDopplerVasosDeCuello' => $ecoDopplerVasosDeCuello,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ecoDopplerVasosDeCuello entity.
     *
     * @Route("/{id}/edit", name="ecodopplervasosdecuello_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, EcoDopplerVasosDeCuello $ecoDopplerVasosDeCuello)
    {
        $deleteForm = $this->createDeleteForm($ecoDopplerVasosDeCuello);
        $editForm = $this->createForm('AppBundle\Form\EcoDopplerVasosDeCuelloType', $ecoDopplerVasosDeCuello);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ecodopplervasosdecuello_edit', array('id' => $ecoDopplerVasosDeCuello->getId()));
        }

        return $this->render('ecodopplervasosdecuello/edit.html.twig', array(
            'ecoDopplerVasosDeCuello' => $ecoDopplerVasosDeCuello,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ecoDopplerVasosDeCuello entity.
     *
     * @Route("/{id}", name="ecodopplervasosdecuello_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, EcoDopplerVasosDeCuello $ecoDopplerVasosDeCuello)
    {
        $form = $this->createDeleteForm($ecoDopplerVasosDeCuello);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ecoDopplerVasosDeCuello);
            $em->flush();
        }

        return $this->redirectToRoute('ecodopplervasosdecuello_index');
    }

    /**
     * Creates a form to delete a ecoDopplerVasosDeCuello entity.
     *
     * @param EcoDopplerVasosDeCuello $ecoDopplerVasosDeCuello The ecoDopplerVasosDeCuello entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(EcoDopplerVasosDeCuello $ecoDopplerVasosDeCuello)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ecodopplervasosdecuello_delete', array('id' => $ecoDopplerVasosDeCuello->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
