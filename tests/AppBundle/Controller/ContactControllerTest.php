<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/contact');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Location Based Digital Marketing Agency Ensure '
                            . 'your business is found where your customers are '
                            . 'already looking!', 
                            $crawler->filter('#container h5')->text()
                );
    }
}
