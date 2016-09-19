<?php

namespace AppBundle\Service;

/**
 * Class LinodeApiService
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class LinodeApiService
{
    /** @var string $key */
    protected $key;

    /**
     * __construct
     *
     * @param string $key
     */
    public function __construct($key)
    {
        $this->key = $key;
    }

    /**
     * get
     *
     * Used to return an instance of the many LinodeApi classes.
     *
     * @param string $name
     * @param null $arguments
     * @return mixed
     * @throws LinodeException
     */
    public function get($name)
    {
        $class = "Linode\\" . ucfirst($name);

        if (!(new \ReflectionClass($class))->isInstantiable()) {
            throw new LinodeClassNameException("Unable to instantiate $class.");
        }

        return new $class($this->key);
    }
}
