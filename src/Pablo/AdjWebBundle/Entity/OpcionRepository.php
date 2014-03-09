<?php
//src/Pablo/AdjWebBundle/Entity/OpcionRepository.php
namespace Pablo\AdjWebBundle\Entity;
use Doctrine\ORM\EntityRepository;
/**
 * @author pablo
 *
 */
class OpcionRepository extends EntityRepository
{
	public function listOpcionesModulo($moduloId)
	{
		return $this->getEntityManager()
			->createQuery('SELECT o FROM PabloAdjWebBundle:Opcion o WHERE o.ModuloId = :ModuloId ORDER BY o.Descripcion')
			->setParameter('ModuloId', $moduloId)
			->getResult();		
	}

}
