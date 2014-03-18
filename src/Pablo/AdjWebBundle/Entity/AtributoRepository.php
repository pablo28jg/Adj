<?php
namespace Pablo\AdjwebBundle\Entity;
use Doctrine\ORM\EntityRepository;
class AtributoRepository extends EntityRepository 
{
	public function listAtributosOpcion($opcionId)
	{
		return $this->getEntityManager()
		->createQuery('SELECT oa FROM PabloAdjWebBundle:OpcionAtributo oa
				JOIN oa.AtributoId a WHERE a.Nombre = \'create\'')
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
	
	public function findAtributo($atributo, $opcionId)
	{
		return $this->getEntityManager()
		->createQuery('SELECT o.id as OpcionId,a.Nombre, oa.Src, a.id as AtributoId FROM PabloAdjWebBundle:OpcionAtributo oa 
				INNER JOIN oa.OpcionId o
				INNER JOIN oa.AtributoId a
				WHERE o.id = :OpcionId AND a.Nombre = :Atributo')
		->setParameter('Atributo', $atributo)
		->setParameter('OpcionId', $opcionId)
		->getResult();
	}
}
