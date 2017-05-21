<?php

namespace AppBundle\Tests\ParamConverter;

use Symfony\Component\HttpFoundation\Request;

/**
 * Class LinodeConverterTest
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class LinodeConverterTest extends \PHPUnit_Framework_TestCase
{
    public function testApply()
    {
        $request = $this->createMock(Request::class);
    }
}
