<?php

namespace AppBundle\Controller;

use AppBundle\Entity\EcoDopplerColorArtMiemInfIzq;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Ecodopplercolorartmieminfizq controller.
 *
 * @Route("ecodopplercolorartmieminfizq")
 */
class EcoDopplerColorArtMiemInfIzqController extends Controller
{
    /**
     * Lists all ecoDopplerColorArtMiemInfIzq entities.
     *
     * @Route("/", name="ecodopplercolorartmieminfizq_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ecoDopplerColorArtMiemInfIzqs = $em->getRepository('AppBundle:EcoDopplerColorArtMiemInfIzq')->findAll();

        return $this->render('ecodopplercolorartmieminfizq/index.html.twig', array(
            'ecoDopplerColorArtMiemInfIzqs' => $ecoDopplerColorArtMiemInfIzqs,
        ));
    }

    /**
     * Creates a new ecoDopplerColorArtMiemInfIzq entity.
     *
     * @Route("/new", name="ecodopplercolorartmieminfizq_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $ecoDopplerColorArtMiemInfIzq = new Ecodopplercolorartmieminfizq();
        $form = $this->createForm('AppBundle\Form\EcoDopplerColorArtMiemInfIzqType', $ecoDopplerColorArtMiemInfIzq);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ecoDopplerColorArtMiemInfIzq);
            $em->flush();

            return $this->redirectToRoute('ecodopplercolorartmieminfizq_show', array('id' => $ecoDopplerColorArtMiemInfIzq->getId()));
        }

        return $this->render('ecodopplercolorartmieminfizq/new.html.twig', array(
            'ecoDopplerColorArtMiemInfIzq' => $ecoDopplerColorArtMiemInfIzq,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ecoDopplerColorArtMiemInfIzq entity.
     *
     * @Route("/{id}", name="ecodopplercolorartmieminfizq_show")
     * @Method("GET")
     */
    public function showAction(EcoDopplerColorArtMiemInfIzq $ecoDopplerColorArtMiemInfIzq)
    {
        $deleteForm = $this->createDeleteForm($ecoDopplerColorArtMiemInfIzq);

        return $this->render('ecodopplercolorartmieminfizq/show.html.twig', array(
            'ecoDopplerColorArtMiemInfIzq' => $ecoDopplerColorArtMiemInfIzq,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ecoDopplerColorArtMiemInfIzq entity.
     *
     * @Route("/{id}/edit", name="ecodopplercolorartmieminfizq_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, EcoDopplerColorArtMiemInfIzq $ecoDopplerColorArtMiemInfIzq)
    {
        $deleteForm = $this->createDeleteForm($ecoDopplerColorArtMiemInfIzq);
        $editForm = $this->createForm('AppBundle\Form\EcoDopplerColorArtMiemInfIzqType', $ecoDopplerColorArtMiemInfIzq);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ecodopplercolorartmieminfizq_edit', array('id' => $ecoDopplerColorArtMiemInfIzq->getId()));
        }

        return $this->render('ecodopplercolorartmieminfizq/edit.html.twig', array(
            'ecoDopplerColorArtMiemInfIzq' => $ecoDopplerColorArtMiemInfIzq,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ecoDopplerColorArtMiemInfIzq entity.
     *
     * @Route("/{id}", name="ecodopplercolorartmieminfizq_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, EcoDopplerColorArtMiemInfIzq $ecoDopplerColorArtMiemInfIzq)
    {
        $form = $this->createDeleteForm($ecoDopplerColorArtMiemInfIzq);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ecoDopplerColorArtMiemInfIzq);
            $em->flush();
        }

        return $this->redirectToRoute('ecodopplercolorartmieminfizq_index');
    }

    /**
     * Creates a form to delete a ecoDopplerColorArtMiemInfIzq entity.
     *
     * @param EcoDopplerColorArtMiemInfIzq $ecoDopplerColorArtMiemInfIzq The ecoDopplerColorArtMiemInfIzq entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(EcoDopplerColorArtMiemInfIzq $ecoDopplerColorArtMiemInfIzq)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ecodopplercolorartmieminfizq_delete', array('id' => $ecoDopplerColorArtMiemInfIzq->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
