<?php
namespace Pablo\AdjwebBundle\Entity;
use Doctrine\ORM\EntityRepository;
class AtributoRepository extends EntityRepository 
{
	public function listAtributosOpcion($opcionId)
	{
		return $this->getEntityManager()
		->createQuery('SELECT a FROM PabloAdjWebBundle:Atributo a ORDER BY a.Descripcion')
		//->setParameter('ModuloId', $moduloId)
		->getResult();
	}
}
