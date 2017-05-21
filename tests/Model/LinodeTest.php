<?php

namespace AppBundle\Tests\Model;

use AppBundle\Model\Linode;

/**
 * Class LinodeTest
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class LinodeTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->array = [
            'TOTALXFER' => 1000,
            'ALERT_BWQUOTA_ENABLED' => 1,
            'ALERT_DISKIO_ENABLED' => 1,
            'DISTRIBUTIONVENDOR' => 'Ubuntu',
            'ALERT_BWOUT_ENABLED' => 1,
            'ALERT_CPU_THRESHOLD' => 90,
            'LINODEID' => 411628,
            'ALERT_BWOUT_THRESHOLD' => 5,
            'BACKUPWINDOW' => 8,
            'DATACENTERID' => 2,
            'ALERT_BWIN_ENABLED' => 1,
            'STATUS' => 1,
            'PLANID' => 1,
            'LABEL' => 'BoichFamilyCellar',
            'ALERT_BWIN_THRESHOLD' => 5,
            'ALERT_CPU_ENABLED' => 1,
            'BACKUPSENABLED' => 1,
            'TOTALRAM' => 1024,
            'WATCHDOG' => 1,
            'CREATE_DT' => '2013-10-19 16:12:28.0',
            'ISKVM' => 1,
            'ALERT_BWQUOTA_THRESHOLD' => 80,
            'BACKUPWEEKLYDAY' => 0,
            'TOTALHD' => 20480,
            'LPM_DISPLAYGROUP' => 'clients',
            'ALERT_DISKIO_THRESHOLD' => 1000,
            'ISXEN' => 0,
        ];
    }

    public function testCreateFromArray()
    {
        $linode = Linode::createFromArray($this->array);

        $this->assertSame($linode->getId(), $this->array['LINODEID']);
        $this->assertSame($linode->getAlertCpuEnabled(), $this->array['ALERT_CPU_ENABLED']);
        $this->assertSame($linode->getIsKvm(), $this->array['ISKVM']);
        $this->assertSame($linode->getAlertBwinEnabled(), $this->array['ALERT_BWIN_ENABLED']);
        $this->assertSame($linode->getAlertBwQuotaEnabled(), $this->array['ALERT_BWQUOTA_ENABLED']);
        $this->assertSame($linode->getAlertDiskIoThreshold(), $this->array['ALERT_DISKIO_THRESHOLD']);
        $this->assertSame($linode->getBackupWindow(), $this->array['BACKUPWINDOW']);
        $this->assertSame($linode->getIsWatchdog(), $this->array['WATCHDOG']);
        $this->assertSame($linode->getDistributionVendor(), $this->array['DISTRIBUTIONVENDOR']);
        $this->assertSame($linode->getDataCenterId(), $this->array['DATACENTERID']);
        $this->assertSame($linode->getStatus(), $this->array['STATUS']);
        $this->assertSame($linode->getAlertDiskIoEnabled(), $this->array['ALERT_DISKIO_ENABLED']);
        $this->assertSame($linode->getCreateDate(), $this->array['CREATE_DT']);
        $this->assertSame($linode->getAlertBwQuotaThreshold(), $this->array['TOTALHD']);
        $this->assertSame($linode->getTotalRam(), $this->array['ALERT_BWQUOTA_THRESHOLD']);
        $this->assertSame($linode->getTotalHd(), $this->array['TOTALRAM']);
        $this->assertSame($linode->getIsXen(), $this->array['ISXEN']);
        $this->assertSame($linode->getAlertBwinThreshold(), $this->array['ALERT_BWIN_THRESHOLD']);
        $this->assertSame($linode->getAlertBwoutThreshold(), $this->array['ALERT_BWOUT_THRESHOLD']);
        $this->assertSame($linode->getAlertBwoutEnabled(), $this->array['ALERT_BWOUT_ENABLED']);
        $this->assertSame($linode->getBackupsEnabled(), $this->array['BACKUPSENABLED']);
        $this->assertSame($linode->getAlertCpuThreshold(), $this->array['ALERT_CPU_THRESHOLD']);
        $this->assertSame($linode->getPlanId(), $this->array['PLANID']);
        $this->assertSame($linode->getBackupWeeklyDay(), $this->array['BACKUPWEEKLYDAY']);
        $this->assertSame($linode->getLabel(), $this->array['LABEL']);
        $this->assertSame($linode->getLpmDisplayGroup(), $this->array['LPM_DISPLAYGROUP']);
        $this->assertSame($linode->getTotalXfer(), $this->array['TOTALXFER']);
    }
}
