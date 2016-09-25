<?php

namespace AppBundle\Service;

use Doctrine\Common\Collections\ArrayCollection;
use AppBundle\Model\DataCenter;
use AppBundle\Model\LinodePlan;

/**
 * Class LinodeAvailService
 * @author Michael Phillips <michaeljoelphillips@gmailcom>
 */
class LinodeAvailService
{
    /** @var LinodeApi */
    protected $api;

    /**
     * __construct
     *
     * @param LinodeApi $api
     */
    public function __construct(LinodeApiService $api)
    {
        $this->api = $api->get('AvailApi');
    }

    /**
     * getDataCenters
     *
     * @return ArrayCollection|DataCenter[]
     */
    public function getDataCenters()
    {
        return new ArrayCollection(
            array_map(function(array $data) {
                return DataCenter::createFromArray($data);
            }, $this->api->dataCenters())
        );
    }

    /**
     * getPlans
     *
     * @return ArrayCollection|Plan[]
     */
    public function getPlans()
    {
        return new ArrayCollection(
            array_map(function(array $data) {
                return LinodePlan::createFromArray($data);
            }, $this->api->linodePlans())
        );
    }
}
