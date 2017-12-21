<?php

namespace AppBundle\Controller;

use AppBundle\Entity\EcoCardiogramaTransesofagico;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Ecocardiogramatransesofagico controller.
 *
 * @Route("ecocardiogramatransesofagico")
 */
class EcoCardiogramaTransesofagicoController extends Controller
{
    /**
     * Lists all ecoCardiogramaTransesofagico entities.
     *
     * @Route("/", name="ecocardiogramatransesofagico_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ecoCardiogramaTransesofagicos = $em->getRepository('AppBundle:EcoCardiogramaTransesofagico')->findAll();

        return $this->render('ecocardiogramatransesofagico/index.html.twig', array(
            'ecoCardiogramaTransesofagicos' => $ecoCardiogramaTransesofagicos,
        ));
    }

    /**
     * Creates a new ecoCardiogramaTransesofagico entity.
     *
     * @Route("/new", name="ecocardiogramatransesofagico_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $ecoCardiogramaTransesofagico = new Ecocardiogramatransesofagico();
        $form = $this->createForm('AppBundle\Form\EcoCardiogramaTransesofagicoType', $ecoCardiogramaTransesofagico);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ecoCardiogramaTransesofagico);
            $em->flush();

            return $this->redirectToRoute('ecocardiogramatransesofagico_show', array('id' => $ecoCardiogramaTransesofagico->getId()));
        }

        return $this->render('ecocardiogramatransesofagico/new.html.twig', array(
            'ecoCardiogramaTransesofagico' => $ecoCardiogramaTransesofagico,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ecoCardiogramaTransesofagico entity.
     *
     * @Route("/{id}", name="ecocardiogramatransesofagico_show")
     * @Method("GET")
     */
    public function showAction(EcoCardiogramaTransesofagico $ecoCardiogramaTransesofagico)
    {
        $deleteForm = $this->createDeleteForm($ecoCardiogramaTransesofagico);

        return $this->render('ecocardiogramatransesofagico/show.html.twig', array(
            'ecoCardiogramaTransesofagico' => $ecoCardiogramaTransesofagico,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ecoCardiogramaTransesofagico entity.
     *
     * @Route("/{id}/edit", name="ecocardiogramatransesofagico_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, EcoCardiogramaTransesofagico $ecoCardiogramaTransesofagico)
    {
        $deleteForm = $this->createDeleteForm($ecoCardiogramaTransesofagico);
        $editForm = $this->createForm('AppBundle\Form\EcoCardiogramaTransesofagicoType', $ecoCardiogramaTransesofagico);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ecocardiogramatransesofagico_edit', array('id' => $ecoCardiogramaTransesofagico->getId()));
        }

        return $this->render('ecocardiogramatransesofagico/edit.html.twig', array(
            'ecoCardiogramaTransesofagico' => $ecoCardiogramaTransesofagico,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ecoCardiogramaTransesofagico entity.
     *
     * @Route("/{id}", name="ecocardiogramatransesofagico_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, EcoCardiogramaTransesofagico $ecoCardiogramaTransesofagico)
    {
        $form = $this->createDeleteForm($ecoCardiogramaTransesofagico);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ecoCardiogramaTransesofagico);
            $em->flush();
        }

        return $this->redirectToRoute('ecocardiogramatransesofagico_index');
    }

    /**
     * Creates a form to delete a ecoCardiogramaTransesofagico entity.
     *
     * @param EcoCardiogramaTransesofagico $ecoCardiogramaTransesofagico The ecoCardiogramaTransesofagico entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(EcoCardiogramaTransesofagico $ecoCardiogramaTransesofagico)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ecocardiogramatransesofagico_delete', array('id' => $ecoCardiogramaTransesofagico->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
