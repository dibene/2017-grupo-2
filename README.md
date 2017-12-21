SEGC
====

A Symfony project created on December 3, 2017, 5:01 pm.

// comandos
php app/console server:run
php app/console doctrine:schema:update --force
php app/console generate:doctrine:crud AppBundle:nombre_de_la_entidad


// consideraciones
falta agregar medico cuando se guarde por fos user
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

BASICOS -> SOLO TIENEN LOS SIGUIENTES ATRIBUTOS: PACIENTE (ID) - FECHA_ALTA (SYSDATE) - OBSERVACIÓN (STRING) - DIAGNOSTICO_FINAL (STRING)
-Aorta Abdominal Ateromatosa  ->
-Aorta Abdominal.
-Eco Doppler Color Arterial de Miembros Superiores. (base)
-Eco Doppler Color de Miembro Inferior Derecho.
-Eco Doppler Color de Arterias Renales.
-Eco Doppler Color Venoso de Miembros Superiores.
-EcoCardiograma con Inyección de Solución Salina Agitada.
-EcoCardiograma Transesofágico.
-Eco Doppler Color Arterial de Miembro Inferior Derecho.
-Eco Doppler Color Arterial de Miembro Inferior Izquierdo.
-Endarterectomia.


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
