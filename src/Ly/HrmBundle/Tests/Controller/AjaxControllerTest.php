<?php

namespace Ly\HrmBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AjaxControllerTest extends WebTestCase
{
    public function testAjaxhandler()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/ajaxhandler');
    }

}
