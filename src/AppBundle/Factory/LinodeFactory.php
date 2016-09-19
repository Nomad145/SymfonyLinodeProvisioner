<?php

namespace AppBundle\Factory;

use AppBundle\Model\Linode;

/**
 * Class LinodeFactory
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class LinodeFactory
{
    public static function createFromArray(array $data)
    {
        return (new Linode())
            ->setLinodeId($data['LINODEID'])
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
