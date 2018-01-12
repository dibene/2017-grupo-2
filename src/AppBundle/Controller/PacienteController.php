<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Paciente;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use  Doctrine \ ORM \ Tools \ Pagination \ Paginator ;
/**
 * Paciente controller.
 *
 * @Route("paciente")
 */
class PacienteController extends Controller
{
    /**
     * Lists all paciente entities.
     *
     * @Route("/", name="paciente_index")
     * @Method({"GET", "POST"})
     */
    public function indexAction(Request $request)
    {
      $em = $this->getDoctrine()->getManager();
      //$pacientes = $em->getRepository('AppBundle:Paciente')->findAll();

       $form = $this->createFormBuilder()
        ->add('nombre', SearchType::class , array('required'   => false))
        ->add('apellido', SearchType::class , array('required'   => false))
        ->add('dni', SearchType::class , array('required'   => false))
        ->add('buscar', SubmitType::class ,  array( 'attr' => array('class' => 'btn waves-effect waves-light red' , 'style' => 'margin-top:40px;') ) )
        ->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
          $nombre = $form->get('nombre')->getData();
          $apellido = $form->get('apellido')->getData();
          $dni = $form->get('dni')->getData();
          $criterios = array();
          if($nombre!=null || $apellido != null || $dni!=null ){
            if($nombre != null){
              $criterios['nombre'] = $nombre;
            }
            if($apellido != null){
              $criterios['apellido'] = $apellido;
            }
            if($dni != null){
              $criterios['dni'] = $dni;
            }
            $pacientes = $em->getRepository('AppBundle:Paciente')->findBy($criterios);

          }else {
            $pacientes = array();
          }
        }else{//Primera vez que entra
            $pacientes = $em->getRepository('AppBundle:Paciente')->findForPaginator();
        }

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $pacientes, $request->query->getInt('page', 1),
            5 );


        return $this->render('paciente/index.html.twig', array(
            'pagination' => $pagination,
            'form' => $form->createView()
        ));
    }

    /**
     * Creates a new paciente entity.
     *
     * @Route("/new", name="paciente_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $paciente = new Paciente();
        $form = $this->createForm('AppBundle\Form\PacienteType', $paciente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($paciente);
            $em->flush();

            $this->addFlash('mensaje', 'El Paciente Ha Sido Creado Exitosamente');

            return $this->redirectToRoute('paciente_show', array('id' => $paciente->getId()));
        }

        return $this->render('paciente/new.html.twig', array(
            'paciente' => $paciente,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a paciente entity.
     *
     * @Route("/{id}", name="paciente_show")
     * @Method("GET")
     */
    public function showAction(Paciente $paciente)
    {
        $deleteForm = $this->createDeleteForm($paciente);

        return $this->render('paciente/show.html.twig', array(
            'paciente' => $paciente,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing paciente entity.
     *
     * @Route("/{id}/edit", name="paciente_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Paciente $paciente)
    {
        $deleteForm = $this->createDeleteForm($paciente);
        $editForm = $this->createForm('AppBundle\Form\PacienteType', $paciente);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('mensaje', 'Paciente editado correctamente');

            return $this->redirectToRoute('paciente_edit', array('id' => $paciente->getId()));
        }

        return $this->render('paciente/edit.html.twig', array(
            'paciente' => $paciente,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a paciente entity.
     *
     * @Route("/{id}", name="paciente_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Paciente $paciente)
    {
        $form = $this->createDeleteForm($paciente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($paciente);
            $em->flush();
        }

        return $this->redirectToRoute('paciente_index');
    }

    /**
     * Creates a form to delete a paciente entity.
     *
     * @param Paciente $paciente The paciente entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Paciente $paciente)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('paciente_delete', array('id' => $paciente->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
