<?php

namespace AppBundle\Tests\Model;

use AppBundle\Model\DataCenter;

/**
 * Class DataCenterTest
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class DataCenterTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateFromArray()
    {
        $dataCenter = DataCenter::createFromArray([
            'DATACENTERID' => 1,
            'LOCATION' => 'Dallas, TX',
            'ABBR' => 'DFW',
        ]);

        $this->assertSame($dataCenter->getId(), 1);
        $this->assertSame($dataCenter->getLocation(), 'Dallas, TX');
        $this->assertSame($dataCenter->getAbbreviation(), 'DFW');
    }
}
