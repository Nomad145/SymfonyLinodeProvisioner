<?php

namespace AppBundle\ParamConverter;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use AppBundle\Service\LinodeHostService;
use AppBundle\Model\Linode;

/**
 * Class LinodeConverter
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class LinodeConverter implements ParamConverterInterface
{
    /** @var LinodeHostService */
    protected $api;

    /**
     * __construct
     *
     * @param LinodeHostService $api
     */
    public function __construct(LinodeHostService $api) {
        $this->api = $api;
    }

    /**
     * @inherit
     */
    public function apply(Request $request, ParamConverter $config)
    {
        $param = $config->getName();

        if (!$request->attributes->has($param)) {
            return false;
        }

        $id = $request->attributes->get($param);

        if (!$id && $configuration->isOptional()) {
            return false;
        }

        $request->attributes->set($param, $this->api->getLinodes($id)->first());
        return true;
    }

    /**
     * @inherit
     */
    public function supports(ParamConverter $config)
    {
        return Linode::class === $config->getClass();
    }
}
