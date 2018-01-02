<?php

namespace AppBundle\Controller;

use AppBundle\Entity\EcoDopplerColorVenosoMiembrosInferiores;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Ecodopplercolorvenosomiembrosinferiore controller.
 *
 * @Route("estudio/ecodopplercolorvenosomiembrosinferiores")
 */
class EcoDopplerColorVenosoMiembrosInferioresController extends Controller
{
    /**
     * Lists all ecoDopplerColorVenosoMiembrosInferiore entities.
     *
     * @Route("/", name="ecodopplercolorvenosomiembrosinferiores_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ecoDopplerColorVenosoMiembrosInferiores = $em->getRepository('AppBundle:EcoDopplerColorVenosoMiembrosInferiores')->findAll();

        return $this->render('ecodopplercolorvenosomiembrosinferiores/index.html.twig', array(
            'ecoDopplerColorVenosoMiembrosInferiores' => $ecoDopplerColorVenosoMiembrosInferiores,
        ));
    }

    /**
     * Creates a new ecoDopplerColorVenosoMiembrosInferiore entity.
     *
     * @Route("/new/paciente/{id}", name="ecodopplercolorvenosomiembrosinferiores_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, $id)
    {
        $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($id);
        $user = $this->container->get('security.context')->getToken()->getUser();
        $medico = $this->getDoctrine()->getManager()->getRepository('AppBundle:Medico')->findOneByUsuario($user->getId());

        $ecoDopplerColorVenosoMiembrosInferiore = new EcoDopplerColorVenosoMiembrosInferiores($medico, $paciente,$this->getDoctrine()->getManager());
        $form = $this->createForm('AppBundle\Form\EcoDopplerColorVenosoMiembrosInferioresType', $ecoDopplerColorVenosoMiembrosInferiore);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ecoDopplerColorVenosoMiembrosInferiore);
            $em->flush();

            return $this->redirectToRoute('ecodopplercolorvenosomiembrosinferiores_show', array('id' => $ecoDopplerColorVenosoMiembrosInferiore->getId(),
                'idPaciente' => $paciente->getId(),
                'medico' => $medico,
                'paciente' => $paciente,
                'estudio' => $ecoDopplerColorVenosoMiembrosInferiore));
        }

        return $this->render('ecodopplercolorvenosomiembrosinferiores/new.html.twig', array(
            'estudio' => $ecoDopplerColorVenosoMiembrosInferiore,
            'paciente' => $paciente,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ecoDopplerColorVenosoMiembrosInferiore entity.
     *
     * @Route("/{id}/paciente/{idPaciente}", name="ecodopplercolorvenosomiembrosinferiores_show")
     * @Method("GET")
     */
    public function showAction(EcoDopplerColorVenosoMiembrosInferiores $ecoDopplerColorVenosoMiembrosInferiore, $idPaciente)
    {
        $deleteForm = $this->createDeleteForm($ecoDopplerColorVenosoMiembrosInferiore);
        $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($idPaciente);
        $user = $this->container->get('security.context')->getToken()->getUser();
        $medico = $this->getDoctrine()->getManager()->getRepository('AppBundle:Medico')->findOneByUsuario($user->getId());

        return $this->render('ecodopplercolorvenosomiembrosinferiores/show.html.twig', array(
            'estudio' => $ecoDopplerColorVenosoMiembrosInferiore,
            'paciente' => $paciente,
            'medico' => $medico,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ecoDopplerColorVenosoMiembrosInferiore entity.
     *
     * @Route("/{id}/edit/paciente/{idPaciente}", name="ecodopplercolorvenosomiembrosinferiores_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, EcoDopplerColorVenosoMiembrosInferiores $ecoDopplerColorVenosoMiembrosInferiore, $idPaciente)
    {
        $deleteForm = $this->createDeleteForm($ecoDopplerColorVenosoMiembrosInferiore);
        $editForm = $this->createForm('AppBundle\Form\EcoDopplerColorVenosoMiembrosInferioresType', $ecoDopplerColorVenosoMiembrosInferiore);
        $editForm->handleRequest($request);
        $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($idPaciente);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ecodopplercolorvenosomiembrosinferiores_edit', array('id' => $ecoDopplerColorVenosoMiembrosInferiore->getId(),
                'estudio' => $ecoDopplerColorVenosoMiembrosInferiore,
                'paciente' => $paciente,
                'idPaciente' => $paciente->getId()));
        }

        return $this->render('ecodopplercolorvenosomiembrosinferiores/edit.html.twig', array(
            'estudio' => $ecoDopplerColorVenosoMiembrosInferiore,
            'paciente' => $paciente,
            'idPaciente' => $paciente->getId(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ecoDopplerColorVenosoMiembrosInferiore entity.
     *
     * @Route("/{id}", name="ecodopplercolorvenosomiembrosinferiores_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, EcoDopplerColorVenosoMiembrosInferiores $ecoDopplerColorVenosoMiembrosInferiore)
    {
        $form = $this->createDeleteForm($ecoDopplerColorVenosoMiembrosInferiore);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ecoDopplerColorVenosoMiembrosInferiore);
            $em->flush();
        }

        return $this->redirectToRoute('ecodopplercolorvenosomiembrosinferiores_index');
    }

    /**
     * Creates a form to delete a ecoDopplerColorVenosoMiembrosInferiore entity.
     *
     * @param EcoDopplerColorVenosoMiembrosInferiores $ecoDopplerColorVenosoMiembrosInferiore The ecoDopplerColorVenosoMiembrosInferiore entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(EcoDopplerColorVenosoMiembrosInferiores $ecoDopplerColorVenosoMiembrosInferiore)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ecodopplercolorvenosomiembrosinferiores_delete', array('id' => $ecoDopplerColorVenosoMiembrosInferiore->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
