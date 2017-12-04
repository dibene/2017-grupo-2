<?php
// src/AppBundle/Entity/Usuario.php
namespace AppBundle\Entity;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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

  /**
 * @ORM\Column(type="string", length=255)
 *
 * @Assert\NotBlank(message="Please enter your name.", groups={"Registration", "Profile"})
 * @Assert\Length(
 *     min=3,
 *     max=255,
 *     minMessage="The name is too short.",
 *     maxMessage="The name is too long.",
 *     groups={"Registration", "Profile"}
 * )
 */
protected $name;

  /* Es posible agregar más atributos además de los que vienen en BaseUser */
  public function __construct(){
    parent::__construct();
    // your own logic
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

  public function getName(){
return $this->name;
  }

  public function setName($arg){
       $this->name=$arg;
  }

}
