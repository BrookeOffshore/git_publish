<?php

namespace Ly\HrmBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Collections\ArrayCollection; 
use Ly\HrmBundle\Entity\crewinfo;
use Ly\HrmBundle\Entity\experience;
use Ly\HrmBundle\Entity\mobgroup;
use Ly\HrmBundle\Entity\mobrecord;
use Ly\HrmBundle\Entity\search;
use Ly\HrmBundle\Entity\vessel;
use Ly\HrmBundle\Entity\ticker;
use Ly\HrmBundle\Form\crewinfoType;
use Ly\HrmBundle\Form\experienceType;
use Ly\HrmBundle\Form\mobgrouptorecordType;
use Ly\HrmBundle\Form\mobgroupType;
use Ly\HrmBundle\Form\companyType;
use Ly\HrmBundle\Form\crewinfoexperienceType;
use Ly\HrmBundle\Form\searchType;

use Ly\UserBundle\Entity\User;

use Symfony\Component\HttpFoundation\File\UploadedFile;

use JMS\SecurityExtraBundle\Annotation\PreAuthorize;

/**
 * @Route("/hrm")
 * @PreAuthorize("hasRole('ROLE_OPERATION')")
 */

class OperationController extends Controller
{
    /**
	 * @Route("/", name="main_page")
     * @Template()	 
     */
    public function indexAction(Request $request)
    {
  	
		$search = new search();
		//exit(\Doctrine\Common\Util\Debug::dump($search));
		
		$body = $this->getDoctrine()->getRepository('LyHrmBundle:ticker')->find(1);
		
		$vessel = $this->getDoctrine()->getRepository('LyHrmBundle:vessel')->findAll();
		
		$vessel_choice_array = array();
		
		$vessel_choice_array[''] = "Choose a Vessel";
		
		foreach ($vessel as $vessel) {
			
			$temp = explode("\r\n", $vessel->getVessel());
			
			$vessel_array = array();
			
			foreach ($temp as $value) {
				
				$vessel_array[$value] = $value;
			}
			
			$vessel_choice_array[$vessel->getCompany()] = $vessel_array;
		}		
				
        $form = $this->createForm(new searchType($vessel_choice_array), $search);

        $form->handleRequest($request);		
		
	 	if ($form->isValid()) {
			
			$session = $this->getRequest()->getSession();
			
			$session->start();			
			
			$session->set('search', $search);
			
			return $this->redirect($this->generateUrl('brief_info'));
	 	}
		
		return array(
			'form' => $form->createView(),
			'body' => $body,
		);
    }
	
	
	/**
	 * Top bar search
	 */	
	public function topbarsearchAction(){
		
		$search = new search();		
		
		$formtopbar = $this->createFormBuilder($search)
            ->add('keyword', 'text', array(
				'required' => false,
				'label' => false,
				'attr' => array(
					'class' => 'topbarinput',
					'placeholder' => 'Search Keyword'
					)
				))
            ->add('submit', 'submit', array(
				'label' => 'Search',
				'attr' => array(
					'class' => 'normal button expand',
					)
				))
            ->getForm();
			
		return $this->render('LyHrmBundle:Operation:topbarsearch.html.twig',
            array(
				'form' => $formtopbar->createView(),
			)
        );
	}
	
	/**
	 * Top bar user name show
	 */
	 
	 public function topbarusernameAction()
     {
        $user = $this->container->get('security.context')->getToken()->getUser();
        
        return $this->render('LyHrmBundle:Operation:topbarusername.html.twig',
            array(
				'user' => $user
			));
     }
	
