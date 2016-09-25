<?php

namespace AppBundle\Model;

/**
 * Class DataCenter
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class DataCenter
{
    /** @var int $id */
    protected $id;

    /** @var string $location */
    protected $location;

    /** @var string $abbreviation */
    protected $abbreviation;

    /**
     * Get id
     *
     * @return $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set id
     *
     * @param $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get location
     *
     * @return $location
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set location
     *
     * @param $location
     * @return $this
     */
    public function setLocation($location)
    {
        $this->location = $location;
        return $this;
    }

    /**
     * Get abbreviation
     *
     * @return $abbreviation
     */
    public function getAbbreviation()
    {
        return $this->abbreviation;
    }

    /**
     * Set abbreviation
     *
     * @param $abbreviation
     * @return $this
     */
    public function setAbbreviation($abbreviation)
    {
        $this->abbreviation = $abbreviation;
        return $this;
    }

    public static function createFromArray(array $data)
    {
        return (new DataCenter())
            ->setId($data['DATACENTERID'])
            ->setLocation($data['LOCATION'])
            ->setAbbreviation($data['ABBR']);
    }
}
