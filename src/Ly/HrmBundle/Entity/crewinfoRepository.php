<?php

namespace Ly\HrmBundle\Entity;

use Doctrine\ORM\EntityRepository;

class crewinfoRepository extends EntityRepository
{
	public function findAllBriefOrderedBySort($start, $sort, $keyword, $craft, $nationality, $vessel,$status){
		switch ($sort) {

			case 'contractno':		
				return $this->getEntityManager()
		            ->createQuery(
		                'SELECT
		                	p.id, 
		                	p.contractno,
		                	p.name,
		                	p.nationality,
		                	p.craft,
		                	p.status,
		                	p.company,
		                	p.vessel FROM LyHrmBundle:crewinfo p
		                	WHERE CONCAT(p.name, CONCAT(p.contractno, CONCAT(p.company, p.nationality))) LIKE :keyword 
		                	AND p.craft LIKE :craft 
		                	AND p.nationality LIKE :nationality 
		                	AND p.status LIKE :status 
		                	AND p.vessel LIKE :vessel
		                	ORDER BY p.contractno ASC'
		            )
					->setParameter('keyword', '%'.$keyword.'%')
					->setParameter('craft', '%'.$craft.'%')
					->setParameter('nationality', '%'.$nationality.'%')
					->setParameter('vessel', '%'.$vessel.'%')
					->setParameter('status', '%'.$status.'%')
					->setFirstResult($start)
					->setMaxResults(100)
		            ->getResult();				
				break;
			
			case 'name':		
				return $this->getEntityManager()
		            ->createQuery(
		                'SELECT
		                	p.id, 
		                	p.contractno,
		                	p.name,
		                	p.nationality,
		                	p.craft,
		                	p.status,
		                	p.company,
		                	p.vessel FROM LyHrmBundle:crewinfo p 
		                	WHERE CONCAT(p.name, CONCAT(p.contractno, CONCAT(p.company, p.nationality))) LIKE :keyword 
		                	AND p.craft LIKE :craft 
		                	AND p.nationality LIKE :nationality 
		                	AND p.status LIKE :status 
		                	AND p.vessel LIKE :vessel
		                	ORDER BY p.name ASC,p.contractno ASC'
		            )
					->setParameter('keyword', '%'.$keyword.'%')
					->setParameter('craft', '%'.$craft.'%')
					->setParameter('nationality', '%'.$nationality.'%')
					->setParameter('status', '%'.$status.'%')
					->setParameter('vessel', '%'.$vessel.'%')
					->setFirstResult($start)
					->setMaxResults(100)
		            ->getResult();			
				break;
			
			case 'nationality':		
				return $this->getEntityManager()
		            ->createQuery(
		                'SELECT
		                	p.id, 
		                	p.contractno,
		                	p.name,
		                	p.nationality,
		                	p.craft,
		                	p.status,
		                	p.company,
		                	p.vessel FROM LyHrmBundle:crewinfo p 
		                	WHERE CONCAT(p.name, CONCAT(p.contractno, CONCAT(p.company, p.nationality))) LIKE :keyword 
		                	AND p.craft LIKE :craft 
		                	AND p.nationality LIKE :nationality 
		                	AND p.status LIKE :status 
		                	AND p.vessel LIKE :vessel
		                	ORDER BY p.nationality ASC,p.contractno ASC'
		            )
					->setParameter('keyword', '%'.$keyword.'%')
					->setParameter('craft', '%'.$craft.'%')
					->setParameter('nationality', '%'.$nationality.'%')
					->setParameter('status', '%'.$status.'%')
					->setParameter('vessel', '%'.$vessel.'%')
					->setFirstResult($start)
					->setMaxResults(100)
		            ->getResult();				
				break;
			
			case 'craft':		
				return $this->getEntityManager()
		            ->createQuery(
		                'SELECT
		                	p.id, 
		                	p.contractno,
		                	p.name,
		                	p.nationality,
		                	p.craft,
		                	p.status,
		                	p.company,
		                	p.vessel FROM LyHrmBundle:crewinfo p 
		                	WHERE CONCAT(p.name, CONCAT(p.contractno, CONCAT(p.company, p.nationality))) LIKE :keyword 
		                	AND p.craft LIKE :craft 
		                	AND p.nationality LIKE :nationality 
		                	AND p.status LIKE :status 
		                	AND p.vessel LIKE :vessel
		                	ORDER BY p.craft ASC,p.contractno ASC'
		            )
					->setParameter('keyword', '%'.$keyword.'%')
					->setParameter('craft', '%'.$craft.'%')
					->setParameter('nationality', '%'.$nationality.'%')
					->setParameter('status', '%'.$status.'%')
					->setParameter('vessel', '%'.$vessel.'%')
					->setFirstResult($start)
					->setMaxResults(100)
		            ->getResult();				
				break;
				
			case 'company':		
				return $this->getEntityManager()
		            ->createQuery(
		                'SELECT
		                	p.id, 
		                	p.contractno,
		                	p.name,
		                	p.nationality,
		                	p.craft,
		                	p.status,
		                	p.company,
		                	p.vessel FROM LyHrmBundle:crewinfo p 
		                	WHERE CONCAT(p.name, CONCAT(p.contractno, CONCAT(p.company, p.nationality))) LIKE :keyword 
		                	AND p.craft LIKE :craft 
		                	AND p.nationality LIKE :nationality 
		                	AND p.status LIKE :status 
		                	AND p.vessel LIKE :vessel 
		                	ORDER BY p.company ASC, p.vessel ASC,p.contractno ASC'
		            )
					->setParameter('keyword', '%'.$keyword.'%')
					->setParameter('craft', '%'.$craft.'%')
					->setParameter('nationality', '%'.$nationality.'%')
					->setParameter('status', '%'.$status.'%')
					->setParameter('vessel', '%'.$vessel.'%')
					->setFirstResult($start)
					->setMaxResults(100)
		            ->getResult();			
				break;
			
			case 'vessel':		
				return $this->getEntityManager()
		            ->createQuery(
		                'SELECT
		                	p.id, 
		                	p.contractno,
		                	p.name,
		                	p.nationality,
		                	p.craft,
		                	p.status,
		                	p.company,
		                	p.vessel FROM LyHrmBundle:crewinfo p 
		                	WHERE CONCAT(p.name, CONCAT(p.contractno, CONCAT(p.company, p.nationality))) LIKE :keyword 
		                	AND p.craft LIKE :craft 
		                	AND p.nationality LIKE :nationality 
		                	AND p.status LIKE :status 
		                	AND p.vessel LIKE :vessel 
		                	ORDER BY p.vessel ASC, p.company ASC,p.contractno ASC'
		            )
					->setParameter('keyword', '%'.$keyword.'%')
					->setParameter('craft', '%'.$craft.'%')
					->setParameter('nationality', '%'.$nationality.'%')
					->setParameter('status', '%'.$status.'%')
					->setParameter('vessel', '%'.$vessel.'%')
					->setFirstResult($start)
					->setMaxResults(100)
		            ->getResult();				
				break;	
				
			case 'status':		
				return $this->getEntityManager()
		            ->createQuery(
		                'SELECT
		                	p.id, 
		                	p.contractno,
		                	p.name,
		                	p.nationality,
		                	p.craft,
		                	p.status,
		                	p.company,
		                	p.vessel FROM LyHrmBundle:crewinfo p 
		                	WHERE CONCAT(p.name, CONCAT(p.contractno, CONCAT(p.company, p.nationality))) LIKE :keyword 
		                	AND p.craft LIKE :craft 
		                	AND p.nationality LIKE :nationality 
		                	AND p.status LIKE :status 
		                	AND p.vessel LIKE :vessel 
		                	ORDER BY p.status ASC,p.contractno ASC'
		            )
					->setParameter('keyword', '%'.$keyword.'%')
					->setParameter('craft', '%'.$craft.'%')
					->setParameter('nationality', '%'.$nationality.'%')
					->setParameter('status', '%'.$status.'%')
					->setParameter('vessel', '%'.$vessel.'%')
					->setFirstResult($start)
					->setMaxResults(100)
		            ->getResult();				
				break;
			
			default:				
				return $this->getEntityManager()
		            ->createQuery(
		                'SELECT
		                	p.id, 
		                	p.contractno,
		                	p.name,
		                	p.nationality,
		                	p.craft,
		                	p.status,
		                	p.company,
		                	p.vessel FROM LyHrmBundle:crewinfo p 
		                	WHERE CONCAT(p.name, CONCAT(p.contractno, CONCAT(p.company, p.nationality))) LIKE :keyword 
		                	AND p.craft LIKE :craft 
		                	AND p.nationality LIKE :nationality 
		                	AND p.status LIKE :status 
		                	AND p.vessel LIKE :vessel 
		                	ORDER BY p.contractno ASC'
		            )
					->setParameter('keyword', '%'.$keyword.'%')
					->setParameter('craft', '%'.$craft.'%')
					->setParameter('nationality', '%'.$nationality.'%')
					->setParameter('status', '%'.$status.'%')
					->setParameter('vessel', '%'.$vessel.'%')
					->setFirstResult($start)
					->setMaxResults(100)
		            ->getResult();									
				break;				
		}
	}
	