	/**
	 * @Route("/brief/{sort}/{page}", name="brief_info", Defaults={"sort" : "contractno","page" : 1})
	 * @Template()
	 */
	 public function briefAction($sort,$page,Request $request)
	 {
	 	
		$start = ($page-1)*100;
		
		$em = $this->getDoctrine()->getManager();
		
		$session = $this->getRequest()->getSession();
			
		$session->start();
		
		if($session->has('search'))

			$search = $session->get('search');
		else

			$search = new search();
		
		if($request->getMethod() == 'POST'){
			
			$search = new search();
			
			$formtopbar = $this->createFormBuilder($search)
            ->add('keyword', 'text', array(
				'required' => false,
				'label' => false,
				'attr' => array(
					'class' => 'topbarinput',
					'placeholder' => 'Search Keyword'
					)
				))
            ->add('submit', 'submit', array(
				'label' => 'Search',
				'attr' => array(
					'class' => 'normal button expand',
					)
				))
            ->getForm();
		
			$formtopbar->handleRequest($request);
		   
		    $search = $formtopbar->getData();
		}		
				
		$crew = $em->getRepository('LyHrmBundle:crewinfo')->findAllBriefOrderedBySort($start,$sort,$search->getKeyword(), $search->getCraft(), $search->getNationality(), $search->getVessel(),$search->getStatus());

		$count = $em->getRepository('LyHrmBundle:crewinfo')->countAllCrew($search->getKeyword(), $search->getCraft(), $search->getNationality(), $search->getVessel(),$search->getStatus());
				//exit(\Doctrine\Common\Util\Debug::dump($crew));		
		$pages = ceil($count[0][1]/100);
		
		$vessel = $em->getRepository('LyHrmBundle:vessel')->findAll();

		$vessel_array = array();
		
		foreach ($vessel as $vessel) {
			
			$temp = explode("\r\n", $vessel->getVessel());
			
			$vessel_array[$vessel->getCompany()] = $temp;
		}

		return array(
			'sort' => $sort,
			'page' => $page,
			'crew' => $crew,
			'pages' => $pages,
			'vessel_option' => $vessel_array,
		);
			
				
	 }
	
	/**
	 * @Route("/infoshow/{id}", name="info_show")
	 * @Template()
	 */
	 public function infoshowAction($id){
	 	
		$em = $this->getDoctrine()->getManager();

		$crew = $em->getRepository('LyHrmBundle:crewinfo')->find($id);
		//exit(\Doctrine\Common\Util\Debug::dump($crew->getExperience()));		
		return array(
			'crew' => $crew,
		);
		
	 }
	 
	 
	/**
	 * @Route("/addcrew", name="addcrew_page")
	 * @Template()
	 */
	 
