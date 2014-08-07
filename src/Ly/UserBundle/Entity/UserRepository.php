<?php

namespace Ly\UserBundle\Entity;

use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{
	public function findBetaCrew($role) {
		
		return $this->getEntityManager()
            ->createQuery(
                'SELECT 
                p.id,
                p.firstname,
                p.lastname,
                p.email,
                p.betacrewid,
                p.craft,
                p.lastLogin,
                p.contactno,
                p.nationality               		
				FROM LyUserBundle:User p WHERE p.roles LIKE :role'
                
            )
			->setParameter('role', '%'.$role.'%')
            ->getResult();
	}
}