SEGC
====

A Symfony project created on December 3, 2017, 5:01 pm.

//prueba
$em = $this->getDoctrine()->getManager();
$medico->setEspecialidad ($em->getRepository('AppBundle:Especialidad')->find(1));
$medico->setUsuario( $em->getRepository('AppBundle:Usuario')->find(1));

public function buildForm(FormBuilderInterface $builder, array $options)
{
    $builder->add('obraSocial')->add('matricula')->add('nombre')->add('apellido')->add('dni')->add('direccion')->add('sexo')->add('nacionalidad')
    ->add('fechaNacimiento', DateType::class , array('widget' => 'single_text','attr' => array('class'=>'datepicker')))->add('localidad');
}
