<?php

namespace AppBundle\Controller;

use AppBundle\Entity\EcoCardiogramaInySolSalAgit;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;
use \Datetime;
/**
 * Ecocardiogramainysolsalagit controller.
 *
 * @Route("ecocardiogramainysolsalagit")
 */
class EcoCardiogramaInySolSalAgitController extends Controller
{
    /**
     * Lists all ecoCardiogramaInySolSalAgit entities.
     *
     * @Route("/", name="ecocardiogramainysolsalagit_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ecoCardiogramaInySolSalAgits = $em->getRepository('AppBundle:EcoCardiogramaInySolSalAgit')->findAll();

        return $this->render('ecocardiogramainysolsalagit/index.html.twig', array(
            'ecoCardiogramaInySolSalAgits' => $ecoCardiogramaInySolSalAgits,
        ));
    }

    /**
     * Creates a new ecoCardiogramaInySolSalAgit entity.
     *
     * @Route("/new/{id}", name="ecocardiogramainysolsalagit_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, $id)
    {
      $configuracion = $this->getDoctrine()->getManager()->getRepository('AppBundle:EstudioConfiguracion')->find($id);
      $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($id);
      $fecha = new Datetime(date("Y-m-d"));
        $ecoCardiogramaInySolSalAgit = new EcoCardiogramaInySolSalAgit($configuracion,$paciente,$fecha);
        $form = $this->createForm('AppBundle\Form\EcoCardiogramaInySolSalAgitType', $ecoCardiogramaInySolSalAgit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ecoCardiogramaInySolSalAgit);
            $em->flush();

            return $this->redirectToRoute('ecocardiogramainysolsalagit_show', array('id' => $ecoCardiogramaInySolSalAgit->getId()));
        }

        return $this->render('ecocardiogramainysolsalagit/new.html.twig', array(
            'ecoCardiogramaInySolSalAgit' => $ecoCardiogramaInySolSalAgit,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ecoCardiogramaInySolSalAgit entity.
     *
     * @Route("/{id}", name="ecocardiogramainysolsalagit_show")
     * @Method("GET")
     */
    public function showAction(EcoCardiogramaInySolSalAgit $ecoCardiogramaInySolSalAgit)
    {
        $deleteForm = $this->createDeleteForm($ecoCardiogramaInySolSalAgit);

        return $this->render('ecocardiogramainysolsalagit/show.html.twig', array(
            'ecoCardiogramaInySolSalAgit' => $ecoCardiogramaInySolSalAgit,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ecoCardiogramaInySolSalAgit entity.
     *
     * @Route("/{id}/edit", name="ecocardiogramainysolsalagit_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, EcoCardiogramaInySolSalAgit $ecoCardiogramaInySolSalAgit)
    {
        $deleteForm = $this->createDeleteForm($ecoCardiogramaInySolSalAgit);
        $editForm = $this->createForm('AppBundle\Form\EcoCardiogramaInySolSalAgitType', $ecoCardiogramaInySolSalAgit);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ecocardiogramainysolsalagit_edit', array('id' => $ecoCardiogramaInySolSalAgit->getId()));
        }

        return $this->render('ecocardiogramainysolsalagit/edit.html.twig', array(
            'ecoCardiogramaInySolSalAgit' => $ecoCardiogramaInySolSalAgit,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ecoCardiogramaInySolSalAgit entity.
     *
     * @Route("/{id}", name="ecocardiogramainysolsalagit_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, EcoCardiogramaInySolSalAgit $ecoCardiogramaInySolSalAgit)
    {
        $form = $this->createDeleteForm($ecoCardiogramaInySolSalAgit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ecoCardiogramaInySolSalAgit);
            $em->flush();
        }

        return $this->redirectToRoute('ecocardiogramainysolsalagit_index');
    }

    /**
     * Creates a form to delete a ecoCardiogramaInySolSalAgit entity.
     *
     * @param EcoCardiogramaInySolSalAgit $ecoCardiogramaInySolSalAgit The ecoCardiogramaInySolSalAgit entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(EcoCardiogramaInySolSalAgit $ecoCardiogramaInySolSalAgit)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ecocardiogramainysolsalagit_delete', array('id' => $ecoCardiogramaInySolSalAgit->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