	 public function addcrewAction(Request $request) {
	 	
		$crew = new crewinfo();
		
		$vessel = $this->getDoctrine()->getRepository('LyHrmBundle:vessel')->findAll();
		
		$vessel_choice_array = array();
		
		$vessel_choice_array['N/A'] = "Choose a Vessel";
		
		foreach ($vessel as $vessel) {
			
			$temp = explode("\r\n", $vessel->getVessel());
			
			$vessel_array = array();
			
			foreach ($temp as $value) {
				
				$vessel_array[$value] = $value;
			}
			
			$vessel_choice_array[$vessel->getCompany()] = $vessel_array;
		}
		
		$form = $this->createForm(new crewinfoType($vessel_choice_array), $crew);

        $form->handleRequest($request);
		
		if($form->isValid()) {
			
			$em = $this->getDoctrine()->getManager();
			
			if(null !== ($form['photopath']->getData())){
				
				$dir = __DIR__.'/../../../../web/bundles/hrm/images/crew photo/';
			
				$photo = $form['photopath']->getData();
				 
				$extension = $photo->guessExtension();
				
				$photopath = $crew->getId().'.'.$extension;
	
				$photo->move($dir, $photopath);
				
				$crew->setPhotopath($photopath);
			}
			
			foreach ($crew->getCertificate() as $certificate) {				
				//Add new certificate
				if($certificate->getFromid() == null){

					$certificate->setFromid($crew);
				}		
				//New certificate uploaded
				if($certificate->getPath() !== null)
				{
					$dir = __DIR__.'/../../../../web/bundles/hrm/certificate/';

					$filename = sha1(uniqid(mt_rand(), true));

					$cert = $certificate->getPath();

					$extension = $cert->guessExtension();

					$path = $filename.'.'.$cert->guessExtension();

					$cert->move($dir, $path);
					
					$originalpathsave = $certificate->getPathsave();
					
					//Delete old one
					if(!empty($originalpathsave)){

						$file = $dir.$originalpathsave;	

						if(file_exists($file)) 

	    					unlink($file);
					}					

					$certificate->setPath($path);

					$certificate->setPathsave($path);

					$em->persist($certificate);
				}
			}
			
			$em->persist($crew);
			
			$em->flush();
			
			return $this->redirect($this->generateUrl('info_show', array(
				'id' => $crew->getId(),
			)));			
		}
		
		return array(
			'form' => $form->createView(),
		);
	 }
	
	
	/**
	 * @Route("/infoedit/{id}", name="info_edit")
	 * @Template()
	 */
	 public function infoeditAction($id, Request $request){
	 	
		$em = $this->getDoctrine()->getManager();

		$crew = $em->getRepository('LyHrmBundle:crewinfo')->find($id);
		
		//Vessel List
		$vessel = $this->getDoctrine()->getRepository('LyHrmBundle:vessel')->findAll();
		
		$vessel_choice_array = array();
		
		$vessel_choice_array['N/A'] = "Choose a Vessel";
		
		foreach ($vessel as $vessel) {
			
			$temp = explode("\r\n", $vessel->getVessel());
			
			$vessel_array = array();
			
			foreach ($temp as $value) {
				
				$vessel_array[$value] = $value;
			}
			
			$vessel_choice_array[$vessel->getCompany()] = $vessel_array;
		}
		
		$photopath = $crew->getPhotopath();
		
		$certificatepath = $crew->getCertificate();		
		//Set up the existed certificate
		$originalcertificate = new ArrayCollection();
        
		foreach ($crew->getCertificate() as $certificate) {

			$originalcertificate->add($certificate);
		}

		$form = $this->createForm(new crewinfoType($vessel_choice_array), $crew);

        $form->handleRequest($request);		
		
	 	if ($form->isValid()) {
		 	
			$crew->setPhotopath($photopath);
		 	
			if(null !== ($form['photopath']->getData())){
				
				$dir = __DIR__.'/../../../../web/bundles/hrm/images/crew photo/';
			
				$photo = $form['photopath']->getData();
				 
				$extension = $photo->guessExtension();
				
				$photopath = $crew->getId().'.'.$extension;
	
				$photo->move($dir, $photopath);
				
				$crew->setPhotopath($photopath);
			}
			
			foreach ($crew->getCertificate() as $certificate) {				
				//Add new certificate
				if($certificate->getFromid() == null){

					$certificate->setFromid($crew);
				}		
				//New certificate uploaded
				if($certificate->getPath() !== null)
				{
					$dir = __DIR__.'/../../../../web/bundles/hrm/certificate/';

					$filename = sha1(uniqid(mt_rand(), true));

					$cert = $certificate->getPath();

					$extension = $cert->guessExtension();

					$path = $filename.'.'.$cert->guessExtension();

					$cert->move($dir, $path);
					
					$originalpathsave = $certificate->getPathsave();					
					//Delete old one
					if(!empty($originalpathsave)){

						$file = $dir.$originalpathsave;	

						if(file_exists($file))

	    					unlink($file);
					}					

					$certificate->setPath($path);

					$certificate->setPathsave($path);

					$em->persist($certificate);
				}
			}			
			
			//Delete deleted certificate
			foreach ($originalcertificate as $certificate) {
				
				if(false === $crew->getCertificate()->contains($certificate)){
					
					$dir = __DIR__.'/../../../../web/bundles/hrm/certificate/';
					
					$pathsave = $certificate->getPathsave();
					
					if(!empty($pathsave)){

						$file = $dir.$pathsave;

	    				if(file_exists($file))

	    					unlink($file);
					}
					$em->remove($certificate);					
				}					
			}					
			
			$em->persist($crew);
			
			$em->flush();
			
			return $this->redirect($this->generateUrl('info_show', array(
				'id' => $crew->getid(),
			)));			
		 }
		
		return array(
			'form' => $form->createView(),
			'crew' => $crew,
		);
		
	 }
	
