<?php

namespace AppBundle\Controller;

use AppBundle\Entity\EcoEstres;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Ecoestre controller.
 *
 * @Route("estudio/ecoestres")
 */
class EcoEstresController extends Controller
{
    /**
     * Lists all ecoEstre entities.
     *
     * @Route("/", name="ecoestres_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ecoEstres = $em->getRepository('AppBundle:EcoEstres')->findAll();

        return $this->render('ecoestres/index.html.twig', array(
            'ecoEstres' => $ecoEstres,
        ));
    }

    /**
     * Creates a new ecoEstre entity.
     *
     * @Route("/new", name="ecoestres_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $ecoEstre = new EcoEstres();
        $form = $this->createForm('AppBundle\Form\EcoEstresType', $ecoEstre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ecoEstre);
            $em->flush();

            return $this->redirectToRoute('ecoestres_show', array('id' => $ecoEstre->getId()));
        }

        return $this->render('ecoestres/new.html.twig', array(
            'ecoEstre' => $ecoEstre,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ecoEstre entity.
     *
     * @Route("/{id}", name="ecoestres_show")
     * @Method("GET")
     */
    public function showAction(EcoEstres $ecoEstre)
    {
        $deleteForm = $this->createDeleteForm($ecoEstre);

        return $this->render('ecoestres/show.html.twig', array(
            'ecoEstre' => $ecoEstre,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ecoEstre entity.
     *
     * @Route("/{id}/edit", name="ecoestres_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, EcoEstres $ecoEstre)
    {
        $deleteForm = $this->createDeleteForm($ecoEstre);
        $editForm = $this->createForm('AppBundle\Form\EcoEstresType', $ecoEstre);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ecoestres_edit', array('id' => $ecoEstre->getId()));
        }

        return $this->render('ecoestres/edit.html.twig', array(
            'ecoEstre' => $ecoEstre,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ecoEstre entity.
     *
     * @Route("/{id}", name="ecoestres_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, EcoEstres $ecoEstre)
    {
        $form = $this->createDeleteForm($ecoEstre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ecoEstre);
            $em->flush();
        }

        return $this->redirectToRoute('ecoestres_index');
    }

    /**
     * Creates a form to delete a ecoEstre entity.
     *
     * @param EcoEstres $ecoEstre The ecoEstre entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(EcoEstres $ecoEstre)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ecoestres_delete', array('id' => $ecoEstre->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
