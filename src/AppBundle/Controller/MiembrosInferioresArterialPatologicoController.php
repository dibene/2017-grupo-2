<?php

namespace AppBundle\Controller;

use AppBundle\Entity\MiembrosInferioresArterialPatologico;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Miembrosinferioresarterialpatologico controller.
 *
 * @Route("estudio/miembrosinferioresarterialpatologico")
 */
class MiembrosInferioresArterialPatologicoController extends Controller
{
    /**
     * Lists all miembrosInferioresArterialPatologico entities.
     *
     * @Route("/", name="miembrosinferioresarterialpatologico_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $miembrosInferioresArterialPatologicos = $em->getRepository('AppBundle:MiembrosInferioresArterialPatologico')->findAll();

        return $this->render('miembrosinferioresarterialpatologico/index.html.twig', array(
            'miembrosInferioresArterialPatologicos' => $miembrosInferioresArterialPatologicos,
        ));
    }

    /**
     * Creates a new miembrosInferioresArterialPatologico entity.
     *
     * @Route("/new", name="miembrosinferioresarterialpatologico_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $miembrosInferioresArterialPatologico = new Miembrosinferioresarterialpatologico();
        $form = $this->createForm('AppBundle\Form\MiembrosInferioresArterialPatologicoType', $miembrosInferioresArterialPatologico);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($miembrosInferioresArterialPatologico);
            $em->flush();

            return $this->redirectToRoute('miembrosinferioresarterialpatologico_show', array('id' => $miembrosInferioresArterialPatologico->getId()));
        }

        return $this->render('miembrosinferioresarterialpatologico/new.html.twig', array(
            'miembrosInferioresArterialPatologico' => $miembrosInferioresArterialPatologico,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a miembrosInferioresArterialPatologico entity.
     *
     * @Route("/{id}", name="miembrosinferioresarterialpatologico_show")
     * @Method("GET")
     */
    public function showAction(MiembrosInferioresArterialPatologico $miembrosInferioresArterialPatologico)
    {
        $deleteForm = $this->createDeleteForm($miembrosInferioresArterialPatologico);

        return $this->render('miembrosinferioresarterialpatologico/show.html.twig', array(
            'miembrosInferioresArterialPatologico' => $miembrosInferioresArterialPatologico,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing miembrosInferioresArterialPatologico entity.
     *
     * @Route("/{id}/edit", name="miembrosinferioresarterialpatologico_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, MiembrosInferioresArterialPatologico $miembrosInferioresArterialPatologico)
    {
        $deleteForm = $this->createDeleteForm($miembrosInferioresArterialPatologico);
        $editForm = $this->createForm('AppBundle\Form\MiembrosInferioresArterialPatologicoType', $miembrosInferioresArterialPatologico);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('miembrosinferioresarterialpatologico_edit', array('id' => $miembrosInferioresArterialPatologico->getId()));
        }

        return $this->render('miembrosinferioresarterialpatologico/edit.html.twig', array(
            'miembrosInferioresArterialPatologico' => $miembrosInferioresArterialPatologico,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a miembrosInferioresArterialPatologico entity.
     *
     * @Route("/{id}", name="miembrosinferioresarterialpatologico_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, MiembrosInferioresArterialPatologico $miembrosInferioresArterialPatologico)
    {
        $form = $this->createDeleteForm($miembrosInferioresArterialPatologico);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($miembrosInferioresArterialPatologico);
            $em->flush();
        }

        return $this->redirectToRoute('miembrosinferioresarterialpatologico_index');
    }

    /**
     * Creates a form to delete a miembrosInferioresArterialPatologico entity.
     *
     * @param MiembrosInferioresArterialPatologico $miembrosInferioresArterialPatologico The miembrosInferioresArterialPatologico entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(MiembrosInferioresArterialPatologico $miembrosInferioresArterialPatologico)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('miembrosinferioresarterialpatologico_delete', array('id' => $miembrosInferioresArterialPatologico->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
