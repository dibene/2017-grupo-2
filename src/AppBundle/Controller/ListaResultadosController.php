<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ListaResultados;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Listaresultado controller.
 *
 * @Route("listaresultados")
 */
class ListaResultadosController extends Controller
{
    /**
     * Lists all listaResultado entities.
     *
     * @Route("/", name="listaresultados_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $listaResultados = $em->getRepository('AppBundle:ListaResultados')->findAll();

        return $this->render('listaresultados/index.html.twig', array(
            'listaResultados' => $listaResultados,
        ));
    }

    /**
     * Creates a new listaResultado entity.
     *
     * @Route("/new", name="listaresultados_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $listaResultado = new Listaresultado();
        $form = $this->createForm('AppBundle\Form\ListaResultadosType', $listaResultado);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($listaResultado);
            $em->flush();

            return $this->redirectToRoute('listaresultados_show', array('id' => $listaResultado->getId()));
        }

        return $this->render('listaresultados/new.html.twig', array(
            'listaResultado' => $listaResultado,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a listaResultado entity.
     *
     * @Route("/{id}", name="listaresultados_show")
     * @Method("GET")
     */
    public function showAction(ListaResultados $listaResultado)
    {
        $deleteForm = $this->createDeleteForm($listaResultado);

        return $this->render('listaresultados/show.html.twig', array(
            'listaResultado' => $listaResultado,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing listaResultado entity.
     *
     * @Route("/{id}/edit", name="listaresultados_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ListaResultados $listaResultado)
    {
        $deleteForm = $this->createDeleteForm($listaResultado);
        $editForm = $this->createForm('AppBundle\Form\ListaResultadosType', $listaResultado);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('listaresultados_edit', array('id' => $listaResultado->getId()));
        }

        return $this->render('listaresultados/edit.html.twig', array(
            'listaResultado' => $listaResultado,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a listaResultado entity.
     *
     * @Route("/{id}", name="listaresultados_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ListaResultados $listaResultado)
    {
        $form = $this->createDeleteForm($listaResultado);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($listaResultado);
            $em->flush();
        }

        return $this->redirectToRoute('listaresultados_index');
    }

    /**
     * Creates a form to delete a listaResultado entity.
     *
     * @param ListaResultados $listaResultado The listaResultado entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ListaResultados $listaResultado)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('listaresultados_delete', array('id' => $listaResultado->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