	/**
	 * @Route("/infodrop/{id}", name="info_drop")
	 */
	 public function infodropAction($id){
	 	
		$em = $this->getDoctrine()->getManager();

		$crew = $em->getRepository('LyHrmBundle:crewinfo')->find($id);
		
		$experience = $crew->getExperience();
		
		$certificate = $crew->getCertificate();
		
		$mobrecord = $crew->getMob();
		
		foreach ($experience as $value) {
			
			$em->remove($value);			
		}
		
		foreach ($certificate as $certificate) {
											
			$pathsave = $certificate->getPathsave();
			
			if(!empty($pathsave)){
				
				$dir = __DIR__.'/../../../../web/bundles/hrm/certificate/';
				
				$file = $dir.$pathsave;							
				
				if(file_exists($file)) 
					unlink($file);
			}
			$em->remove($certificate);	
		}
		
		foreach ($mobrecord as $value) {
			
			$em->remove($value);
		}
		$em->remove($crew);
		$em->flush();
		
		return $this->redirect($this->generateUrl('main_page'));
	 }
	
	/**
	 * @Route("/experience/{id}", name="experience_page")
	 * @Template()
	 */
	public function experienceAction($id,Request $request){
	 	
	 	$em = $this->getDoctrine()->getManager();

		$crew = $em->getRepository('LyHrmBundle:crewinfo')->find($id);

        
        $originalexperience = new ArrayCollection();
        
		foreach ($crew->getExperience() as $experience) {
			$originalexperience->add($experience);
		}
				
        $form = $this->createForm(new crewinfoexperienceType(), $crew);

        $form->handleRequest($request);
		
		if ($form->isValid()) {
		
			//Add new experience
			foreach ($crew->getExperience() as $value) {
				
				if($value->getFromid()==null){
					
					$value->setFromid($crew);
				}
			}
			
			foreach ($originalexperience as $value) {
				
				if(false === $crew->getExperience()->contains($value))
				
					$em->remove($value);
			}
			
			$em->persist($crew);
			
			$em->flush();
			
			return $this->redirect($this->generateUrl('info_show', array(
				'id' => $crew->getid(),
			)));
      }

      return array(
         'form' => $form->createView(),
         'crew' => $crew,
      );
		
	}
	
	/**
	 * @Route("/mobrecordlist", name="mobrecord_brief")
	 * @Template()
	 */
	 public function mobrecordlistAction(){
	 	
		$em = $this->getDoctrine()->getManager();
	
		$mobgroup = $em->getRepository('LyHrmBundle:mobgroup')->findBy(array(), array('mobdate' => 'desc'));
		
		$vessel = $this->getDoctrine()->getRepository('LyHrmBundle:vessel')->findAll();
		
		$vessel_choice_array = array();
		
		$vessel_choice_array[''] = "Choose a Vessel";
		
		$company = array();
		
		$company[''] = 'Choose a Company';
		
		foreach ($vessel as $vessel) {
			
			$temp = explode("\r\n", $vessel->getVessel());
			
			$vessel_array = array();
			
			foreach ($temp as $value) {
				
				$vessel_array[$value] = $value;
			}
			
			$vessel_choice_array[$vessel->getCompany()] = $vessel_array;
			
			$company[$vessel->getCompany()] = $vessel->getCompany();
		}
		
		$searchCriteria = array();
		
		$form = $this->createFormBuilder($searchCriteria)
			
			->add('company', 'choice', array(
				'required' => false,
				'empty_value' => false,
				'choices' => $company,
			))
			
			->add('vessel', 'choice', array(
				'required' => false,
				'empty_value' => false,
				'choices' => $vessel_choice_array,
			))
			
			->add('fromdate', 'date', array(
				'widget' => 'single_text',
				'required' => false,
				'label' => 'From',
				'empty_value' => '',
				'format' => 'dd/MM/yyyy',
				'attr' => array(
					'class' => 'datepicker',
					'placeholder' => 'DD/MM/YYYY'
					)
			))
			
			->add('todate', 'date', array(
				'widget' => 'single_text',
				'required' => false,
				'label' => 'To',
				'empty_value' => '',
				'format' => 'dd/MM/yyyy',
				'attr' => array(
					'class' => 'datepicker',
					'placeholder' => 'DD/MM/YYYY'
					)
			))
			
			->add('preparedby', 'text', array(
				'required' => false,
				'label' => 'Prepared',
				'attr' => array(
					'placeholder' => 'Prepared by..'
				)

			))			
			->getForm();			
		
		return array(
			'mobgroup' => $mobgroup,
			'form' => $form->createView(),
		);
	 }
	
