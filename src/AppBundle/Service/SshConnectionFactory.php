<?php

namespace AppBundle\Service;

use AppBundle\Model\MigrateConfig;
use Ssh\Session;
use Ssh\Configuration;
use Ssh\Authentication\Password;

/**
 * Class SshConnectionFactory
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class SshConnectionFactory
{
    /** @var string */
    protected $username;

    /** @var string */
    protected $password;

    /** @var string */
    protected $port;

    /**
     * __construct
     *
     * Username and password injected from configuration.  Can/maybe should
     * be extended to accept varying usernames and passwords.
     *
     * @param string $username
     * @param string $password
     */
    public function __construct($username, $password, $port)
    {
        $this->username = $username;
        $this->password = $password;
        $this->port = $port;
    }

    /**
     * createSession
     *
     * @param string $address
     * @return \Ssh\Session
     */
    public function createSession($address)
    {
        return new Session(
            new Configuration($address, $this->port),
            new Password($this->username, $this->password)
        );
    }
}
