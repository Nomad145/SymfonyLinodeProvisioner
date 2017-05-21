<?php

namespace Service;

use AppBundle\Service\LinodeHostService;
use Doctrine\Common\Collections\ArrayCollection;
use Linode\LinodeApi;

/**
 * Class LinodeHostServiceTest
 * @author Michael Phillips <michael.phillips@manpow.com>
 */
class LinodeHostServiceTest extends \PHPUnit_Framework_TestCase
{
    public function testLinodes()
    {
        $api = $this->createMock(LinodeApi::class);
        $api->method('getList')
            ->willReturn([]);

        $subject = new LinodeHostService($api);
        $this->assertInstanceOf(ArrayCollection::class, $subject->getLinodes());
    }
}
