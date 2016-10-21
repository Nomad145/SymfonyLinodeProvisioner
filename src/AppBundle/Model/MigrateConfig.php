<?php

namespace AppBundle\Model;

/**
 * Class MigrateConfig
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class MigrateConfig
{
    protected $domain;
    protected $hostname;
    protected $ipv4;
    protected $ipv6;
    protected $longviewUrl;
    protected $longviewKey;
    protected $mandrillKey;
    protected $mandrillSub;

    /**
     * Get domain
     *
     * @return $domain
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * Set domain
     *
     * @param $domain
     * @return $this
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;
        return $this;
    }

    /**
     * Get hostname
     *
     * @return $hostname
     */
    public function getHostname()
    {
        return $this->hostname;
    }

    /**
     * Set hostname
     *
     * @param $hostname
     * @return $this
     */
    public function setHostname($hostname)
    {
        $this->hostname = $hostname;
        return $this;
    }

    /**
     * Get ipv4
     *
     * @return $ipv4
     */
    public function getIpv4()
    {
        return $this->ipv4;
    }

    /**
     * Set ipv4
     *
     * @param $ipv4
     * @return $this
     */
    public function setIpv4($ipv4)
    {
        $this->ipv4 = $ipv4;
        return $this;
    }

    /**
     * Get ipv6
     *
     * @return $ipv6
     */
    public function getIpv6()
    {
        return $this->ipv6;
    }

    /**
     * Set ipv6
     *
     * @param $ipv6
     * @return $this
     */
    public function setIpv6($ipv6)
    {
        $this->ipv6 = $ipv6;
        return $this;
    }

    /**
     * Get longviewUrl
     *
     * @return $longviewUrl
     */
    public function getLongviewUrl()
    {
        return $this->longviewUrl;
    }

    /**
     * Set longviewUrl
     *
     * @param $longviewUrl
     * @return $this
     */
    public function setLongviewUrl($longviewUrl)
    {
        $this->longviewUrl = $longviewUrl;
        return $this;
    }

    /**
     * Get mandrillKey
     *
     * @return $mandrillKey
     */
    public function getMandrillKey()
    {
        return $this->mandrillKey;
    }

    /**
     * Set mandrillKey
     *
     * @param $mandrillKey
     * @return $this
     */
    public function setMandrillKey($mandrillKey)
    {
        $this->mandrillKey = $mandrillKey;
        return $this;
    }

    /**
     * Get mandrillSub
     *
     * @return $mandrillSub
     */
    public function getMandrillSub()
    {
        return $this->mandrillSub;
    }

    /**
     * Set mandrillSub
     *
     * @param $mandrillSub
     * @return $this
     */
    public function setMandrillSub($mandrillSub)
    {
        $this->mandrillSub = $mandrillSub;
        return $this;
    }

    /**
     * __toString
     *
     * @return string
     */
    public function __toString()
    {
        return sprintf("%s %s %s %s %s %s %s %s",
            $this->getDomain(),
            $this->getHostname(),
            $this->getIpv4(),
            $this->getIpv6(),
            $this->getLongviewUrl(),
            $this->getLongviewKey(),
            $this->getMandrillKey(),
            $this->getMandrillSub()
        );
    }

    /**
     * Get longviewKey
     *
     * @return $longviewKey
     */
    public function getLongviewKey()
    {
        return $this->longviewKey;
    }

    /**
     * Set longviewKey
     *
     * @param $longviewKey
     * @return $this
     */
    public function setLongviewKey($longviewKey)
    {
        $this->longviewKey = $longviewKey;
        return $this;
    }
}
