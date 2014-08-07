<?php

namespace Ly\PageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="home_page")
     * @Template()
     */
    public function indexAction()
    {
        return $this->render('LyPageBundle:Default:index.html.twig');
    }
	
	/**
     * @Route("/about_us", name="about_us")
     * @Template()
     */
    public function about_usAction()
    {
        return $this->render('LyPageBundle:Default:about_us.html.twig');
    }
	/**
     * @Route("/services", name="services_page")
     * @Template()
     */
    public function servicesAction()
    {
        return $this->render('LyPageBundle:Default:services.html.twig');
    }
	/**
     * @Route("/contact_us", name="contact_us")
     * @Template()
     */
    public function contact_usAction()
    {
        return $this->render('LyPageBundle:Default:contact_us.html.twig');
    }
	
	/**
     * @Route("/services/medicalexaminations", name="services_medicalexaminations_page")
     * @Template()
     */
    public function medicalexaminationsAction()
    {
        return $this->render('LyPageBundle:Default:medicalexaminations.html.twig');
    }
    
    /**
     * @Route("/services/seasurvival", name="services_seasurvival_page")
     * @Template()
     */
    public function seasurvivalAction()
    {
        return $this->render('LyPageBundle:Default:seasurvival.html.twig');
    }
	
	/**
     * @Route("/services/internationalinsurance", name="services_internationalinsurance_page")
     * @Template()
     */
    public function internationalinsuranceAction()
    {
        return $this->render('LyPageBundle:Default:internationalinsurance.html.twig');
    }
	
	/**
     * @Route("/services/flighthotel", name="services_flighthotel_page")
     * @Template()
     */
    public function flighthotelAction()
    {
        return $this->render('LyPageBundle:Default:flighthotel.html.twig');
    }

	/**
     * @Route("/services/visaprocessing", name="services_visaprocessing_page")
     * @Template()
     */
    public function visaprocessingAction()
    {
        return $this->render('LyPageBundle:Default:visaprocessing.html.twig');
    }
	
	/**
	 * @Route("/agreement", name="agreement_page")
	 * @Template()
	 */
	 public function agreementAction(){
	 	
		return $this->render('LyPageBundle:Default:agreement.html.twig');
	 }
}
