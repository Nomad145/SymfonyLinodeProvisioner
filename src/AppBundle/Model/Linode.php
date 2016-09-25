<?php

namespace AppBundle\Model;

/**
 * Class Linode
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class Linode
{
    /** @var int */
    protected $Id;

    /** @var boolean */
    protected $alertCpuEnabled;

    /** @var boolean */
    protected $isKvm;

    /** @var boolean */
    protected $alertBwinEnabled;

    /** @var boolean */
    protected $alertBwQuotaEnabled;

    /** @var int */
    protected $alertDiskIoThreshold;

    /** @var int */
    protected $backupWindow;

    /** @var boolean */
    protected $isWatchdog;

    /** @var string */
    protected $distributionVendor;

    /** @var int */
    protected $dataCenterId;

    /** @var string */
    protected $status;

    /** @var boolean */
    protected $alertDiskIoEnabled;

    /** @var \DateTime */
    protected $createDate;

    /** @var int */
    protected $alertBwQuotaThreshold;

    /** @var int */
    protected $totalRam;

    /** @var int */
    protected $totalHd;

    /** @var boolean */
    protected $isXen;

    /** @var int */
    protected $alertBwinThreshold;

    /** @var int */
    protected $alertBwoutThreshold;

    /** @var int */
    protected $alertBwoutEnabled;

    /** * @var boolean */
    protected $backupsEnabled;

    /** @var int */
    protected $alertCpuThreshold;

    /** @var int */
    protected $planId;

    /** @var int */
    protected $backupWeeklyDay;

    /** @var string */
    protected $label;

    /** @var string */
    protected $LpmDisplayGroup;

    /** @var int */
    protected $totalXfer;

    /**
     * Get Id
     *
     * @return $Id
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * Set Id
     *
     * @param $Id
     * @return $this
     */
    public function setId($Id)
    {
        $this->Id = $Id;
        return $this;
    }

    /**
     * Get alertCpuEnabled
     *
     * @return $alertCpuEnabled
     */
    public function getAlertCpuEnabled()
    {
        return $this->alertCpuEnabled;
    }

    /**
     * Set alertCpuEnabled
     *
     * @param $alertCpuEnabled
     * @return $this
     */
    public function setAlertCpuEnabled($alertCpuEnabled)
    {
        $this->alertCpuEnabled = $alertCpuEnabled;
        return $this;
    }

    /**
     * Get isKvm
     *
     * @return $isKvm
     */
    public function getIsKvm()
    {
        return $this->isKvm;
    }

    /**
     * Set isKvm
     *
     * @param $isKvm
     * @return $this
     */
    public function setIsKvm($isKvm)
    {
        $this->isKvm = $isKvm;
        return $this;
    }

    /**
     * Get alertBwinEnabled
     *
     * @return $alertBwinEnabled
     */
    public function getAlertBwinEnabled()
    {
        return $this->alertBwinEnabled;
    }

    /**
     * Set alertBwinEnabled
     *
     * @param $alertBwinEnabled
     * @return $this
     */
    public function setAlertBwinEnabled($alertBwinEnabled)
    {
        $this->alertBwinEnabled = $alertBwinEnabled;
        return $this;
    }

    /**
     * Get alertBwQuotaEnabled
     *
     * @return $alertBwQuotaEnabled
     */
    public function getAlertBwQuotaEnabled()
    {
        return $this->alertBwQuotaEnabled;
    }

    /**
     * Set alertBwQuotaEnabled
     *
     * @param $alertBwQuotaEnabled
     * @return $this
     */
    public function setAlertBwQuotaEnabled($alertBwQuotaEnabled)
    {
        $this->alertBwQuotaEnabled = $alertBwQuotaEnabled;
        return $this;
    }

    /**
     * Get alertDiskIoThreshold
     *
     * @return $alertDiskIoThreshold
     */
    public function getAlertDiskIoThreshold()
    {
        return $this->alertDiskIoThreshold;
    }

    /**
     * Set alertDiskIoThreshold
     *
     * @param $alertDiskIoThreshold
     * @return $this
     */
    public function setAlertDiskIoThreshold($alertDiskIoThreshold)
    {
        $this->alertDiskIoThreshold = $alertDiskIoThreshold;
        return $this;
    }

    /**
     * Get backupWindow
     *
     * @return $backupWindow
     */
    public function getBackupWindow()
    {
        return $this->backupWindow;
    }

    /**
     * Set backupWindow
     *
     * @param $backupWindow
     * @return $this
     */
    public function setBackupWindow($backupWindow)
    {
        $this->backupWindow = $backupWindow;
        return $this;
    }

    /**
     * Get isWatchdog
     *
     * @return $isWatchdog
     */
    public function getIsWatchdog()
    {
        return $this->isWatchdog;
    }

    /**
     * Set isWatchdog
     *
     * @param $isWatchdog
     * @return $this
     */
    public function setIsWatchdog($isWatchdog)
    {
        $this->isWatchdog = $isWatchdog;
        return $this;
    }

    /**
     * Get distributionVendor
     *
     * @return $distributionVendor
     */
    public function getDistributionVendor()
    {
        return $this->distributionVendor;
    }

    /**
     * Set distributionVendor
     *
     * @param $distributionVendor
     * @return $this
     */
    public function setDistributionVendor($distributionVendor)
    {
        $this->distributionVendor = $distributionVendor;
        return $this;
    }

    /**
     * Get dataCenterId
     *
     * @return $dataCenterId
     */
    public function getDataCenterId()
    {
        return $this->dataCenterId;
    }

    /**
     * Set dataCenterId
     *
     * @param $dataCenterId
     * @return $this
     */
    public function setDataCenterId($dataCenterId)
    {
        $this->dataCenterId = $dataCenterId;
        return $this;
    }

    /**
     * Get status
     *
     * @return $status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set status
     *
     * @param $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Get alertDiskIoEnabled
     *
     * @return $alertDiskIoEnabled
     */
    public function getAlertDiskIoEnabled()
    {
        return $this->alertDiskIoEnabled;
    }

    /**
     * Set alertDiskIoEnabled
     *
     * @param $alertDiskIoEnabled
     * @return $this
     */
    public function setAlertDiskIoEnabled($alertDiskIoEnabled)
    {
        $this->alertDiskIoEnabled = $alertDiskIoEnabled;
        return $this;
    }

    /**
     * Get createDate
     *
     * @return $createDate
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }

    /**
     * Set createDate
     *
     * @param $createDate
     * @return $this
     */
    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;
        return $this;
    }

    /**
     * Get totalHd
     *
     * @return $totalHd
     */
    public function getTotalHd()
    {
        return $this->totalHd;
    }

    /**
     * Set totalHd
     *
     * @param $totalHd
     * @return $this
     */
    public function setTotalHd($totalHd)
    {
        $this->totalHd = $totalHd;
        return $this;
    }

    /**
     * Get isXen
     *
     * @return $isXen
     */
    public function getIsXen()
    {
        return $this->isXen;
    }

    /**
     * Set isXen
     *
     * @param $isXen
     * @return $this
     */
    public function setIsXen($isXen)
    {
        $this->isXen = $isXen;
        return $this;
    }

    /**
     * Get alertBwinThreshold
     *
     * @return $alertBwinThreshold
     */
    public function getAlertBwinThreshold()
    {
        return $this->alertBwinThreshold;
    }

    /**
     * Set alertBwinThreshold
     *
     * @param $alertBwinThreshold
     * @return $this
     */
    public function setAlertBwinThreshold($alertBwinThreshold)
    {
        $this->alertBwinThreshold = $alertBwinThreshold;
        return $this;
    }

    /**
     * Get alertBwoutThreshold
     *
     * @return $alertBwoutThreshold
     */
    public function getAlertBwoutThreshold()
    {
        return $this->alertBwoutThreshold;
    }

    /**
     * Set alertBwoutThreshold
     *
     * @param $alertBwoutThreshold
     * @return $this
     */
    public function setAlertBwoutThreshold($alertBwoutThreshold)
    {
        $this->alertBwoutThreshold = $alertBwoutThreshold;
        return $this;
    }

    /**
     * Get backupsEnabled
     *
     * @return $backupsEnabled
     */
    public function getBackupsEnabled()
    {
        return $this->backupsEnabled;
    }

    /**
     * Set backupsEnabled
     *
     * @param $backupsEnabled
     * @return $this
     */
    public function setBackupsEnabled($backupsEnabled)
    {
        $this->backupsEnabled = $backupsEnabled;
        return $this;
    }

    /**
     * Get alertCpuThreshold
     *
     * @return $alertCpuThreshold
     */
    public function getAlertCpuThreshold()
    {
        return $this->alertCpuThreshold;
    }

    /**
     * Set alertCpuThreshold
     *
     * @param $alertCpuThreshold
     * @return $this
     */
    public function setAlertCpuThreshold($alertCpuThreshold)
    {
        $this->alertCpuThreshold = $alertCpuThreshold;
        return $this;
    }

    /**
     * Get planId
     *
     * @return $planId
     */
    public function getPlanId()
    {
        return $this->planId;
    }

    /**
     * Set planId
     *
     * @param $planId
     * @return $this
     */
    public function setPlanId($planId)
    {
        $this->planId = $planId;
        return $this;
    }

    /**
     * Get backupWeeklyDay
     *
     * @return $backupWeeklyDay
     */
    public function getBackupWeeklyDay()
    {
        return $this->backupWeeklyDay;
    }

    /**
     * Set backupWeeklyDay
     *
     * @param $backupWeeklyDay
     * @return $this
     */
    public function setBackupWeeklyDay($backupWeeklyDay)
    {
        $this->backupWeeklyDay = $backupWeeklyDay;
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
     * Get LpmDisplayGroup
     *
     * @return $LpmDisplayGroup
     */
    public function getLpmDisplayGroup()
    {
        return $this->LpmDisplayGroup;
    }

    /**
     * Set LpmDisplayGroup
     *
     * @param $LpmDisplayGroup
     * @return $this
     */
    public function setLpmDisplayGroup($LpmDisplayGroup)
    {
        $this->LpmDisplayGroup = $LpmDisplayGroup;
        return $this;
    }

    /**
     * Get totalXfer
     *
     * @return $totalXfer
     */
    public function getTotalXfer()
    {
        return $this->totalXfer;
    }

    /**
     * Set totalXfer
     *
     * @param $totalXfer
     * @return $this
     */
    public function setTotalXfer($totalXfer)
    {
        $this->totalXfer = $totalXfer;
        return $this;
    }

    /**
     * Get alertBwQuotaThreshold
     *
     * @return $alertBwQuotaThreshold
     */
    public function getAlertBwQuotaThreshold()
    {
        return $this->alertBwQuotaThreshold;
    }

    /**
     * Set alertBwQuotaThreshold
     *
     * @param $alertBwQuotaThreshold
     * @return $this
     */
    public function setAlertBwQuotaThreshold($alertBwQuotaThreshold)
    {
        $this->alertBwQuotaThreshold = $alertBwQuotaThreshold;
        return $this;
    }

    /**
     * Get totalRam
     *
     * @return $totalRam
     */
    public function getTotalRam()
    {
        return $this->totalRam;
    }

    /**
     * Set totalRam
     *
     * @param $totalRam
     * @return $this
     */
    public function setTotalRam($totalRam)
    {
        $this->totalRam = $totalRam;
        return $this;
    }

    /**
     * Get alertBwoutEnabled
     *
     * @return $alertBwoutEnabled
     */
    public function getAlertBwoutEnabled()
    {
        return $this->alertBwoutEnabled;
    }

    /**
     * Set alertBwoutEnabled
     *
     * @param $alertBwoutEnabled
     * @return $this
     */
    public function setAlertBwoutEnabled($alertBwoutEnabled)
    {
        $this->alertBwoutEnabled = $alertBwoutEnabled;
        return $this;
    }

    /**
     * createFromArray
     *
     * FactoryMethod to create a Linode object from an array.
     *
     * @param array
     * @return Linode
     */
    public static function createFromArray(array $data)
    {
        return (new Linode())
            ->setId($data['LINODEID'])
            ->setAlertCpuEnabled($data['ALERT_CPU_ENABLED'])
            ->setIsKvm($data['ISKVM'])
            ->setAlertBwinEnabled($data['ALERT_BWIN_ENABLED'])
            ->setAlertBwQuotaEnabled($data['ALERT_BWQUOTA_ENABLED'])
            ->setAlertDiskIoThreshold($data['ALERT_DISKIO_THRESHOLD'])
            ->setBackupWindow($data['BACKUPWINDOW'])
            ->setIsWatchdog($data['WATCHDOG'])
            ->setDistributionVendor($data['DISTRIBUTIONVENDOR'])
            ->setDataCenterId($data['DATACENTERID'])
            ->setStatus($data['STATUS'])
            ->setAlertDiskIoEnabled($data['ALERT_DISKIO_ENABLED'])
            ->setCreateDate($data['CREATE_DT'])
            ->setAlertBwQuotaThreshold($data['TOTALHD'])
            ->setTotalRam($data['ALERT_BWQUOTA_THRESHOLD'])
            ->setTotalHd($data['TOTALRAM'])
            ->setIsXen($data['ISXEN'])
            ->setAlertBwinThreshold($data['ALERT_BWIN_THRESHOLD'])
            ->setAlertBwoutThreshold($data['ALERT_BWOUT_THRESHOLD'])
            ->setAlertBwoutEnabled($data['ALERT_BWOUT_ENABLED'])
            ->setBackupsEnabled($data['BACKUPSENABLED'])
            ->setAlertCpuThreshold($data['ALERT_CPU_THRESHOLD'])
            ->setPlanId($data['PLANID'])
            ->setBackupWeeklyDay($data['BACKUPWEEKLYDAY'])
            ->setLabel($data['LABEL'])
            ->setLpmDisplayGroup($data['LPM_DISPLAYGROUP'])
            ->setTotalXfer($data['TOTALXFER']);
    }
}
