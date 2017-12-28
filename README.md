SEGC
====

A Symfony project created on December 3, 2017, 5:01 pm.

// comandos
php app/console doctrine:database:drop --force				 					  //borrar la base
php app/console database:created                                                  //crear la base
php app/console server:run														  //ejecutar siempre antes y despues de los update para que corra la base
php app/console doctrine:schema:update --force									  //update para traer los cambios de la base de datos global
php app/console generate:doctrine:crud AppBundle:nombre_de_la_entidad             //creacion de cruds una vez creadas las entidades
php app/console doctrine:generate:entities AppBundle:Ecocardiograma2d             //creacion de getters and setters de una entidad
cargar fixtures
php app/console doctrine:fixtures:load

// consideraciones
X falta agregar medico cuando se guarde por fos user
cuando se registra un usuario no tiene rol, no puede ver nada mas q agregar los datos del medico
al agregar los datos del medico se le asigna rol medico y puede tener las opciones,
si sale del sistema y vuelve a entrar solo tiene la posibilidad de entrar a su perfil para cargar los datos personales de medico. HECHO
- TODO arreglar el sexo como lo hiceron con pacientes

//pacientes
medico cabecera  -> string
20/12 21:22 modificar -> donde dice agregar estudio, hay q ver si con ese link muestra los estudios a agregar y los estudios q se hizo el paciente o solo los estudios a agregar entonces hay q agregar otro link q diga estudios echos,
o mostrar un link de estudios hechos y dnetro de ese tener la posibilidad de agregarle como es ahora
aparte seprar como en paciente con botones etc

//en general
achicarle los titulos

//clonacion de proyecto
git clone https://github.com/unlp-taller-tecnologias/2017-grupo-2


//ESTUDIOS
- TODO seguridad poner todos los estudios en /estudio/nombre del estudio asi se puede restringir el /estudio
BASICOS -> SOLO TIENEN LOS SIGUIENTES ATRIBUTOS: PACIENTE (ID) - FECHA_ALTA (SYSDATE) - OBSERVACIÓN (STRING) - DIAGNOSTICO_FINAL (STRING)
Aorta Abdominal Ateromatosa  ->
Aorta Abdominal.
Eco Doppler Color Arterial de Miembros Superiores. (base)    -Eco_Dopp_Color_Art_Miem_Sup
Eco Doppler Color de Miembro Inferior Derecho.			      -Eco_Dopp_Color_Miem_Inf_Der
Eco Doppler Color de Arterias Renales.						  -Eco_Doppler_Color_Art_Renales
Eco Doppler Color Venoso de Miembros Superiores.             -Eco_Doppler_Color_Ven_Miem_Sup
EcoCardiograma con Inyección de Solución Salina Agitada.     -EcoCardiograma_Iny_Sol_Sal_Agit.
EcoCardiograma Transesofágico.								  -EcoCardiograma_Transesofágico
Eco Doppler Color Arterial de Miembro Inferior Derecho.      -Eco_Doppler_Color_Art_Miem_Inf_Der
Eco Doppler Color Arterial de Miembro Inferior Izquierdo.    -Eco_Doppler_Color_Art_Miem_Inf_Izq
Endarterectomia.


//DATOS DE TABLAS DE REFERENCIA

MOTIVOS DE SOLICITUD

                   ( que sea un desplegable para seleccionar uno)                     

                        Control
                        Factores de riesgo CV
                        Cardiopatía isquémica
                        Insuficiencia cardiaca
                        Cardiopatías congénitas
                        Endocarditis infecciosa
                        Arritmia
                        Enfermedad de Chagas
                        Hipertensión pulmonar
                        Tratamiento oncológico
                        Insuficiencia renal
                        Enfermedades autoinmunes
                        Enfermedades respiratorias
                        Accidente Cerebro vascular
                        Sindrome febril prolongado
                        Enfermedad vascular periférica
                        FOP
                        Otros (que se puedan ir incorporando)
