<?php

namespace Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Tests\Functional\WebTestCase;

/**
 * Class LinodeControllerTest
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class LinodeControllerTest extends WebTestCase
{
    public function setUp()
    {
        $client = static::createClient();
        $service = $this->createMock(LinodeHostService::class);

        $client->getContainer()->set('linode.api.host', $service);
    }

    public function testListAction()
    {
        $this->client->request('GET', '/');
    }
}
