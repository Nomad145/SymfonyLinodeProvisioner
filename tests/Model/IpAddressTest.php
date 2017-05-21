<?php

namespace AppBundle\Tests\Model;

use AppBundle\Model\IpAddress;

/**
 * Class IpAddressTest
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class IpAddressTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateFromArray()
    {
        $ipAddress = IpAddress::createFromArray([
            'LINODEID' => 1,
            'ISPUBLIC' => 'false',
            'IPADDRESS' => '10.0.0.1',
            'IPADDRESSID' => '1337',
        ]);

        $this->assertSame($ipAddress->getLinodeId(), 1);
        $this->assertSame($ipAddress->getIsPublic(), 'false');
        $this->assertSame($ipAddress->getIpAddress(), '10.0.0.1');
        $this->assertSame($ipAddress->getIpAddressId(), '1337');
    }
}
