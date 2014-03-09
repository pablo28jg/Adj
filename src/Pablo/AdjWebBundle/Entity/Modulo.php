<?php
//src/Pablo/AdjWebBundle/Entity/Modulo.php
namespace Pablo\AdjWebBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="Modulo")
 * @ORM\Entity(repositoryClass="Pablo\AdjWebBundle\Entity\ModuloRepository")
 */
class Modulo {
	public function __construct()
	{
		$this->Opciones = new ArrayCollection();
	}
	public function __toString()
	{
		return $this->Nombre;
	}
	/**
	 * @var integer $ModuloId
	 * @ORM\Id
	 * @ORM\Column(name="ModuloId", type="integer", nullable=false)
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
	 * @ORM\Column(name="Descripcion", type="string", length=500, nullable=false)
	 */
	private $Descripcion;
	/**
	 * @var string $Src
	 * @ORM\Column(name="Src", type="string", length=200, nullable=false)
	 */
	private $Src;
	
	/**
	 * @ORM\OneToMany(targetEntity="Opcion", mappedBy="ModuloId")
	 */
	protected $Opciones;

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
     * @return Modulo
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
     * @return Modulo
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

    /**
     * Set Src
     *
     * @param string $src
     * @return Modulo
     */
    public function setSrc($src)
    {
        $this->Src = $src;
    
        return $this;
    }

    /**
     * Get Src
     *
     * @return string 
     */
    public function getSrc()
    {
        return $this->Src;
    }

    /**
     * Add Opciones
     *
     * @param \Pablo\AdjWebBundle\Entity\Opcion $opciones
     * @return Modulo
     */
    public function addOpcione(\Pablo\AdjWebBundle\Entity\Opcion $opciones)
    {
        $this->Opciones[] = $opciones;
    
        return $this;
    }

    /**
     * Remove Opciones
     *
     * @param \Pablo\AdjWebBundle\Entity\Opcion $opciones
     */
    public function removeOpcione(\Pablo\AdjWebBundle\Entity\Opcion $opciones)
    {
        $this->Opciones->removeElement($opciones);
    }

    /**
     * Get Opciones
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOpciones()
    {
        return $this->Opciones;
    }
}