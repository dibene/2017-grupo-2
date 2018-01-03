<?php

namespace AppBundle\Controller;

use AppBundle\Entity\EcoDopplerColorArterialDeMiembros;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

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
     * @Route("/new", name="ecodopplercolorarterialdemiembros_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $ecoDopplerColorArterialDeMiembro = new EcoDopplerColorArterialDeMiembros();
        $form = $this->createForm('AppBundle\Form\EcoDopplerColorArterialDeMiembrosType', $ecoDopplerColorArterialDeMiembro);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ecoDopplerColorArterialDeMiembro);
            $em->flush();

            return $this->redirectToRoute('ecodopplercolorarterialdemiembros_show', array('id' => $ecoDopplerColorArterialDeMiembro->getId()));
        }

        return $this->render('ecodopplercolorarterialdemiembros/new.html.twig', array(
            'ecoDopplerColorArterialDeMiembro' => $ecoDopplerColorArterialDeMiembro,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ecoDopplerColorArterialDeMiembro entity.
     *
     * @Route("/{id}", name="ecodopplercolorarterialdemiembros_show")
     * @Method("GET")
     */
    public function showAction(EcoDopplerColorArterialDeMiembros $ecoDopplerColorArterialDeMiembro)
    {
        $deleteForm = $this->createDeleteForm($ecoDopplerColorArterialDeMiembro);

        return $this->render('ecodopplercolorarterialdemiembros/show.html.twig', array(
            'ecoDopplerColorArterialDeMiembro' => $ecoDopplerColorArterialDeMiembro,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ecoDopplerColorArterialDeMiembro entity.
     *
     * @Route("/{id}/edit", name="ecodopplercolorarterialdemiembros_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, EcoDopplerColorArterialDeMiembros $ecoDopplerColorArterialDeMiembro)
    {
        $deleteForm = $this->createDeleteForm($ecoDopplerColorArterialDeMiembro);
        $editForm = $this->createForm('AppBundle\Form\EcoDopplerColorArterialDeMiembrosType', $ecoDopplerColorArterialDeMiembro);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ecodopplercolorarterialdemiembros_edit', array('id' => $ecoDopplerColorArterialDeMiembro->getId()));
        }

        return $this->render('ecodopplercolorarterialdemiembros/edit.html.twig', array(
            'ecoDopplerColorArterialDeMiembro' => $ecoDopplerColorArterialDeMiembro,
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
