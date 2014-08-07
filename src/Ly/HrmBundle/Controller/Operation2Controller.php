<?php

namespace Ly\HrmBundle\Controller;

use Symfony\Component\HttpFoundation\Session\Session;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

use JMS\SecurityExtraBundle\Annotation\PreAuthorize;


/**
 * @Route("/hrm")
 * @PreAuthorize("hasRole('ROLE_OPERATION')")
 */

class Operation2Controller extends Controller
{
    /**
     * @Route("/crew_report", name="crew_report")
     * @Template()
     */
    public function crew_reportAction()
    {

    	$em = $this->getDoctrine()->getManager();

    	$crew = $em->getRepository('LyHrmBundle:crewinfo')->findAllBriefOrderedByKeyword('');

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

	        if(array_key_exists($value['company'], $vessel_array)){
	        	if(array_key_exists($value['vessel'], $vessel_array[$value['company']]))
	        		$vessel_array[$value['company']][$value['vessel']]++;
	        	else
	        		$vessel_array[$value['company']][$value['vessel']] = 1;			
	        }	        
	        else{
	        	$vessel_array[$value['company']] = array();
	        	$vessel_array[$value['company']][$value['vessel']] = 1;
	        }	          	
    	}

	    arsort($craft_array);

	    arsort($nationality_array);

	    arsort($status_array);

	    arsort($vessel_array);

	    $company_vessel_sum = array();

	    foreach ($vessel_array as $key => $value) {
	    	# code...
	    	$company_vessel_sum[$key] = array_sum($value);
	    }

  		$sum = array_sum($craft_array);

  		if(count($craft_array) > 25){

	        $craft_other = array_sum(array_slice($craft_array, 24));

	        $craft_array_short = array_slice($craft_array, 0, 24);

	        $craft_array_short['other'] = $craft_other;
      	}
      	else
        	$craft_array_short = $craft_array;

        if(count($status_array) > 8){

	        $status_other = array_sum(array_slice($status_array, 7));

	        $status_array_short = array_slice($status_array, 0, 7);

	        $status_array_short['status'] = $status_other;
	     }
	     else
	        $status_array_short = $status_array;

	    if(count($nationality_array) > 5){

	        $nationality_other = array_sum(array_slice($nationality_array, 4));

	        $nationality_array_short = array_slice($nationality_array, 0, 4);

	        $nationality_array_short['other'] = $nationality_other;
	    }
	    else
	        $nationality_array_short = $nationality_array;

    	return array(
    		'sum' => $sum,
    		'craft' => $craft_array,
        	'craft_short' => $craft_array_short,
        	'status' => $status_array,
        	'status_short' => $status_array_short,
        	'nationality' => $nationality_array,
        	'nationality_short' => $nationality_array_short,
        	'vessel' => $vessel_array,
        	'vessel_sum' => $company_vessel_sum,
    	);
    }
	
	/**
	 * @Route("/mob_search", name="mob_search")
	 * @Template()
	 */
	 public function mob_searchAction(Request $request){
	 	
		if($request->getMethod() == 'POST'){
			
			$searchCriteria = array();
			
			$form = $this->createFormBuilder($searchCriteria)
			
			->add('company', 'text', array(
				'required' => false,

			))
			
			->add('vessel', 'text', array(
				'required' => false,
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
			
			$form->handleRequest($request);
		   
		    $keywords = $form->getData();
			
			foreach ($keywords as $key => $value) {
				if($value == null)
					$keywords[$key] = '';
			}
			
			exit(\Doctrine\Common\Util\Debug::dump($keywords));
		}
	 }
	
	/**
	 * @Route("/excel", name="excel_text")
     * @Template()
	 */
	 public function excelAction()
	 {
	 	  $phpExcelObject = $this->get('phpexcel')->createPHPExcelObject();

       $phpExcelObject->getProperties()->setCreator("liuggio")
           ->setLastModifiedBy("Giulio De Donato")
           ->setTitle("Office 2005 XLSX Test Document")
           ->setSubject("Office 2005 XLSX Test Document")
           ->setDescription("Test document for Office 2005 XLSX, generated using PHP classes.")
           ->setKeywords("office 2005 openxml php")
           ->setCategory("Test result file");
       $phpExcelObject->setActiveSheetIndex(0)
           ->setCellValue('A1', 'Hello')
           ->setCellValue('B2', 'world!');
       $phpExcelObject->getActiveSheet()->setTitle('Simple');
       // Set active sheet index to the first sheet, so Excel opens this as the first sheet
       $phpExcelObject->setActiveSheetIndex(0);

        // create the writer
        $writer = $this->get('phpexcel')->createWriter($phpExcelObject, 'Excel2007');
        // create the response
        $response = $this->get('phpexcel')->createStreamedResponse($writer);
        // adding headers
        $response->headers->set('Content-Type', 'text/vnd.ms-excel; charset=utf-8');
        $response->headers->set('Content-Disposition', 'attachment;filename=stream-file.xlsx');
        $response->headers->set('Pragma', 'public');
        $response->headers->set('Cache-Control', 'maxage=1');

        return $response;
     
	 }
	 

}
