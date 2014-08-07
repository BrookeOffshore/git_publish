<?php

namespace Ly\HrmBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

use Ly\HrmBundle\Entity\search;

use JMS\SecurityExtraBundle\Annotation\PreAuthorize;

/**
 * @Route("/client")
 * @PreAuthorize("hasRole('ROLE_CLIENT')")
 */

class ClientController extends Controller
{
    /**
     * @Route("/", name="client_page")
     */

    public function indexAction()
    {
      return $this->redirect($this->generateUrl('client_dash_board'));     
    }

    /**
     * @Route("/crew_page/{sort}/{page}", name="client_crew_page", defaults={"sort" : "contractno", "page" : 1})
     * @Template()
     */
    public function crew_pageAction($sort, $page)
    {
     	$start = ($page-1)*100;
  		
  		$em = $this->getDoctrine()->getManager();

    	$user = $this->container->get('security.context')->getToken()->getUser();

    	$search = new search();

    	switch ($user->getClientShort()) {
    		case 'shl':
    			# code...
    			$search->setKeyword('Seaway Heavy Lifting');
    			break;

    		case 'vanoord':
    			# code...
    			$search->setKeyword('Van Oord Offshore B.V.');
    			break;

         case 'allseas':
          # code...
          $search->setKeyword('ALLSEAS MARINE');
          break; 	
    		
    		default:
    			# code...
    			break;
    	}

    	$crew = $em->getRepository('LyHrmBundle:crewinfo')->findAllBriefOrderedBySort($start,$sort,$search->getKeyword(), '', '', '', '');

  		$count = $em->getRepository('LyHrmBundle:crewinfo')->countAllCrew($search->getKeyword(), '', '', '', '');
  		//exit(\Doctrine\Common\Util\Debug::dump($crew));
  		
  		$pages = ceil($count[0][1]/100);
      //exit(\Doctrine\Common\Util\Debug::dump($vessel_array_short));

    	return $this->render('LyHrmBundle:Client:crew_page.html.twig',
  		  array(
  			'sort' => $sort,
  			'page' => $page,
  			'crew' => $crew,
  			'pages' => $pages,
  		  )
  		);
   }

    /**
     * @Route("/dash_board", name="client_dash_board")
     * @Template()
     */ 
    
    public function dash_boardAction()
    {
      $em = $this->getDoctrine()->getManager();

      $user = $this->container->get('security.context')->getToken()->getUser();

      $search = new search();

      switch ($user->getClientShort()) {
        case 'shl':
          # code...
          $search->setKeyword('Seaway Heavy Lifting');
          break;

        case 'vanoord':
          # code...
          $search->setKeyword('Van Oord Offshore B.V.');
          break;

         case 'allseas':
          # code...
          $search->setKeyword('ALLSEAS MARINE');
          break;  
        
        default:
          # code...
          break;
      }

      $crew = $em->getRepository('LyHrmBundle:crewinfo')->findAllBriefOrderedByKeyword($search->getKeyword());

      $craft_array = $status_array = $nationality_array = $vessel_array = array();

      foreach ($crew as $value) {

        if(array_key_exists($value['craft'], $craft_array))
          $craft_array[$value['craft']]++;
        
        else
          $craft_array[$value['craft']] = 1;

        if(array_key_exists($value['nationality'], $nationality_array))
          $nationality_array[$value['nationality']]++;
        
        else
          $nationality_array[$value['nationality']] = 1;

        if(array_key_exists($value['status'], $status_array))
          $status_array[$value['status']]++;
        
        else
          $status_array[$value['status']] = 1;

        if(array_key_exists($value['vessel'], $vessel_array))
          $vessel_array[$value['vessel']]++;
        
        else
          $vessel_array[$value['vessel']] = 1;
      }

      arsort($craft_array);

      arsort($nationality_array);

      arsort($status_array);

      arsort($vessel_array);

      $sum = array_sum($craft_array);

      if(count($craft_array) > 10){

        $craft_other = array_sum(array_slice($craft_array, 9));

        $craft_array_short = array_slice($craft_array, 0, 9);

        $craft_array_short['other'] = $craft_other;
      }
      else
        $craft_array_short = $craft_array;

      if(count($nationality_array) > 8){

        $nationality_other = array_sum(array_slice($nationality_array, 7));

        $nationality_array_short = array_slice($nationality_array, 0, 7);

        $nationality_array_short['other'] = $nationality_other;
      }
      else
        $nationality_array_short = $nationality_array;

      if(count($status_array) > 8){

        $status_other = array_sum(array_slice($status_array, 7));

        $status_array_short = array_slice($status_array, 0, 7);

        $status_array_short['status'] = $status_other;
      }
      else
        $status_array_short = $status_array;

      if(count($vessel_array) > 8){

        $vessel_other = array_sum(array_slice($vessel_array, 7));

        $vessel_array_short = array_slice($vessel_array, 0, 7);

        $vessel_array_short['vessel'] = $vessel_other;
      }
      else
        $vessel_array_short = $vessel_array;

      return $this->render('LyHrmBundle:Client:dash_board.html.twig',
        array(
        'craft' => $craft_array,
        'craft_short' => $craft_array_short,
        'status' => $status_array,
        'status_short' => $status_array_short,
        'nationality' => $nationality_array,
        'nationality_short' => $nationality_array_short,
        'vessel' => $vessel_array,
        'vessel_short' => $vessel_array_short,
        'sum' => $sum,
        )
      );
    }


    /**
	   * Top bar user name show
	   */
	 
	  public function topbarusernameAction()
    {
	     $user = $this->container->get('security.context')->getToken()->getUser();
	    
	     return $this->render('LyHrmBundle:Client:topbarusername.html.twig',
	       array(
				  'user' => $user
			 ));
    }

}
