<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use AppBundle\Service\LinodeHostService;
use AppBundle\Model\Linode;

class LinodeControllerTest extends WebTestCase
{
    public function setUp()
    {
        $this->client = static::createClient();
    }

    public function testIndex()
    {
        $this->client = static::createClient();
        $service = $this->createMock(LinodeHostService::class);
        $service->method('getLinodes')
            ->willReturn([
                (new Linode())->setLabel('Test Linode')
            ]);

        $this->client->getContainer()->set('linode.api.host', $service);
        $crawler = $this->client->request('GET', '/');

        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
        $this->assertContains('Test Linode', $this->client->getResponse()->getContent());
    }

    public function testCloneAction()
    {
        $this->client = static::createClient();
        $crawler = $this->client->request('GET', '/clone');

        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
    }

    public function testCreateAction()
    {
        $this->client = static::createClient();
        $crawler = $this->client->request('GET', '/create');

        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
    }
}
