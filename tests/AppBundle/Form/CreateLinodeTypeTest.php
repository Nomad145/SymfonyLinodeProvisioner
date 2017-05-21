<?php

namespace AppBundle\Form;

use Symfony\Component\Form\Test\TypeTestCase;
use AppBundle\Form\LinodeType;
use AppBundle\Model\DataCenter;
use AppBundle\Enum\PaymentTermEnum;
use AppBundle\Form\CreateLinodeType;
use AppBundle\Model\LinodePlan;
use AppBundle\Service\LinodeAvailService;
use Symfony\Component\Form\PreloadedExtension;

/**
 * Class CreateLinodeTypeTest
 * @author Michael Phillips <michael.phillips@manpow.com>
 */
class CreateLinodeTypeTest extends TypeTestCase
{
    public function setUp()
    {
        $this->availApi = $this->createMock(LinodeAvailService::class);
        parent::setUp();
    }

    public function getExtensions()
    {
        $type = new CreateLinodeType($this->availApi);

        return array(
            new PreloadedExtension(array($type), array()),
        );
    }

    public function testLinodeType()
    {
        $this->availApi
            ->method('getDataCenters')
            ->willReturn([
                (new DataCenter)->setLocation('Test Location')
            ]);

        $this->availApi
            ->method('getPlans')
            ->willReturn([
                (new LinodePlan)->setLabel('Test Plan')
            ]);

        $data = [
            'dataCenter' => 0,
            'plan' => 0,
            'paymentTerm' => 1
        ];

        $model = [
            'dataCenter' => (new DataCenter())->setLocation('Test Location'),
            'plan' => (new LinodePlan())->setLabel('Test Plan'),
            'paymentTerm' => PaymentTermEnum::MONTHLY()
        ];

        $form = $this->factory->create(CreateLinodeType::class);
        $form->submit($data);

        $this->assertTrue($form->isSynchronized());
        $this->assertEquals($model, $form->getData());

        $view = $form->createView();
        $children = $view->children;

        foreach (array_keys($data) as $key) {
            $this->assertArrayHasKey($key, $children);
        }
    }
}
