<?php

namespace AppBundle\Controller;

use AppBundle\Entity\EcoEstres;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use \Datetime;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\Response;
/**
 * Ecoestre controller.
 *
 * @Route("estudio/ecoestres")
 */
class EcoEstresController extends Controller
{
    /**
     * Lists all ecoEstre entities.
     *
     * @Route("/", name="ecoestres_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ecoEstres = $em->getRepository('AppBundle:EcoEstres')->findAll();

        return $this->render('ecoestres/index.html.twig', array(
            'ecoEstres' => $ecoEstres,
        ));
    }

    /**
     * Creates a new ecoEstre entity.
     *
     * @Route("/new/paciente/{id}", name="ecoestres_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, $id)
    {
            $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($id);
            $user = $this->container->get('security.context')->getToken()->getUser();
            $medico = $this->getDoctrine()->getManager()->getRepository('AppBundle:Medico')->findOneByUsuario($user->getId());

        $ecoEstre = new EcoEstres($medico, $paciente,$this->getDoctrine()->getManager());
        $form = $this->createForm('AppBundle\Form\EcoEstresType', $ecoEstre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ecoEstre);
            $em->flush();
            $this->addFlash('mensaje', 'Estudio creado correctamente');

            return $this->redirectToRoute('ecoestres_show', array('id' => $ecoEstre->getId(),
          'idPaciente' => $paciente->getId(),
          'medico' => $medico,
          'paciente' => $paciente,
          'estudio' => $ecoEstre));
        }

        return $this->render('ecoestres/new.html.twig', array(
            'estudio' => $ecoEstre,
                        'paciente' => $paciente,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ecoEstre entity.
     *
     * @Route("/{id}/paciente/{idPaciente}",  name="ecoestres_show")
     * @Method("GET")
     */
    public function showAction(EcoEstres $ecoEstre, $idPaciente)
    {
        $deleteForm = $this->createDeleteForm($ecoEstre);
        $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($idPaciente);
        $user = $this->container->get('security.context')->getToken()->getUser();
        $medico = $this->getDoctrine()->getManager()->getRepository('AppBundle:Medico')->findOneByUsuario($user->getId());

        return $this->render('ecoestres/show.html.twig', array(
            'estudio' => $ecoEstre,
            'paciente' => $paciente,
            'medico' => $medico,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ecoEstre entity.
     *
       * @Route("/{id}/edit/paciente/{idPaciente}", name="ecoestres_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, EcoEstres $ecoEstre,  $idPaciente)
    {
        $deleteForm = $this->createDeleteForm($ecoEstre);
        $editForm = $this->createForm('AppBundle\Form\EcoEstresType', $ecoEstre);
        $editForm->handleRequest($request);
        $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($idPaciente);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('mensaje', 'Estudio editado correctamente');

            return $this->redirectToRoute('ecoestres_edit', array('id' => $ecoEstre->getId(),
            'estudio' => $aortaAbdominalAteromatosa,
            'paciente' => $paciente,
            'idPaciente' => $paciente->getId()
          ));
        }

        return $this->render('ecoestres/edit.html.twig', array(
        'paciente' => $paciente,
        'idPaciente' => $paciente->getId(),
            'ecoEstre' => $ecoEstre,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ecoEstre entity.
     *
     * @Route("/{id}", name="ecoestres_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, EcoEstres $ecoEstre)
    {
        $form = $this->createDeleteForm($ecoEstre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ecoEstre);
            $em->flush();
        }

        return $this->redirectToRoute('ecoestres_index');
    }

    /**
     * Creates a form to delete a ecoEstre entity.
     *
     * @param EcoEstres $ecoEstre The ecoEstre entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(EcoEstres $ecoEstre)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ecoestres_delete', array('id' => $ecoEstre->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