	/**
	 * @Route("/mobrecordshow/{mobgroupid}", name="mobrecord_detail")
	 * @Template()
	 */
	 public function mobrecordshowAction($mobgroupid, Request $request){
	 	
		$em = $this->getDoctrine()->getManager();
	
		$mobgroup = $em->getRepository('LyHrmBundle:mobgroup')->find($mobgroupid);
		
		$vessel = $this->getDoctrine()->getRepository('LyHrmBundle:vessel')->findAll();
		
		$vessel_choice_array = array();
				
		$vessel_choice_array[''] = "Choose a Vessel";
		
		foreach ($vessel as $vessel) {
			
			$temp = explode("\r\n", $vessel->getVessel());
			
			$vessel_array = array();
			
			foreach ($temp as $value) {
				
				$vessel_array[$value] = $value;
			}
			
			$vessel_choice_array[$vessel->getCompany()] = $vessel_array;
		}
		
		$form = $this->createForm(new mobgrouptorecordType($vessel_choice_array), $mobgroup);
		
		$form->handleRequest($request);
		
		
		if ($form->isValid()){			
			
			foreach ($mobgroup->getMobrecord() as $value) {
				
				if($value->getEnddate() == null || strtotime($value->getEnddate()->format('Y-m-d')) > time() ){
					
					$value->getFromid()->setStatus('POB');
					
					$em->persist($value->getFromid());
				}
				
				elseif($value->getEnddate() != null && strtotime($value->getEnddate()->format('Y-m-d')) < time()){
					
					$value->getFromid()->setStatus('Rotation');
					
					$em->persist($value->getFromid());	
				}
			}
											
			$em->persist($mobgroup);
			
			$em->flush();
			
			return $this->redirect($this->generateUrl('mobrecord_detail', array(
				"mobgroupid" => $mobgroupid,
			)));
		}		
		
		return array(
            'form' => $form->createView(),
            'mobgroup' => $form->getData(),
        ); 
		
	 }

	/**
	 * @Route("/deleterecord/{id}", name="drop_mob")
	 */
	 public function deleterecordAction($id){
	 	
		$em = $this->getDoctrine()->getManager();
	
		$mobgroup = $em->getRepository('LyHrmBundle:mobgroup')->find($id);
			
		foreach ($mobgroup->getMobrecord() as $value) {
			
			$em->remove($value);
		}
		
		$em->remove($mobgroup);
		
		$em->flush();
		
		return $this->redirect($this->generateUrl('mobrecord_brief'));		
	 }
	 

	/**
	 * @Route("/screen", name="screen_page")
	 * @Template()
	 */
	public function screenAction(Request $request){
		
		$session = $this->getRequest()->getSession();
			
		$session->start();
		
		if(!$session->has('crew'))
			return $this->redirect($this->generateUrl('main_page'));
		
		else{
			
			$crewarray = $session->get('crew');
			
			if(sizeof($crewarray) == 0)
				
				return $this->redirect($this->generateUrl('main_page'));
			
			else{
				
				$crewobj = array();
				
				foreach ($crewarray as $value) {
				
					$em = $this->getDoctrine()->getManager();
	
					$crew = $em->getRepository('LyHrmBundle:crewinfo')->find($value['id']);
					
					array_push($crewobj, $crew);		
					
				}

				$vessel = $this->getDoctrine()->getRepository('LyHrmBundle:vessel')->findAll();
		
				$vessel_choice_array = array();
				
				$vessel_choice_array[''] = "Choose a Vessel";
				
				foreach ($vessel as $vessel) {
					
					$temp = explode("\r\n", $vessel->getVessel());
					
					$vessel_array = array();
					
					foreach ($temp as $value) {
						
						$vessel_array[$value] = $value;
					}
					
					$vessel_choice_array[$vessel->getCompany()] = $vessel_array;
				}		
				
				$mobgroupe = new Mobgroup();
					
				$form = $this->createForm(new mobgroupType($vessel_choice_array), $mobgroupe);
	
	        	$form->handleRequest($request);
				
				if($form->isValid()){
					
					foreach ($crewobj as $crew) {

						$mobrecord = new Mobrecord();

						$mobrecord->setFrommobgroup($mobgroupe);

						$mobrecord->setFromid($crew);

						$mobrecord->setStartdate($mobgroupe->getMobdate());

						$em->persist($mobrecord);
					}
					
					$mobgroupe->setCrewamount(count($crewobj));

					$user = $this->container->get('security.context')->getToken()->getUser();

					$mobgroupe->setPreparedby($user->getLastname());

					$em->persist($mobgroupe);
					
					$em->flush();

					$session->remove('crew');

					return $this->redirect($this->generateUrl('mobrecord_detail', array(
						'mobgroupid' => $mobgroupe->getId(),
					)));
					
				}	
				
				return array(
					'crew' => $crewobj,
					'form' => $form->createView(),
				);
				
			}
						
		}
	}

