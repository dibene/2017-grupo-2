<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Telefono
 *
 * @ORM\Table(name="telefono")
 * @ORM\Entity
 */
class Telefono
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_persona", type="integer", nullable=false)
     */
    private $idPersona;

    /**
     * @var string
     *
     * @ORM\Column(name="numero", type="string", length=15, nullable=false)
     */
    private $numero;


}
