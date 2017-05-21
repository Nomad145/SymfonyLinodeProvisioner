<?php

namespace AppBundle\Factory;

use Linode\AvailApi;

/**
 * Class LinodeApiFactoryTest
 * @author Michael Phillips <michael.phillips@manpow.com>
 */
class LinodeApiFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testGet()
    {
        $factory = new LinodeApiFactory('key');
        $this->assertInstanceOf(AvailApi::class, $factory->get('AvailApi'));
    }
}
