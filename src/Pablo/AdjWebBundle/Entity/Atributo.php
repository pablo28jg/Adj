<?php
namespace Pablo\AdjWebBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Atributo")
 * @ORM\Entity(repositoryClass="Pablo\AdjWebBundle\Entity\AtributoRepository")
 */
class Atributo 
{
	
	/**
	 * @var integer $AtributoId
	 * @ORM\Id
	 * @ORM\Column(name="AtributoId", type="integer", nullable=false)
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;
	
	/**
	 * @var string $Nombre
	 * @ORM\Column(name="Nombre", type="string", length=100, nullable=false)
	 */
	private $Nombre;
	
	/**
	 * @var string $Descripcion
	 * @ORM\Column(name="Descripcion", type="string", length=200, nullable=false)
	 */
	private $Descripcion;
	

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
     * @return Atributo
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

    /**
     * Set Descripcion
     *
     * @param string $descripcion
     * @return Atributo
     */
    public function setDescripcion($descripcion)
    {
        $this->Descripcion = $descripcion;
    
        return $this;
    }

    /**
     * Get Descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->Descripcion;
    }
}