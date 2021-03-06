<?php
//src/Pablo/AdjWebBundle/Entity/Opcion.php
namespace Pablo\AdjWebBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Opcion")
 * @ORM\Entity(repositoryClass="Pablo\AdjWebBundle\Entity\OpcionRepository")
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
	 * @var ModuloId
	 *
	 * @ORM\ManyToOne(targetEntity="Modulo")
	 * @ORM\JoinColumns({
	 *   @ORM\JoinColumn(name="ModuloId", referencedColumnName="ModuloId")
	 * })
	 */
	private $ModuloId;
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
	 * @var string $Src
	 * @ORM\Column(name="Src", type="string", length=300, nullable=false)
	 */
	private $Src;

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

    /**
     * Set Descripcion
     *
     * @param string $descripcion
     * @return Opcion
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
     * @return Opcion
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
     * Set moduloId
     *
     * @param \Pablo\AdjWebBundle\Entity\Modulo $moduloId
     * @return Opcion
     */
    public function setModuloId(\Pablo\AdjWebBundle\Entity\Modulo $moduloId = null)
    {
        $this->ModuloId = $moduloId;
    
        return $this;
    }

    /**
     * Get moduloId
     *
     * @return \Pablo\AdjWebBundle\Entity\Modulo 
     */
    public function getModuloId()
    {
        return $this->ModuloId;
    }
}