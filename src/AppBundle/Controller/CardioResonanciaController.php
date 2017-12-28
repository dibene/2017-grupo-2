<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CardioResonancia;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;
use \Datetime;
/**
 * Cardioresonancium controller.
 *
 * @Route("cardioresonancia")
 */
class CardioResonanciaController extends Controller
{
    /**
     * Lists all cardioResonancium entities.
     *
     * @Route("/", name="cardioresonancia_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cardioResonancias = $em->getRepository('AppBundle:CardioResonancia')->findAll();

        return $this->render('cardioresonancia/index.html.twig', array(
            'cardioResonancias' => $cardioResonancias,
        ));
    }

    /**
     * Creates a new cardioResonancium entity.
     *
     * @Route("/new/{id}", name="cardioresonancia_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, $id)
    {
        $cardioResonancia = new CardioResonancia();
        $form = $this->createForm('AppBundle\Form\CardioResonanciaType', $cardioResonancia);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cardioResonancia);
            $em->flush();

            return $this->redirectToRoute('cardioresonancia_show', array('id' => $cardioResonancia->getId()));
        }

        return $this->render('cardioresonancia/new.html.twig', array(
            'cardioResonancium' => $cardioResonancia,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a cardioResonancium entity.
     *
     * @Route("/{id}", name="cardioresonancia_show")
     * @Method("GET")
     */
    public function showAction(CardioResonancia $cardioResonancium)
    {
        $deleteForm = $this->createDeleteForm($cardioResonancium);

        return $this->render('cardioresonancia/show.html.twig', array(
            'cardioResonancium' => $cardioResonancium,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing cardioResonancium entity.
     *
     * @Route("/{id}/edit", name="cardioresonancia_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CardioResonancia $cardioResonancium)
    {
        $deleteForm = $this->createDeleteForm($cardioResonancium);
        $editForm = $this->createForm('AppBundle\Form\CardioResonanciaType', $cardioResonancium);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cardioresonancia_edit', array('id' => $cardioResonancium->getId()));
        }

        return $this->render('cardioresonancia/edit.html.twig', array(
            'cardioResonancium' => $cardioResonancium,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a cardioResonancium entity.
     *
     * @Route("/{id}", name="cardioresonancia_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, CardioResonancia $cardioResonancium)
    {
        $form = $this->createDeleteForm($cardioResonancium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cardioResonancium);
            $em->flush();
        }

        return $this->redirectToRoute('cardioresonancia_index');
    }

    /**
     * Creates a form to delete a cardioResonancium entity.
     *
     * @param CardioResonancia $cardioResonancium The cardioResonancium entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CardioResonancia $cardioResonancium)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cardioresonancia_delete', array('id' => $cardioResonancium->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
