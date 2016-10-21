<?php

namespace AppBundle\Service;

use Ssh\Session;
use AppBundle\Model\MigrateConfig;

/**
 * Class ProvisionService
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class ProvisionService
{
    /** @var Session */
    protected $session;

    /** @var MigrateConfig */
    protected $config;

    /**
     * __construct
     *
     * @param Session $session
     */
    public function __construct(Session $session, MigrateConfig $config)
    {
        $this->session = $session;
        $this->config = $config;
    }

    /**
     * pushScript
     *
     * Takes a path and dest.
     *
     * @param string $path
     * @param string $dest
     */
    public function pushScript($path, $dest)
    {
        $this->session->getSftp()->send($path, $dest);
        return $this;
    }

    /**
     * executeScript
     *
     * @param string $path
     */
    public function executeScript($path)
    {
        $this->session->getExec()
            ->run("/bin/bash $path " . (string)$this->config);

        return $this;
    }
}
