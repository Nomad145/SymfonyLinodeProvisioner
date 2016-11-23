<?php

namespace AppBundle\Enum;

use MyCLabs\Enum\Enum;

/**
 * Class PaymentTerms
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class PaymentTermEnum extends Enum
{
    const MONTHLY = 1;
    const YEARLY = 12;
    const BIYEARLY = 24;
}
