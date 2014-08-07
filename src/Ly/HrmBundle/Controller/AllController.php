<?php

namespace Ly\HrmBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class AllController extends Controller
{
	public function topbarusernameAction()
	{
		$user = $this->container->get('security.context')->getToken()->getUser();
        
        return $this->render('LyHrmBundle:All:topbarusername.html.twig',
            array(
				'user' => $user
			));
	}
}
