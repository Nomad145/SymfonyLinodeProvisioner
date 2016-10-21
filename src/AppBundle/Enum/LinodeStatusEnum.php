<?php

namespace AppBundle\Enum;

use MyCLabs\Enum\Enum;

/**
 * Class LinodeStatusEnum
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class LinodeStatusEnum extends Enum
{
    const BEINGCREATED = -1;
    const BRANDNEW = 0;
    const RUNNING = 1;
    const POWEREDOFF = 2;
}
