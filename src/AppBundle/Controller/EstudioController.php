<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Estudio;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;


/**
 * Estudio controller.
 *
 * @Route("estudio")
 */
class EstudioController extends Controller
{
    /**
     * Lists all estudio entities.
     *
     *  @Route("/paciente/{id}", name="estudio_index")
     * @Method("GET")
     */
    public function indexAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $paciente = $em->getRepository('AppBundle:Paciente')->find($id);

        $nombreEstudios = $em->getRepository('AppBundle:EstudioConfiguracion')->findAll();

        return $this->render('estudio/index.html.twig', array(
            'paciente' => $paciente,
            'nombreEstudios' => $nombreEstudios
        ));
    }
    /**
     * Lists all estudios realizados entities.
     *
     *  @Route("/realizados", name="estudio_realizados")
     * @Method("GET")
     */
    public function realizadosAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.context')->getToken()->getUser();
        $medico = $this->getDoctrine()->getManager()->getRepository('AppBundle:Medico')->findOneByUsuario($user->getId());

        $nombreEstudios = $em->getRepository('AppBundle:EstudioConfiguracion')->findAll();

        return $this->render('estudio/realizados.html.twig', array(
            'medico' => $medico,
            'nombreEstudios' => $nombreEstudios
        ));
    }

    /**
     * Creates a new estudio entity.
     *
     * @Route("/new", name="estudio_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $estudio = new Estudio();
        $estudio.setFechaAlta(date("Y-m-d"));
        $paciente=$this->getDoctrine()->getManager()->getRepository('AppBundle:Paciente')->find($id);
        $estudio.setPaciente($paciente);
        //$medico=$this->getDoctrine()->getManager()->getRepository('AppBundle:Medico')->find();
        //$estudio.setMedico($medico);
        $form = $this->createForm('AppBundle\Form\EstudioType', $estudio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($estudio);
            $em->flush();

            return $this->redirectToRoute('estudio_show', array('id' => $estudio->getId()));
        }

        return $this->render('estudio/new.html.twig', array(
            'estudio' => $estudio,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a estudio entity.
     *
     * @Route("/{id}", name="estudio_show")
     * @Method("GET")
     */
    public function showAction(Estudio $estudio)
    {
        $deleteForm = $this->createDeleteForm($estudio);

        return $this->render('estudio/show.html.twig', array(
            'estudio' => $estudio,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing estudio entity.
     *
     * @Route("/{id}/edit", name="estudio_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Estudio $estudio)
    {
        $deleteForm = $this->createDeleteForm($estudio);
        $editForm = $this->createForm('AppBundle\Form\EstudioType', $estudio);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('estudio_edit', array('id' => $estudio->getId()));
        }

        return $this->render('estudio/edit.html.twig', array(
            'estudio' => $estudio,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a estudio entity.
     *
     * @Route("/{id}", name="estudio_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Estudio $estudio)
    {
        $form = $this->createDeleteForm($estudio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($estudio);
            $em->flush();
        }

        return $this->redirectToRoute('estudio_index');
    }

    /**
     * Creates a form to delete a estudio entity.
     *
     * @param Estudio $estudio The estudio entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Estudio $estudio)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('estudio_delete', array('id' => $estudio->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
