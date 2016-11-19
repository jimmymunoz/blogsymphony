<?php

namespace Jimmy\BlogBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CrudControllerTest extends WebTestCase
{
    public function testNewpost()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/newPost');
    }

    public function testGetallpost()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/getAllPost');
    }

    public function testGetpost()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/getPost');
    }

}
