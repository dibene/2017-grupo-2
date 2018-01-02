<?php

namespace AppBundle\Controller;

use AppBundle\Entity\AortaAbdominalAteromatosa;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use \Datetime;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\Response;
/**
 * Aortaabdominalateromatosa controller.
 *
 * @Route("estudio/aortaabdominalateromatosa")
 */
class AortaAbdominalAteromatosaController extends Controller
{

    /**
     * Lists all aortaAbdominalAteromatosa entities.
     *
     * @Route("/{id}/pdf/paciente/{idPaciente}", name="aortaabdominalateromatosa_pdf")
     * @Method("GET")
     */
    public function pdfAction(AortaAbdominalAteromatosa $aortaAbdominalAteromatosa , $idPaciente)
    {

      $deleteForm = $this->createDeleteForm($aortaAbdominalAteromatosa);
      $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($idPaciente);
      $user = $this->container->get('security.context')->getToken()->getUser();
      $medico = $this->getDoctrine()->getManager()->getRepository('AppBundle:Medico')->findOneByUsuario($user->getId());


        $snappy = $this->get('knp_snappy.pdf');
        $filename = 'estudio';

        // use absolute path !
        $view = $this->renderView('aortaabdominalateromatosa/print.html.twig', array(
            'estudio' => $aortaAbdominalAteromatosa,
            'paciente' => $paciente,
            'medico' => $medico,
            'delete_form' => $deleteForm->createView(),
        ));

        return new Response(
            $snappy->getOutputFromHtml($view),
            200,
            array(
                'Content-Type'          => 'application/pdf',
                'Content-Disposition'   => 'inline; filename="'.$filename.'.pdf"'
            )
        );
    }


    /**
     * Lists all aortaAbdominalAteromatosa entities.
     *
     * @Route("/", name="aortaabdominalateromatosa_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $aortaAbdominalAteromatosas = $em->getRepository('AppBundle:AortaAbdominalAteromatosa')->findAll();

        return $this->render('aortaabdominalateromatosa/index.html.twig', array(
            'aortaAbdominalAteromatosas' => $aortaAbdominalAteromatosas,
        ));
    }



    /**
     * Creates a new aortaAbdominalAteromatosa entity.
     *
     * @Route("/new/paciente/{id}", name="aortaabdominalateromatosa_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, $id)
    {

        $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($id);
        $user = $this->container->get('security.context')->getToken()->getUser();
        $medico = $this->getDoctrine()->getManager()->getRepository('AppBundle:Medico')->findOneByUsuario($user->getId());
        $aortaAbdominalAteromatosa = new AortaAbdominalAteromatosa($medico, $paciente,$this->getDoctrine()->getManager());

        $form = $this->createForm('AppBundle\Form\AortaAbdominalAteromatosaType', $aortaAbdominalAteromatosa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($aortaAbdominalAteromatosa);
            $em->flush();

            return $this->redirectToRoute('aortaabdominalateromatosa_show', array('id' => $aortaAbdominalAteromatosa->getId(),
          'idPaciente' => $paciente->getId(),
          'medico' => $medico,
          'paciente' => $paciente,
          'estudio' => $aortaAbdominalAteromatosa));
        }

        return $this->render('aortaabdominalateromatosa/new.html.twig', array(
            'estudio' => $aortaAbdominalAteromatosa,
            'paciente' => $paciente,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a aortaAbdominalAteromatosa entity.
     *
     * @Route("/{id}/paciente/{idPaciente}", name="aortaabdominalateromatosa_show")
     * @Method("GET")
     */
    public function showAction(AortaAbdominalAteromatosa $aortaAbdominalAteromatosa , $idPaciente)
    {
        $deleteForm = $this->createDeleteForm($aortaAbdominalAteromatosa);
        $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($idPaciente);
        $user = $this->container->get('security.context')->getToken()->getUser();
        $medico = $this->getDoctrine()->getManager()->getRepository('AppBundle:Medico')->findOneByUsuario($user->getId());

        return $this->render('aortaabdominalateromatosa/show.html.twig', array(
            'estudio' => $aortaAbdominalAteromatosa,
            'paciente' => $paciente,
            'medico' => $medico,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing aortaAbdominalAteromatosa entity.
     *
     * @Route("/{id}/edit/paciente/{idPaciente}", name="aortaabdominalateromatosa_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, AortaAbdominalAteromatosa $aortaAbdominalAteromatosa ,  $idPaciente)
    {
        $deleteForm = $this->createDeleteForm($aortaAbdominalAteromatosa);
        $editForm = $this->createForm('AppBundle\Form\AortaAbdominalAteromatosaType', $aortaAbdominalAteromatosa);
        $editForm->handleRequest($request);
        $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($idPaciente);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('aortaabdominalateromatosa_edit', array('id' => $aortaAbdominalAteromatosa->getId(),
            'estudio' => $aortaAbdominalAteromatosa,
            'paciente' => $paciente,
            'idPaciente' => $paciente->getId()
          ));
        }

        return $this->render('aortaabdominalateromatosa/edit.html.twig', array(
            'estudio' => $aortaAbdominalAteromatosa,
            'paciente' => $paciente,
            'idPaciente' => $paciente->getId(),
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a aortaAbdominalAteromatosa entity.
     *
     * @Route("/{id}", name="aortaabdominalateromatosa_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, AortaAbdominalAteromatosa $aortaAbdominalAteromatosa)
    {
        $form = $this->createDeleteForm($aortaAbdominalAteromatosa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($aortaAbdominalAteromatosa);
            $em->flush();
        }

        return $this->redirectToRoute('aortaabdominalateromatosa_index');
    }

    /**
     * Creates a form to delete a aortaAbdominalAteromatosa entity.
     *
     * @param AortaAbdominalAteromatosa $aortaAbdominalAteromatosa The aortaAbdominalAteromatosa entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(AortaAbdominalAteromatosa $aortaAbdominalAteromatosa)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('aortaabdominalateromatosa_delete', array('id' => $aortaAbdominalAteromatosa->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
