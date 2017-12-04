<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Medico
 *
 * @ORM\Table(name="medico")
 * @ORM\Entity
 */
class Medico
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
     * @var integer
     *
     * @ORM\Column(name="id_especialidad", type="integer", nullable=false)
     */
    private $idEspecialidad;

    /**
     * @var string
     *
     * @ORM\Column(name="obra_social", type="string", length=15, nullable=false)
     */
    private $obraSocial;

    /**
     * @var integer
     *
     * @ORM\Column(name="matricula", type="integer", nullable=false)
     */
    private $matricula;


}
