<?php
//src/Pablo/AdjWebBundle/Entity/ModuloRepository.php
namespace Pablo\AdjWebBundle\Entity;
use Doctrine\ORM\EntityRepository;
class ModuloRepository extends EntityRepository
{
	public function listModulosUsuario($usuarioId)
	{		
		return $this->getEntityManager()
			->createQuery('SELECT m FROM PabloAdjWebBundle:Modulo m ORDER BY m.Descripcion ASC')
			->getResult();
	}

}
