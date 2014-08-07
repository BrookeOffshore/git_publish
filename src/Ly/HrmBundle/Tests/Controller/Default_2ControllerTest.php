<?php

namespace Ly\HrmBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class Default_2ControllerTest extends WebTestCase
{
    public function testCrew_report()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/crew_report');
    }

}
