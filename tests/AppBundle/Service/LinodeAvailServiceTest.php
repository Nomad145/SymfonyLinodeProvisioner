<?php

namespace Tests\Service;

use Linode\AvailApi;
use AppBundle\Service\LinodeAvailService;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class LinodeAvailServiceTest
 * @author Michael Phillips <michael.phillips@manpow.com>
 */
class LinodeAvailServiceTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->api = $this->createMock(AvailApi::class);

        $this->api
            ->method('dataCenters')
            ->willReturn([
                [
                    'DATACENTERID' => 1,
                    'LOCATION' => 'Dallas, TX',
                    'ABBR' => 'DTX'
                ],
            ]);

        $this->api
            ->method('linodePlans')
            ->willReturn([
                [
                    'PLANID' => 1,
                    'PRICE' => 200.00,
                    'RAM' => 4096,
                    'XFER' => 100,
                    'LABEL' => 'High Speed',
                    'AVAIL' => '1',
                    'DISK' => '100',
                    'HOURLY' => '.06'
                ],
            ]);
    }

    public function testGetDataCenters()
    {
        $subject = new LinodeAvailService($this->api);
        $dataCenters = $subject->getDataCenters();

        $this->assertInstanceOf(ArrayCollection::class, $dataCenters);
        $this->assertNotEmpty($dataCenters);
    }

    public function testGetPlans()
    {
        $subject = new LinodeAvailService($this->api);
        $plans = $subject->getPlans();

        $this->assertInstanceOf(ArrayCollection::class, $plans);
        $this->assertNotEmpty($plans);
    }
}
