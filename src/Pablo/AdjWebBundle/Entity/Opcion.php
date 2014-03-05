<?php
//src/Pablo/AdjWebBundle/Entity/Opcion.php
namespace Pablo\AdjWebBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Opcion")
 */
class Opcion {
	/**
	 * @var integer $OpcionId
	 * @ORM\Id
	 * @ORM\Column(name="OpcionId", type="integer", nullable=false)
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;
	/**
	 * @var string $Nombre
	 * @ORM\Column(name="Nombre", type="string", length=100, nullable=false)
	 */
	private $Nombre;
	
	

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set Nombre
     *
     * @param string $nombre
     * @return Opcion
     */
    public function setNombre($nombre)
    {
        $this->Nombre = $nombre;
    
        return $this;
    }

    /**
     * Get Nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->Nombre;
    }
}