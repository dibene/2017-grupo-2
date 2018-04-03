SEGC
====

A Symfony project created on December 3, 2017, 5:01 pm.

// comandos
php app/console doctrine:database:drop --force				 					  //borrar la base
php app/console database:create                                                 //crear la base
php app/console server:run														  //ejecutar siempre antes y despues de los update para que corra la base
php app/console doctrine:schema:update --force									  //update para traer los cambios de la base de datos global
php app/console generate:doctrine:crud AppBundle:nombre_de_la_entidad             //creacion de cruds una vez creadas las entidades
php app/console doctrine:generate:entities AppBundle:Ecocardiograma2d             //creacion de getters and setters de una entidad
cargar fixtures
php app/console doctrine:fixtures:load




//clonacion de proyecto
git clone https://github.com/unlp-taller-tecnologias/2017-grupo-2
