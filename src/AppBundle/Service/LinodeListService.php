<?php

namespace AppBundle\Service;

use AppBundle\Factory\LinodeFactory;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class LinodeListService
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class LinodeListService
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

    public function getList($linodeId = null)
    {
        $linodes = new ArrayCollection(
            array_map(function ($linode) {
                return LinodeFactory::createFromArray($linode);
            }, $this->api->getList($linodeId))
        );

        return $linodes;
    }
}