	/**
	 * @Route("/screenaction/{action}/{id}", name="screen_action", Defaults={"id" : ""})
	 */
	public function screenactionAction($action, $id)
	{
		$em = $this->getDoctrine()->getManager();
		
		switch ($action) {
			case 'delete':
				
				$session = $this->getRequest()->getSession();
			
				$session->start();
				
				$crew =  $em->getRepository('LyHrmBundle:crewinfo')->find($id);
				
				$bedeleted = array(
					'id' => $crew->getId(),
					'name' => $crew->getName(),
				);
				
				$temp = $session->get('crew');
				
				if (($key = array_search($bedeleted, $temp)) !== false) {
					
				    unset($temp[$key]);
					
					$session->set('crew',$temp);	
				}
				
				return $this->redirect($this->generateUrl('screen_page'));
				
				break;
			
			Operation:
				
				break;
		}
	}

	/**
	 * @Route("/vessel_list", name="vessel_list_page")
	 * @Template()
	 */
	 public function vessel_listAction(Request $request)
	 {
	 	if ($request->getMethod() == 'POST') {
	 		
			$data = $request->request->all();
			
			$count=count($data['company']);
			
			$em = $this->getDoctrine()->getManager();
			
			$em->createQuery('DELETE FROM LyHrmBundle:vessel')->execute();
			
			for($i=0;$i<$count;$i++)
 			{
 				$vessel = new vessel();
				
				$vessel->setCompany($data['company'][$i]);
				
				$vessel->setVessel($data['vessel'][$i]);
				
				$em->persist($vessel);
 			}
			
			$em->flush();
				 	
			return $this->redirect($this->generateUrl('vessel_list_page'));
		}
		
		else{
			
			$em = $this->getDoctrine()->getManager();
	
			$vessel = $em->getRepository('LyHrmBundle:vessel')->findAll();
			 
			$vessel_list = array();
			 
			foreach ($vessel as $value) {
				$temp = array();
				 
				$temp['company'] = $value->getCompany();
				
				$array = explode("\r\n", $value->getVessel());
				 
				$temp['vessel'] = implode("\n", $array);
				 
				array_push($vessel_list,$temp);
				
			 }
			
			return array(
				'vessel_list' => $vessel_list
			);
		}	 
		 
	 }

	/**
	 * @Route("/beta_crew", name="beta_crew_page") 
	 * @Template()
	 */
	 public function beta_crewAction()
	 {
		 $em = $this->getDoctrine()->getManager();

		 $crew = $em->getRepository('LyUserBundle:User')->findBetaCrew('CREW');
		 
		 return array(
		 	'crew' => $crew
		 );
		 
	 }
	 
	 /**
	  * @Route("/beta_crew_detail/{id}", name="beta_crew_detail_page")
	  * @Template()
	  */
	  public function beta_crew_detailAction($id)
	  {
		  $em = $this->getDoctrine()->getManager();
		  
		  $crew = $em->getRepository('LyUserBundle:User')->find($id);
		  
		  $betacrewid = $crew->getBetacrewid();
		  
		  //exit(\Doctrine\Common\Util\Debug::dump($betacrewid));
		  $detail = $em->getRepository('LyHrmBundle:betacrewinfo')->find($betacrewid);
		  
		  return array(		  	
			'crew' => $crew,
			'betacrew' => $detail,			
		  );
	  }


