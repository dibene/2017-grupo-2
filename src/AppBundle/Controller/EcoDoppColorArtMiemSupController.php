<?php

namespace AppBundle\Controller;

use AppBundle\Entity\EcoDoppColorArtMiemSup;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Ecodoppcolorartmiemsup controller.
 *
 * @Route("ecodoppcolorartmiemsup")
 */
class EcoDoppColorArtMiemSupController extends Controller
{
    /**
     * Lists all ecoDoppColorArtMiemSup entities.
     *
     * @Route("/", name="ecodoppcolorartmiemsup_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ecoDoppColorArtMiemSups = $em->getRepository('AppBundle:EcoDoppColorArtMiemSup')->findAll();

        return $this->render('ecodoppcolorartmiemsup/index.html.twig', array(
            'ecoDoppColorArtMiemSups' => $ecoDoppColorArtMiemSups,
        ));
    }

    /**
     * Creates a new ecoDoppColorArtMiemSup entity.
     *
     * @Route("/new", name="ecodoppcolorartmiemsup_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $ecoDoppColorArtMiemSup = new Ecodoppcolorartmiemsup();
        $form = $this->createForm('AppBundle\Form\EcoDoppColorArtMiemSupType', $ecoDoppColorArtMiemSup);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ecoDoppColorArtMiemSup);
            $em->flush();

            return $this->redirectToRoute('ecodoppcolorartmiemsup_show', array('id' => $ecoDoppColorArtMiemSup->getId()));
        }

        return $this->render('ecodoppcolorartmiemsup/new.html.twig', array(
            'ecoDoppColorArtMiemSup' => $ecoDoppColorArtMiemSup,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ecoDoppColorArtMiemSup entity.
     *
     * @Route("/{id}", name="ecodoppcolorartmiemsup_show")
     * @Method("GET")
     */
    public function showAction(EcoDoppColorArtMiemSup $ecoDoppColorArtMiemSup)
    {
        $deleteForm = $this->createDeleteForm($ecoDoppColorArtMiemSup);

        return $this->render('ecodoppcolorartmiemsup/show.html.twig', array(
            'ecoDoppColorArtMiemSup' => $ecoDoppColorArtMiemSup,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ecoDoppColorArtMiemSup entity.
     *
     * @Route("/{id}/edit", name="ecodoppcolorartmiemsup_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, EcoDoppColorArtMiemSup $ecoDoppColorArtMiemSup)
    {
        $deleteForm = $this->createDeleteForm($ecoDoppColorArtMiemSup);
        $editForm = $this->createForm('AppBundle\Form\EcoDoppColorArtMiemSupType', $ecoDoppColorArtMiemSup);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ecodoppcolorartmiemsup_edit', array('id' => $ecoDoppColorArtMiemSup->getId()));
        }

        return $this->render('ecodoppcolorartmiemsup/edit.html.twig', array(
            'ecoDoppColorArtMiemSup' => $ecoDoppColorArtMiemSup,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ecoDoppColorArtMiemSup entity.
     *
     * @Route("/{id}", name="ecodoppcolorartmiemsup_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, EcoDoppColorArtMiemSup $ecoDoppColorArtMiemSup)
    {
        $form = $this->createDeleteForm($ecoDoppColorArtMiemSup);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ecoDoppColorArtMiemSup);
            $em->flush();
        }

        return $this->redirectToRoute('ecodoppcolorartmiemsup_index');
    }

    /**
     * Creates a form to delete a ecoDoppColorArtMiemSup entity.
     *
     * @param EcoDoppColorArtMiemSup $ecoDoppColorArtMiemSup The ecoDoppColorArtMiemSup entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(EcoDoppColorArtMiemSup $ecoDoppColorArtMiemSup)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ecodoppcolorartmiemsup_delete', array('id' => $ecoDoppColorArtMiemSup->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
