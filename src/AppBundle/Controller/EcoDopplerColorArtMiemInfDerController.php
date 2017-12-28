<?php

namespace AppBundle\Controller;

use AppBundle\Entity\EcoDopplerColorArtMiemInfDer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;
use \Datetime;
/**
 * Ecodopplercolorartmieminfder controller.
 *
 * @Route("ecodopplercolorartmieminfder")
 */
class EcoDopplerColorArtMiemInfDerController extends Controller
{
    /**
     * Lists all ecoDopplerColorArtMiemInfDer entities.
     *
     * @Route("/", name="ecodopplercolorartmieminfder_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ecoDopplerColorArtMiemInfDers = $em->getRepository('AppBundle:EcoDopplerColorArtMiemInfDer')->findAll();

        return $this->render('ecodopplercolorartmieminfder/index.html.twig', array(
            'ecoDopplerColorArtMiemInfDers' => $ecoDopplerColorArtMiemInfDers,
        ));
    }

    /**
     * Creates a new ecoDopplerColorArtMiemInfDer entity.
     *
     * @Route("/new/{id}", name="ecodopplercolorartmieminfder_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, $id)
    {
        $ecoDopplerColorArtMiemInfDer = new Ecodopplercolorartmieminfder();
        $form = $this->createForm('AppBundle\Form\EcoDopplerColorArtMiemInfDerType', $ecoDopplerColorArtMiemInfDer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ecoDopplerColorArtMiemInfDer);
            $em->flush();

            return $this->redirectToRoute('ecodopplercolorartmieminfder_show', array('id' => $ecoDopplerColorArtMiemInfDer->getId()));
        }

        return $this->render('ecodopplercolorartmieminfder/new.html.twig', array(
            'ecoDopplerColorArtMiemInfDer' => $ecoDopplerColorArtMiemInfDer,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ecoDopplerColorArtMiemInfDer entity.
     *
     * @Route("/{id}", name="ecodopplercolorartmieminfder_show")
     * @Method("GET")
     */
    public function showAction(EcoDopplerColorArtMiemInfDer $ecoDopplerColorArtMiemInfDer)
    {
        $deleteForm = $this->createDeleteForm($ecoDopplerColorArtMiemInfDer);

        return $this->render('ecodopplercolorartmieminfder/show.html.twig', array(
            'ecoDopplerColorArtMiemInfDer' => $ecoDopplerColorArtMiemInfDer,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ecoDopplerColorArtMiemInfDer entity.
     *
     * @Route("/{id}/edit", name="ecodopplercolorartmieminfder_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, EcoDopplerColorArtMiemInfDer $ecoDopplerColorArtMiemInfDer)
    {
        $deleteForm = $this->createDeleteForm($ecoDopplerColorArtMiemInfDer);
        $editForm = $this->createForm('AppBundle\Form\EcoDopplerColorArtMiemInfDerType', $ecoDopplerColorArtMiemInfDer);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ecodopplercolorartmieminfder_edit', array('id' => $ecoDopplerColorArtMiemInfDer->getId()));
        }

        return $this->render('ecodopplercolorartmieminfder/edit.html.twig', array(
            'ecoDopplerColorArtMiemInfDer' => $ecoDopplerColorArtMiemInfDer,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ecoDopplerColorArtMiemInfDer entity.
     *
     * @Route("/{id}", name="ecodopplercolorartmieminfder_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, EcoDopplerColorArtMiemInfDer $ecoDopplerColorArtMiemInfDer)
    {
        $form = $this->createDeleteForm($ecoDopplerColorArtMiemInfDer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ecoDopplerColorArtMiemInfDer);
            $em->flush();
        }

        return $this->redirectToRoute('ecodopplercolorartmieminfder_index');
    }

    /**
     * Creates a form to delete a ecoDopplerColorArtMiemInfDer entity.
     *
     * @param EcoDopplerColorArtMiemInfDer $ecoDopplerColorArtMiemInfDer The ecoDopplerColorArtMiemInfDer entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(EcoDopplerColorArtMiemInfDer $ecoDopplerColorArtMiemInfDer)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ecodopplercolorartmieminfder_delete', array('id' => $ecoDopplerColorArtMiemInfDer->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
