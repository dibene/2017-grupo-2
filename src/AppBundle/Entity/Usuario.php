<?php
// src/AppBundle/Entity/Usuario.php
namespace AppBundle\Entity;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\EquatableInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
* @ORM\Entity
* @ORM\Table(name="usuario")
*/

class Usuario extends BaseUser implements EquatableInterface{
  /**
  * @ORM\Id
  * @ORM\Column(type="integer")
  * @ORM\GeneratedValue(strategy="AUTO")
  */
  protected $id;


  /* Es posible agregar más atributos además de los que vienen en BaseUser */
  public function __construct(){
    parent::__construct();
    // your own logic\
    //$this->roles = array('ROLE_MEDICO');
  }

  /**
 * Agrega un rol al usuario.
 * @throws Exception
 * @param Rol $rol
 */
public function addRole( $rol )
{
    if($rol == 1) {
    array_push($this->roles, 'ROLE_ADMIN');
    }
    else if($rol == 2) {
    array_push($this->roles, 'ROLE_MEDICO');
    }
}

// recarga el usuario cuando se agrega un rol
public function isEqualTo(UserInterface $user)
{
   if ($user instanceof User) {
       // Check that the roles are the same, in any order
       $isEqual = count($this->getRoles()) == count($user->getRoles());
       if ($isEqual) {
           foreach($this->getRoles() as $role) {
               $isEqual = $isEqual && in_array($role, $user->getRoles());
           }
       }
       return $isEqual;
   }

    return false;
}

}
