<?php

namespace AppBundle\Controller;

use AppBundle\Entity\GrupoDiagnostico;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use  Doctrine \ ORM \ Tools \ Pagination \ Paginator ;

/**
 * Grupodiagnostico controller.
 *
 * @Route("grupodiagnostico")
 */
class GrupoDiagnosticoController extends Controller
{
    /**
     * Lists all grupoDiagnostico entities.
     *
     * @Route("/", name="grupodiagnostico_index")
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        //$grupoDiagnosticos = $em->getRepository('AppBundle:GrupoDiagnostico')->findAll();

        $grupoDiagnosticos = $em->getRepository('AppBundle:GrupoDiagnostico')->findForPaginator();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
        $grupoDiagnosticos, $request->query->getInt('page', 1),
            5 );

        return $this->render('grupodiagnostico/index.html.twig', array(
            //'grupoDiagnosticos' => $grupoDiagnosticos,
            'pagination' => $pagination
        ));
    }

    /**
     * Creates a new grupoDiagnostico entity.
     *
     * @Route("/new", name="grupodiagnostico_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $grupoDiagnostico = new Grupodiagnostico();
        $form = $this->createForm('AppBundle\Form\GrupoDiagnosticoType', $grupoDiagnostico);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($grupoDiagnostico);
            $em->flush();
            $this->addFlash('mensaje', 'Diagnostico creado correctamente');

            return $this->redirectToRoute('grupodiagnostico_show', array('id' => $grupoDiagnostico->getId()));
        }

        return $this->render('grupodiagnostico/new.html.twig', array(
            'grupoDiagnostico' => $grupoDiagnostico,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a grupoDiagnostico entity.
     *
     * @Route("/{id}", name="grupodiagnostico_show")
     * @Method("GET")
     */
    public function showAction(GrupoDiagnostico $grupoDiagnostico)
    {
        $deleteForm = $this->createDeleteForm($grupoDiagnostico);

        return $this->render('grupodiagnostico/show.html.twig', array(
            'grupoDiagnostico' => $grupoDiagnostico,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing grupoDiagnostico entity.
     *
     * @Route("/{id}/edit", name="grupodiagnostico_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, GrupoDiagnostico $grupoDiagnostico)
    {
        $deleteForm = $this->createDeleteForm($grupoDiagnostico);
        $editForm = $this->createForm('AppBundle\Form\GrupoDiagnosticoType', $grupoDiagnostico);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('mensaje', 'Diagnostico editado correctamente');

            return $this->redirectToRoute('grupodiagnostico_edit', array('id' => $grupoDiagnostico->getId()));
        }

        return $this->render('grupodiagnostico/edit.html.twig', array(
            'grupoDiagnostico' => $grupoDiagnostico,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a grupoDiagnostico entity.
     *
     * @Route("/{id}", name="grupodiagnostico_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, GrupoDiagnostico $grupoDiagnostico)
    {
        $form = $this->createDeleteForm($grupoDiagnostico);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($grupoDiagnostico);
            $em->flush();
        }

        return $this->redirectToRoute('grupodiagnostico_index');
    }

    /**
     * Creates a form to delete a grupoDiagnostico entity.
     *
     * @param GrupoDiagnostico $grupoDiagnostico The grupoDiagnostico entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(GrupoDiagnostico $grupoDiagnostico)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('grupodiagnostico_delete', array('id' => $grupoDiagnostico->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
