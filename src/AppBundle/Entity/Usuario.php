<?php
// src/AppBundle/Entity/Usuario.php
namespace AppBundle\Entity;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="usuario")
*/

class Usuario extends BaseUser{
  /**
  * @ORM\Id
  * @ORM\Column(type="integer")
  * @ORM\GeneratedValue(strategy="AUTO")
  */
  protected $id;
  /* Es posible agregar más atributos además de los que vienen en BaseUser */
  public function __construct(){
    parent::__construct();
    // your own logic
  }

}
