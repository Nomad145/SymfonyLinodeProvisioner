<?php

namespace AppBundle\Service;

use Linode\LinodeApi;

/**
 * Class LinodeHostService
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class LinodeHostService
{
    /** @var LinodeApi */
    protected $api;

    /**
     * __construct
     *
     * @param LinodeApi $api
     */
    public function __construct(LinodeApi $api)
    {
        $this->api = $api;
    }

    /**
     * create
     *
     * @param DataCenterEnum $dataCenter
     * @param PaymentTermEnum $paymentTerm
     * @return bool
     */
    public function create(DataCenterEnum $dataCenter, PlanEnum $plan, PaymentTermEnum $paymentTerm)
    {
        return $this->api->create($dataCenter->getValue(), $plan->getValue(), $paymentTerm->getValue());
    }
}
