<?php

namespace AppBundle\Controller;

use AppBundle\Entity\EcoDopplerColorVenosoMiembrosInferiores;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Ecodopplercolorvenosomiembrosinferiore controller.
 *
 * @Route("estudio/ecodopplercolorvenosomiembrosinferiores")
 */
class EcoDopplerColorVenosoMiembrosInferioresController extends Controller
{
    /**
     * Lists all ecoDopplerColorVenosoMiembrosInferiore entities.
     *
     * @Route("/", name="ecodopplercolorvenosomiembrosinferiores_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ecoDopplerColorVenosoMiembrosInferiores = $em->getRepository('AppBundle:EcoDopplerColorVenosoMiembrosInferiores')->findAll();

        return $this->render('ecodopplercolorvenosomiembrosinferiores/index.html.twig', array(
            'ecoDopplerColorVenosoMiembrosInferiores' => $ecoDopplerColorVenosoMiembrosInferiores,
        ));
    }

    /**
     * Creates a new ecoDopplerColorVenosoMiembrosInferiore entity.
     *
     * @Route("/new", name="ecodopplercolorvenosomiembrosinferiores_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $ecoDopplerColorVenosoMiembrosInferiore = new Ecodopplercolorvenosomiembrosinferiore();
        $form = $this->createForm('AppBundle\Form\EcoDopplerColorVenosoMiembrosInferioresType', $ecoDopplerColorVenosoMiembrosInferiore);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ecoDopplerColorVenosoMiembrosInferiore);
            $em->flush();

            return $this->redirectToRoute('ecodopplercolorvenosomiembrosinferiores_show', array('id' => $ecoDopplerColorVenosoMiembrosInferiore->getId()));
        }

        return $this->render('ecodopplercolorvenosomiembrosinferiores/new.html.twig', array(
            'ecoDopplerColorVenosoMiembrosInferiore' => $ecoDopplerColorVenosoMiembrosInferiore,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ecoDopplerColorVenosoMiembrosInferiore entity.
     *
     * @Route("/{id}", name="ecodopplercolorvenosomiembrosinferiores_show")
     * @Method("GET")
     */
    public function showAction(EcoDopplerColorVenosoMiembrosInferiores $ecoDopplerColorVenosoMiembrosInferiore)
    {
        $deleteForm = $this->createDeleteForm($ecoDopplerColorVenosoMiembrosInferiore);

        return $this->render('ecodopplercolorvenosomiembrosinferiores/show.html.twig', array(
            'ecoDopplerColorVenosoMiembrosInferiore' => $ecoDopplerColorVenosoMiembrosInferiore,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ecoDopplerColorVenosoMiembrosInferiore entity.
     *
     * @Route("/{id}/edit", name="ecodopplercolorvenosomiembrosinferiores_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, EcoDopplerColorVenosoMiembrosInferiores $ecoDopplerColorVenosoMiembrosInferiore)
    {
        $deleteForm = $this->createDeleteForm($ecoDopplerColorVenosoMiembrosInferiore);
        $editForm = $this->createForm('AppBundle\Form\EcoDopplerColorVenosoMiembrosInferioresType', $ecoDopplerColorVenosoMiembrosInferiore);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ecodopplercolorvenosomiembrosinferiores_edit', array('id' => $ecoDopplerColorVenosoMiembrosInferiore->getId()));
        }

        return $this->render('ecodopplercolorvenosomiembrosinferiores/edit.html.twig', array(
            'ecoDopplerColorVenosoMiembrosInferiore' => $ecoDopplerColorVenosoMiembrosInferiore,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ecoDopplerColorVenosoMiembrosInferiore entity.
     *
     * @Route("/{id}", name="ecodopplercolorvenosomiembrosinferiores_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, EcoDopplerColorVenosoMiembrosInferiores $ecoDopplerColorVenosoMiembrosInferiore)
    {
        $form = $this->createDeleteForm($ecoDopplerColorVenosoMiembrosInferiore);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ecoDopplerColorVenosoMiembrosInferiore);
            $em->flush();
        }

        return $this->redirectToRoute('ecodopplercolorvenosomiembrosinferiores_index');
    }

    /**
     * Creates a form to delete a ecoDopplerColorVenosoMiembrosInferiore entity.
     *
     * @param EcoDopplerColorVenosoMiembrosInferiores $ecoDopplerColorVenosoMiembrosInferiore The ecoDopplerColorVenosoMiembrosInferiore entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(EcoDopplerColorVenosoMiembrosInferiores $ecoDopplerColorVenosoMiembrosInferiore)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ecodopplercolorvenosomiembrosinferiores_delete', array('id' => $ecoDopplerColorVenosoMiembrosInferiore->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
