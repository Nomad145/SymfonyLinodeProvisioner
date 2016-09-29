<?php

namespace AppBundle\Service;

use AppBundle\Service\LinodeApiService;
use Doctrine\Common\Collections\ArrayCollection;
use AppBundle\Model\IpAddress;

/**
 * Class LinodeIpService
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class LinodeIpService
{
    /** @var LinodeApiService $api */
    protected $api;

    /**
     * __construct
     * @param LinodeApiService $api
     */
    public function __construct(LinodeApiService $api)
    {
        $this->api = $api->get('Linode\\IpApi');
    }

    /**
     * getIpAddresses
     *
     * @return ArrayCollection|IpAddress[]
     */
    public function getIpAddresses($linodeId = null, $ipId = null)
    {
        return new ArrayCollection(
            array_map(function (array $data) {
                return IpAddress::createFromArray($data);
            }, $this->api->getList($linodeId, $ipId))
        );
    }
}
