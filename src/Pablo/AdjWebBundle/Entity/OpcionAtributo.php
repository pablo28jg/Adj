<?php
namespace Pablo\AdjWebBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="OpcionAtributo")
 */
class OpcionAtributo 
{
	
	/**
	 * @var integer $OpcionAtributoId
	 * @ORM\Id
	 * @ORM\Column(name="OpcionAtributoId", type="integer", nullable=false)
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;
	
	/**
	 * @var OpcionId
	 *
	 * @ORM\ManyToOne(targetEntity="Opcion")
	 * @ORM\JoinColumns({
	 *   @ORM\JoinColumn(name="OpcionId", referencedColumnName="OpcionId")
	 * })
	 */
	private $OpcionId;
	
	/**
	 * @var AtributoId
	 *
	 * @ORM\ManyToOne(targetEntity="Atributo")
	 * @ORM\JoinColumns({
	 *   @ORM\JoinColumn(name="AtributoId", referencedColumnName="AtributoId")
	 * })
	 */
	private $AtributoId;
	
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
     * Set OpcionId
     *
     * @param \Pablo\AdjWebBundle\Entity\Opcion $opcionId
     * @return OpcionAtributo
     */
    public function setOpcionId(\Pablo\AdjWebBundle\Entity\Opcion $opcionId = null)
    {
        $this->OpcionId = $opcionId;
    
        return $this;
    }

    /**
     * Get OpcionId
     *
     * @return \Pablo\AdjWebBundle\Entity\Opcion 
     */
    public function getOpcionId()
    {
        return $this->OpcionId;
    }

    /**
     * Set AtributoId
     *
     * @param \Pablo\AdjWebBundle\Entity\Atributo $atributoId
     * @return OpcionAtributo
     */
    public function setAtributoId(\Pablo\AdjWebBundle\Entity\Atributo $atributoId = null)
    {
        $this->AtributoId = $atributoId;
    
        return $this;
    }

    /**
     * Get AtributoId
     *
     * @return \Pablo\AdjWebBundle\Entity\Atributo 
     */
    public function getAtributoId()
    {
        return $this->AtributoId;
    }

    /**
     * Set Src
     *
     * @param string $src
     * @return OpcionAtributo
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
}