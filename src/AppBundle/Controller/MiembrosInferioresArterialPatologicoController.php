<?php

namespace AppBundle\Controller;

use AppBundle\Entity\MiembrosInferioresArterialPatologico;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use \Datetime;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\Response;
/**
 * Miembrosinferioresarterialpatologico controller.
 *
 * @Route("estudio/miembrosinferioresarterialpatologico")
 */
class MiembrosInferioresArterialPatologicoController extends Controller
{
    /**
     * Lists all miembrosInferioresArterialPatologico entities.
     *
     * @Route("/", name="miembrosinferioresarterialpatologico_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $miembrosInferioresArterialPatologicos = $em->getRepository('AppBundle:MiembrosInferioresArterialPatologico')->findAll();

        return $this->render('miembrosinferioresarterialpatologico/index.html.twig', array(
            'miembrosInferioresArterialPatologicos' => $miembrosInferioresArterialPatologicos,
        ));
    }

    /**
     * Creates a new miembrosInferioresArterialPatologico entity.
     *
     * @Route("/new/paciente/{id}", name="miembrosinferioresarterialpatologico_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, $id)
    {
            $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($id);
            $user = $this->container->get('security.context')->getToken()->getUser();
            $medico = $this->getDoctrine()->getManager()->getRepository('AppBundle:Medico')->findOneByUsuario($user->getId());

        $miembrosInferioresArterialPatologico = new Miembrosinferioresarterialpatologico($medico, $paciente,$this->getDoctrine()->getManager());
        $form = $this->createForm('AppBundle\Form\MiembrosInferioresArterialPatologicoType', $miembrosInferioresArterialPatologico);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($miembrosInferioresArterialPatologico);
            $em->flush();
            $this->addFlash('mensaje', 'Estudio creado correctamente');

            return $this->redirectToRoute('miembrosinferioresarterialpatologico_show', array('id' => $miembrosInferioresArterialPatologico->getId(),
          'idPaciente' => $paciente->getId(),
          'medico' => $medico,
          'paciente' => $paciente,
          'estudio' => $miembrosInferioresArterialPatologico));
        }

        return $this->render('miembrosinferioresarterialpatologico/new.html.twig', array(
            'estudio' => $miembrosInferioresArterialPatologico,
                        'paciente' => $paciente,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a miembrosInferioresArterialPatologico entity.
     *
     * @Route("/{id}/paciente/{idPaciente}",  name="miembrosinferioresarterialpatologico_show")
     * @Method("GET")
     */
    public function showAction(MiembrosInferioresArterialPatologico $miembrosInferioresArterialPatologico, $idPaciente)
    {
        $deleteForm = $this->createDeleteForm($miembrosInferioresArterialPatologico);
        $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($idPaciente);
        $user = $this->container->get('security.context')->getToken()->getUser();
        $medico = $this->getDoctrine()->getManager()->getRepository('AppBundle:Medico')->findOneByUsuario($user->getId());

        return $this->render('miembrosinferioresarterialpatologico/show.html.twig', array(
            'estudio' => $miembrosInferioresArterialPatologico,
            'paciente' => $paciente,
            'medico' => $medico,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing miembrosInferioresArterialPatologico entity.
     *
     * @Route("/{id}/edit/paciente/{idPaciente}", name="miembrosinferioresarterialpatologico_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, MiembrosInferioresArterialPatologico $miembrosInferioresArterialPatologico,  $idPaciente)
    {
        $deleteForm = $this->createDeleteForm($miembrosInferioresArterialPatologico);
        $editForm = $this->createForm('AppBundle\Form\MiembrosInferioresArterialPatologicoType', $miembrosInferioresArterialPatologico);
        $editForm->handleRequest($request);
        $paciente = $this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($idPaciente);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('mensaje', 'Estudio editado correctamente');

            return $this->redirectToRoute('miembrosinferioresarterialpatologico_edit', array('id' => $miembrosInferioresArterialPatologico->getId(),
            'estudio' => $miembrosInferioresArterialPatologico,
            'paciente' => $paciente,
            'idPaciente' => $paciente->getId()
          ));
        }

        return $this->render('miembrosinferioresarterialpatologico/edit.html.twig', array(
        'paciente' => $paciente,
        'idPaciente' => $paciente->getId(),
            'estudio' => $miembrosInferioresArterialPatologico,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a miembrosInferioresArterialPatologico entity.
     *
     * @Route("/{id}", name="miembrosinferioresarterialpatologico_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, MiembrosInferioresArterialPatologico $miembrosInferioresArterialPatologico)
    {
        $form = $this->createDeleteForm($miembrosInferioresArterialPatologico);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($miembrosInferioresArterialPatologico);
            $em->flush();
        }

        return $this->redirectToRoute('miembrosinferioresarterialpatologico_index');
    }

    /**
     * Creates a form to delete a miembrosInferioresArterialPatologico entity.
     *
     * @param MiembrosInferioresArterialPatologico $miembrosInferioresArterialPatologico The miembrosInferioresArterialPatologico entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(MiembrosInferioresArterialPatologico $miembrosInferioresArterialPatologico)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('miembrosinferioresarterialpatologico_delete', array('id' => $miembrosInferioresArterialPatologico->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
