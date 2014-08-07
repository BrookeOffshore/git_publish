<?php

namespace Ly\PageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use JMS\SecurityExtraBundle\Annotation\PreAuthorize;
use Symfony\Component\HttpFoundation\Response;

/**
 * @PreAuthorize("hasRole('ROLE_OPERATION') or (hasRole('ROLE_CREW') or hasRole('ROLE_CLIENT'))")
 */

class gatewayController extends Controller
{
			
	/**
	 * @Route("/hrm/gateway", name="gateway_page")
     */
    public function indexAction(){
    	
		$securityContext = $this->container->get('security.context');
		
		if($securityContext->isGranted('ROLE_OPERATION')){
			
			return $this->redirect($this->generateUrl('main_page'));
		}
		
		elseif($securityContext->isGranted('ROLE_CREW')){
			
			return $this->redirect($this->generateUrl('crew_main_page'));
		}
		
		elseif($securityContext->isGranted('ROLE_CLIENT')){
			
			return $this->redirect($this->generateUrl('client_page'));
		}
			
    }
}
