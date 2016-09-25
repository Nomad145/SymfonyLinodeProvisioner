<?php

namespace AppBundle\Enum;

use MyCLabs\Enum\Enum;
use AppBundle\Enum\EnumInterface;

/**
 * Class PaymentTerms
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class PaymentTermEnum extends Enum implements EnumInterface
{
    const MONTHLY = 1;
    const YEARLY = 12;
    const BIYEARLY = 24;
}
