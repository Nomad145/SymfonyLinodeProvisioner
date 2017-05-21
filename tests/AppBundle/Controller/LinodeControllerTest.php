<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use AppBundle\Service\LinodeHostService;
use AppBundle\Model\Linode;
use Linode\AvailApi;
use AppBundle\Factory\LinodeApiFactory;
use Linode\LinodeApi;
use Linode\Linode\IpApi;
use AppBundle\Model\DataCenter;
use AppBundle\Service\LinodeAvailService;

class LinodeControllerTest extends WebTestCase
{
    public function setUp()
    {
        $this->client = static::createClient(array(), array(
            'PHP_AUTH_USER' => 'admin',
            'PHP_AUTH_PW'   => 'admin',
        ));

        $availApi = $this->createMock(AvailApi::class);
        $hostApi = $this->createMock(LinodeApi::class);
        $ipApi = $this->createMock(IpApi::class);

        $map = [
            ['AvailApi', $availApi],
            ['LinodeApi', $hostApi],
            ['Linode\\IpApi', $ipApi],
        ];

        $factory = $this->createMock(LinodeApiFactory::class);
        $factory
            ->method('get')
            ->will($this->returnValueMap($map));

        $hostService = $this->createMock(LinodeHostService::class);
        $hostService
            ->expects($this->any())
            ->method('getLinodes')
            ->willReturn([
                (new Linode())->setLabel('Test Linode')
            ]);

        $availService = $this->createMock(LinodeAvailService::class);
        $availService
            ->expects($this->any())
            ->method('getDataCenters')
            ->willReturn([
                (new DataCenter())->setLocation('Test Location')
            ]);

        $this->client->getContainer()->set('linode.factory', $factory);
        $this->client->getContainer()->set('linode.api.host', $hostService);
        $this->client->getContainer()->set('linode.api.avail', $availService);
    }

    public function testIndex()
    {
        $crawler = $this->client->request('GET', '/');

        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
        $this->assertContains('Test Linode', $this->client->getResponse()->getContent());
    }

    public function testCloneAction()
    {
        $crawler = $this->client->request('GET', '/clone');

        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
    }

    public function testCreateAction()
    {
        $crawler = $this->client->request('GET', '/create');

        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
    }
}
