<?php

namespace AppBundle\Controller;

use AppBundle\Entity\AortaAbdominal;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Aortaabdominal controller.
 *
 * @Route("aortaabdominal")
 */
class AortaAbdominalController extends Controller
{
    /**
     * Lists all aortaAbdominal entities.
     *
     * @Route("/", name="aortaabdominal_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $aortaAbdominals = $em->getRepository('AppBundle:AortaAbdominal')->findAll();

        return $this->render('aortaabdominal/index.html.twig', array(
            'aortaAbdominals' => $aortaAbdominals,
        ));
    }

    /**
     * Creates a new aortaAbdominal entity.
     *
     * @Route("/new", name="aortaabdominal_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $aortaAbdominal = new Aortaabdominal();
        $form = $this->createForm('AppBundle\Form\AortaAbdominalType', $aortaAbdominal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($aortaAbdominal);
            $em->flush();

            return $this->redirectToRoute('aortaabdominal_show', array('id' => $aortaAbdominal->getId()));
        }

        return $this->render('aortaabdominal/new.html.twig', array(
            'aortaAbdominal' => $aortaAbdominal,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a aortaAbdominal entity.
     *
     * @Route("/{id}", name="aortaabdominal_show")
     * @Method("GET")
     */
    public function showAction(AortaAbdominal $aortaAbdominal)
    {
        $deleteForm = $this->createDeleteForm($aortaAbdominal);

        return $this->render('aortaabdominal/show.html.twig', array(
            'aortaAbdominal' => $aortaAbdominal,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing aortaAbdominal entity.
     *
     * @Route("/{id}/edit", name="aortaabdominal_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, AortaAbdominal $aortaAbdominal)
    {
        $deleteForm = $this->createDeleteForm($aortaAbdominal);
        $editForm = $this->createForm('AppBundle\Form\AortaAbdominalType', $aortaAbdominal);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('aortaabdominal_edit', array('id' => $aortaAbdominal->getId()));
        }

        return $this->render('aortaabdominal/edit.html.twig', array(
            'aortaAbdominal' => $aortaAbdominal,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a aortaAbdominal entity.
     *
     * @Route("/{id}", name="aortaabdominal_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, AortaAbdominal $aortaAbdominal)
    {
        $form = $this->createDeleteForm($aortaAbdominal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($aortaAbdominal);
            $em->flush();
        }

        return $this->redirectToRoute('aortaabdominal_index');
    }

    /**
     * Creates a form to delete a aortaAbdominal entity.
     *
     * @param AortaAbdominal $aortaAbdominal The aortaAbdominal entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(AortaAbdominal $aortaAbdominal)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('aortaabdominal_delete', array('id' => $aortaAbdominal->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
