<?php

namespace AppBundle\Model;

/**
 * Class LinodePlan
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class LinodePlan
{
    /** @var int */
    protected $id;

    /** @var int */
    protected $cores;

    /** @var float */
    protected $price;

    /** @var int */
    protected $ram;

    /** @var int */
    protected $xfer;

    /** @var string */
    protected $label;

    /** @var array */
    protected $avail;

    /** @var int */
    protected $disk;

    /** @var float */
    protected $hourly;

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
     * Get cores
     *
     * @return $cores
     */
    public function getCores()
    {
        return $this->cores;
    }

    /**
     * Set cores
     *
     * @param $cores
     * @return $this
     */
    public function setCores($cores)
    {
        $this->cores = $cores;
        return $this;
    }

    /**
     * Get price
     *
     * @return $price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set price
     *
     * @param $price
     * @return $this
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * Get ram
     *
     * @return $ram
     */
    public function getRam()
    {
        return $this->ram;
    }

    /**
     * Set ram
     *
     * @param $ram
     * @return $this
     */
    public function setRam($ram)
    {
        $this->ram = $ram;
        return $this;
    }

    /**
     * Get xfer
     *
     * @return $xfer
     */
    public function getXfer()
    {
        return $this->xfer;
    }

    /**
     * Set xfer
     *
     * @param $xfer
     * @return $this
     */
    public function setXfer($xfer)
    {
        $this->xfer = $xfer;
        return $this;
    }

    /**
     * Get label
     *
     * @return $label
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set label
     *
     * @param $label
     * @return $this
     */
    public function setLabel($label)
    {
        $this->label = $label;
        return $this;
    }

    /**
     * Get avail
     *
     * @return $avail
     */
    public function getAvail()
    {
        return $this->avail;
    }

    /**
     * Set avail
     *
     * @param $avail
     * @return $this
     */
    public function setAvail($avail)
    {
        $this->avail = $avail;
        return $this;
    }

    /**
     * Get disk
     *
     * @return $disk
     */
    public function getDisk()
    {
        return $this->disk;
    }

    /**
     * Set disk
     *
     * @param $disk
     * @return $this
     */
    public function setDisk($disk)
    {
        $this->disk = $disk;
        return $this;
    }

    /**
     * Get hourly
     *
     * @return $hourly
     */
    public function getHourly()
    {
        return $this->hourly;
    }

    /**
     * Set hourly
     *
     * @param $hourly
     * @return $this
     */
    public function setHourly($hourly)
    {
        $this->hourly = $hourly;
        return $this;
    }

    /**
     * createFromArray
     *
     * @return LinodePlan
     */
    public function createFromArray(array $data)
    {
        return (new LinodePlan())
            ->setId($data['PLANID'])
            ->setPrice($data['PRICE'])
            ->setRam($data['RAM'])
            ->setXfer($data['XFER'])
            ->setLabel($data['LABEL'])
            ->setAvail($data['AVAIL'])
            ->setDisk($data['DISK'])
            ->setHourly($data['HOURLY']);
    }
}