    public function findAllBriefOrderedByKeyword($keyword){
    	return $this->getEntityManager()
		            ->createQuery(
		                'SELECT
		                	p.id, 
		                	p.contractno,
		                	p.name,
		                	p.nationality,
		                	p.craft,
		                	p.status,
		                	p.company,
		                	p.vessel FROM LyHrmBundle:crewinfo p
		                	WHERE CONCAT(p.name, CONCAT(p.contractno, CONCAT(p.company, p.nationality))) LIKE :keyword 
		                	ORDER BY p.contractno ASC'
		            )
					->setParameter('keyword', '%'.$keyword.'%')
		            ->getResult();
    }
	
	public function countAllCrew($keyword, $craft, $nationality, $vessel,$status)
	{
		return $this->getEntityManager()
            ->createQuery(
                'SELECT COUNT(p) FROM LyHrmBundle:crewinfo p WHERE CONCAT(p.name, CONCAT(p.contractno, CONCAT(p.company, p.nationality))) LIKE :keyword 
                AND p.craft LIKE :craft 
            	AND p.nationality LIKE :nationality 
            	AND p.status LIKE :status 
            	AND p.vessel LIKE :vessel'
                
            )
			->setParameter('keyword', '%'.$keyword.'%')
			->setParameter('craft', '%'.$craft.'%')
			->setParameter('nationality', '%'.$nationality.'%')
			->setParameter('status', '%'.$status.'%')
			->setParameter('vessel', '%'.$vessel.'%')
            ->getResult();
	}
}