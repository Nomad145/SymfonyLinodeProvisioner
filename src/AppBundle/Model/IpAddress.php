<?php

namespace AppBundle\Model;

/**
 * Class IpAddress
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class IpAddress
{
    /** @var int */
    protected $linodeId;
    protected $isPublic;
    protected $ipAddress;
    protected $ipAddressId;
    protected $rdnsName;

    /**
     * Get linodeId
     *
     * @return $linodeId
     */
    public function getLinodeId()
    {
        return $this->linodeId;
    }

    /**
     * Set linodeId
     *
     * @param $linodeId
     * @return $this
     */
    public function setLinodeId($linodeId)
    {
        $this->linodeId = $linodeId;
        return $this;
    }

    /**
     * Get isPublic
     *
     * @return $isPublic
     */
    public function getIsPublic()
    {
        return $this->isPublic;
    }

    /**
     * Set isPublic
     *
     * @param $isPublic
     * @return $this
     */
    public function setIsPublic($isPublic)
    {
        $this->isPublic = $isPublic;
        return $this;
    }

    /**
     * Get ipAddress
     *
     * @return $ipAddress
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    /**
     * Set ipAddress
     *
     * @param $ipAddress
     * @return $this
     */
    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;
        return $this;
    }

    /**
     * Get ipAddressId
     *
     * @return $ipAddressId
     */
    public function getIpAddressId()
    {
        return $this->ipAddressId;
    }

    /**
     * Set ipAddressId
     *
     * @param $ipAddressId
     * @return $this
     */
    public function setIpAddressId($ipAddressId)
    {
        $this->ipAddressId = $ipAddressId;
        return $this;
    }

    /**
     * createFromArray
     *
     * @param array $data
     * @return IpAddress
     */
    public static function createFromArray(array $data)
    {
        return (new IpAddress())
            ->setLinodeId($data['LINODEID'])
            ->setIsPublic($data['ISPUBLIC'])
            ->setIpAddress($data['IPADDRESS'])
            ->setIpAddressId($data['IPADDRESSID']);
    }
    
}
