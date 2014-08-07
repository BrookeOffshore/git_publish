<?php

namespace Ly\HrmBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Collections\ArrayCollection; 

use Ly\HrmBundle\Entity\betacrewinfo;
use Ly\HrmBundle\Entity\betaexperience;



use Ly\HrmBundle\Form\betacrewinfoType;

use JMS\SecurityExtraBundle\Annotation\PreAuthorize;

/**
 * @PreAuthorize("hasRole('ROLE_CREW')")
 */

class CrewController extends Controller
{
	/**
	 * @Route("/crew", name="crew_main_page")
	 * @Template()
	 */
	public function indexAction(){
		
		$user = $this->container->get('security.context')->getToken()->getUser();
		
		if($user->getBetacrewid()!=0){
			
			$em = $this->getDoctrine()->getManager();

			$betacrew = $em->getRepository('LyHrmBundle:betacrewinfo')->find($user->getBetacrewid());
		}
		else {
			$betacrew = null;
		}

		return $this->render('LyHrmBundle:Crew:index.html.twig',
			array(
				'user' => $user,
				'betacrew' => $betacrew,
			)
		);
	}
	
   /**
    * @Route("/crew/edit", name="crew_edit_page")
    * @Template()
    */
    public function editAction(Request $request){
    	
        $user = $this->container->get('security.context')->getToken()->getUser();
		
		if($user->getBetacrewid()!=0){
			
			$em = $this->getDoctrine()->getManager();

			$betacrew = $em->getRepository('LyHrmBundle:betacrewinfo')->find($user->getBetacrewid());
			
			$form = $this->createForm(new betacrewinfoType(), $betacrew);
		}
		else{
			
			$em = $this->getDoctrine()->getManager();
			
			$betacrew = new betacrewinfo();
			
			$name = $user->getFirstname().' '.$user->getLastname();
			
			$betacrew->setName($name);
			
			$betacrew->setNationality($user->getNationality());
			
			$betacrew->setContactno($user->getContactno());
			
			$betacrew->setCraft($user->getCraft());
			
			$betacrew->setEmail($user->getEmail());
			
			$form = $this->createForm(new betacrewinfoType(), $betacrew);
						
			$em->persist($user);			
		}
		
		$form->handleRequest($request);	
		
		if ($form->isValid()) {
									
			$em->persist($betacrew);			
			
			$em->flush();
			
			$user->setBetacrewid($betacrew->getId());
			
			$em->persist($user);
			
			$em->flush();
			
			return $this->redirect($this->generateUrl('crew_main_page'));
	 	}
		
		return array(
			'user' => $user,
			'form' => $form->createView(),
		);
    }
	 
	
	
   /**
	 * Top bar user name show
	 */
	 
	public function topbarusernameAction()
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        
        return $this->render('LyHrmBundle:Crew:topbarusername.html.twig',
            array(
				'user' => $user
			));
     }
	
}
