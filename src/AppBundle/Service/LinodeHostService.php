<?php

namespace AppBundle\Service;

use AppBundle\Factory\LinodeFactory;
use AppBundle\Model\Linode;
use Doctrine\Common\Collections\ArrayCollection;
use AppBundle\Model\DataCenter;
use AppBundle\Enum\PaymentTermEnum;
use AppBundle\Model\LinodePlan;

/**
 * Class LinodeHostService
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class LinodeHostService
{
    /** @var LinodeApiService $api */
    protected $api;

    /**
     * __construct
     *
     * @param LinodeApiService
     */
    public function __construct(LinodeApiService $api)
    {
        $this->api = $api->get('LinodeApi');
    }

    public function getLinodes($linodeId = null)
    {
        $linodes = new ArrayCollection(
            array_map(function ($linode) {
                return Linode::createFromArray($linode);
            }, $this->api->getList($linodeId))
        );

        return $linodes;
    }

    /**
     * createLinode
     *
     * @param DataCenter $dataCenter
     * @param Plan $plan
     * @param PaymentTermEnum $paymentTerm
     * @return array
     */
    public function createLinode(DataCenter $dataCenter, LinodePlan $plan, PaymentTermEnum $paymentTerm)
    {
        return $this->api->create($dataCenter->getId(), $plan->getId(), $paymentTerm->getValue());
    }

    /**
     * cloneLinode
     *
     * @return array
     */
    public function cloneLinode(Linode $linode, DataCenter $dataCenter, LinodePlan $plan, PaymentTermEnum $paymentTerm)
    {
        return $this->api->duplicate($linode->getId(), $dataCenter->getId(), $plan->getId(), $paymentTerm->getValue());
    }

    /**
     * updateLinode function
     *
     * @param Linode $linode
     * @return array
     */
    public function updateLinode(Linode $linode)
    {
        return $this->api->update($linode->getId(), $linode->getLabel());
    }

}
