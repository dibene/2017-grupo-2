<?php

namespace AppBundle\Controller;

use AppBundle\Entity\EcoDoppColorMiemInfDer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;
use \Datetime;
/**
 * Ecodoppcolormieminfder controller.
 *
 * @Route("ecodoppcolormieminfder")
 */
class EcoDoppColorMiemInfDerController extends Controller
{
    /**
     * Lists all ecoDoppColorMiemInfDer entities.
     *
     * @Route("/", name="ecodoppcolormieminfder_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ecoDoppColorMiemInfDers = $em->getRepository('AppBundle:EcoDoppColorMiemInfDer')->findAll();

        return $this->render('ecodoppcolormieminfder/index.html.twig', array(
            'ecoDoppColorMiemInfDers' => $ecoDoppColorMiemInfDers,
        ));
    }

    /**
     * Creates a new ecoDoppColorMiemInfDer entity.
     *
     * @Route("/new/{id}", name="ecodoppcolormieminfder_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, $id)
    {
        $ecoDoppColorMiemInfDer = new Ecodoppcolormieminfder();
        $form = $this->createForm('AppBundle\Form\EcoDoppColorMiemInfDerType', $ecoDoppColorMiemInfDer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ecoDoppColorMiemInfDer);
            $em->flush();

            return $this->redirectToRoute('ecodoppcolormieminfder_show', array('id' => $ecoDoppColorMiemInfDer->getId()));
        }

        return $this->render('ecodoppcolormieminfder/new.html.twig', array(
            'ecoDoppColorMiemInfDer' => $ecoDoppColorMiemInfDer,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ecoDoppColorMiemInfDer entity.
     *
     * @Route("/{id}", name="ecodoppcolormieminfder_show")
     * @Method("GET")
     */
    public function showAction(EcoDoppColorMiemInfDer $ecoDoppColorMiemInfDer)
    {
        $deleteForm = $this->createDeleteForm($ecoDoppColorMiemInfDer);

        return $this->render('ecodoppcolormieminfder/show.html.twig', array(
            'ecoDoppColorMiemInfDer' => $ecoDoppColorMiemInfDer,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ecoDoppColorMiemInfDer entity.
     *
     * @Route("/{id}/edit", name="ecodoppcolormieminfder_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, EcoDoppColorMiemInfDer $ecoDoppColorMiemInfDer)
    {
        $deleteForm = $this->createDeleteForm($ecoDoppColorMiemInfDer);
        $editForm = $this->createForm('AppBundle\Form\EcoDoppColorMiemInfDerType', $ecoDoppColorMiemInfDer);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ecodoppcolormieminfder_edit', array('id' => $ecoDoppColorMiemInfDer->getId()));
        }

        return $this->render('ecodoppcolormieminfder/edit.html.twig', array(
            'ecoDoppColorMiemInfDer' => $ecoDoppColorMiemInfDer,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ecoDoppColorMiemInfDer entity.
     *
     * @Route("/{id}", name="ecodoppcolormieminfder_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, EcoDoppColorMiemInfDer $ecoDoppColorMiemInfDer)
    {
        $form = $this->createDeleteForm($ecoDoppColorMiemInfDer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ecoDoppColorMiemInfDer);
            $em->flush();
        }

        return $this->redirectToRoute('ecodoppcolormieminfder_index');
    }

    /**
     * Creates a form to delete a ecoDoppColorMiemInfDer entity.
     *
     * @param EcoDoppColorMiemInfDer $ecoDoppColorMiemInfDer The ecoDoppColorMiemInfDer entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(EcoDoppColorMiemInfDer $ecoDoppColorMiemInfDer)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ecodoppcolormieminfder_delete', array('id' => $ecoDoppColorMiemInfDer->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
