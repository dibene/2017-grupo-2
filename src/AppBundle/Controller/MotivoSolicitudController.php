<?php

namespace AppBundle\Controller;

use AppBundle\Entity\MotivoSolicitud;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Motivosolicitud controller.
 *
 * @Route("motivosolicitud")
 */
class MotivoSolicitudController extends Controller
{
    /**
     * Lists all motivoSolicitud entities.
     *
     * @Route("/", name="motivosolicitud_index")
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $motivoSolicituds = $em->getRepository('AppBundle:MotivoSolicitud')->findForPaginator();

                $paginator = $this->get('knp_paginator');
                $pagination = $paginator->paginate(
                $motivoSolicituds, $request->query->getInt('page', 1),
                    5 );
        return $this->render('motivosolicitud/index.html.twig', array(
          'pagination' => $pagination
        ));
    }

    /**
     * Creates a new motivoSolicitud entity.
     *
     * @Route("/new", name="motivosolicitud_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $motivoSolicitud = new Motivosolicitud();
        $form = $this->createForm('AppBundle\Form\MotivoSolicitudType', $motivoSolicitud);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($motivoSolicitud);
            $em->flush();
            $this->addFlash('mensaje', 'Motivo creado correctamente');

            return $this->redirectToRoute('motivosolicitud_show', array('id' => $motivoSolicitud->getId()));
        }

        return $this->render('motivosolicitud/new.html.twig', array(
            'motivoSolicitud' => $motivoSolicitud,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a motivoSolicitud entity.
     *
     * @Route("/{id}", name="motivosolicitud_show")
     * @Method("GET")
     */
    public function showAction(MotivoSolicitud $motivoSolicitud)
    {
        $deleteForm = $this->createDeleteForm($motivoSolicitud);

        return $this->render('motivosolicitud/show.html.twig', array(
            'motivoSolicitud' => $motivoSolicitud,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing motivoSolicitud entity.
     *
     * @Route("/{id}/edit", name="motivosolicitud_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, MotivoSolicitud $motivoSolicitud)
    {
        $deleteForm = $this->createDeleteForm($motivoSolicitud);
        $editForm = $this->createForm('AppBundle\Form\MotivoSolicitudType', $motivoSolicitud);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('mensaje', 'Motivo editado correctamente');

            return $this->redirectToRoute('motivosolicitud_edit', array('id' => $motivoSolicitud->getId()));
        }

        return $this->render('motivosolicitud/edit.html.twig', array(
            'motivoSolicitud' => $motivoSolicitud,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a motivoSolicitud entity.
     *
     * @Route("/{id}", name="motivosolicitud_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, MotivoSolicitud $motivoSolicitud)
    {
        $form = $this->createDeleteForm($motivoSolicitud);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($motivoSolicitud);
            $em->flush();
        }

        return $this->redirectToRoute('motivosolicitud_index');
    }

    /**
     * Creates a form to delete a motivoSolicitud entity.
     *
     * @param MotivoSolicitud $motivoSolicitud The motivoSolicitud entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(MotivoSolicitud $motivoSolicitud)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('motivosolicitud_delete', array('id' => $motivoSolicitud->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
