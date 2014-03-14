<?php
namespace Pablo\AdjwebBundle\Entity;
use Doctrine\ORM\EntityRepository;
class AtributoRepository extends EntityRepository 
{
	public function listAtributosOpcion($opcionId)
	{
		return $this->getEntityManager()
		->createQuery('SELECT a FROM PabloAdjWebBundle:OpcionAtributo a ')
		//->setParameter('ModuloId', $moduloId)
		->getResult();
	}
	
	public function listAtributos()
	{
		return $this->getEntityManager()
		->createQuery('SELECT a FROM PabloAdjWebBundle:Atributo a ')
		//->setParameter('ModuloId', $moduloId)
		->getResult();
	}
}