	/**
	 * @Route("/vessel", name="vessel_page")
	 * @Template()
	 */
	 public function vesselAction(){
	 	
		$em = $this->getDoctrine()->getManager();
		
		$company = $em->getRepository('LyHrmBundle:company')->findAll();
		
		return array(
			'company' => $company,
		);		
	 }
	 
	 
	/**
	 * @Route("/sticker", name="sticker_page")
	 * @Template()
	 */ 
	public function stickerAction(Request $request){
		
		$em = $this->getDoctrine()->getManager();
		
		$body = $em->getRepository('LyHrmBundle:ticker')->find(1);	
		
		$form = $this->createFormBuilder($body)
        ->add('body', 'textarea', array(
			'required' => false,
			'label' => false,
			'attr' => array(
				'class' => 'tinymce',
				'placeholder' => 'Input body here'
			)
		))
        ->add('submit', 'submit', array(
			'label' => 'Submit',
			'attr' => array(
				'class' => 'normal button expand',
			)
		))
        ->getForm();
	
		$form->handleRequest($request);
		
		if($form->isValid()){
					
			$em->persist($body);
			
			$em->flush();
			
			return $this->redirect($this->generateUrl('main_page'));			
		}	
		
		return array(
			'form' => $form->createView(),
		);
	}
	
	/**
	 * @Route("/ajaxhandler", name="ajax_handler")
	 */
	public function ajaxhandlerAction(){		

		$request = $this->get('request');
		
		$type = $request->get('type');
		
		
		if($type == 'addcrewlist'){
						
			$data = $request->get('data');
			
			$em = $this->getDoctrine()->getManager();

			$crew = $em->getRepository('LyHrmBundle:crewinfo')->find($data);
			
			$session = $this->getRequest()->getSession();
			
			$session->start();
			
			if(!$session->has('crew'))

				$session->set('crew', array());			
			
			$temp = $session->get('crew');
			
			$bepushed = array(
				'id' => $crew->getId(),
				'name' => $crew->getName(),
			);
			
			if(!in_array($bepushed, $temp)){

				array_push($temp, $bepushed);
				
				$session->set('crew',$temp);				
			}			
		
			$response = array("code" => 200, "success" => true);		
		  
		    return new Response(json_encode($response)); 			
		}
		
		elseif ($type == 'deletecrewlist') {
				
			$data = $request->get('data');
			
			$em = $this->getDoctrine()->getManager();

			$crew = $em->getRepository('LyHrmBundle:crewinfo')->find($data);
			
			$session = $this->getRequest()->getSession();
			
			$session->start();
			
			if(!$session->has('crew'))

				$session->set('crew', array());
						
			$temp = $session->get('crew');
			
			foreach ($temp as $key => $value) {

				if($value['id'] == $crew->getId())

					unset($temp[$key]);
			}
			
			$session->set('crew',$temp);
			
			$response = array("code" => 200, "success" => true);

		    return new Response(json_encode($response)); 
			
		}
		
		elseif ($type == 'status') {
			
			$id = $request->get('id');
			
			$data = $request->get('data');
			
			$em = $this->getDoctrine()->getManager();
			
			$crew = $em->getRepository('LyHrmBundle:crewinfo')->find($id);
			
			$crew->setStatus($data);
			
			$em->persist($crew);
			
			$em->flush();
			
			$response = array("code" => 200, "success" => true);
			
			return new Response(json_encode($response));
		}

		elseif ($type == 'vessel') {
			
			$id = $request->get('id');
			
			$vessel = $request->get('vessel');

			$company = $request->get('company');
			
			$em = $this->getDoctrine()->getManager();
			
			$crew = $em->getRepository('LyHrmBundle:crewinfo')->find($id);
			
			$crew->setVessel($vessel);

			$crew->setCompany($company);
			
			$em->persist($crew);
			
			$em->flush();
			
			$response = array("code" => 200, "success" => true);
			
			return new Response(json_encode($response));
		}
		
	}	
}
