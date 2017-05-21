<?php

namespace Tests\AppBundle\Form;

use AppBundle\Form\LinodeType;
use Symfony\Component\Form\Test\TypeTestCase;
use AppBundle\Model\Linode;

/**
 * Class LinodeTypeTest
 * @author Michael Phillips <michael.phillips@manpow.com>
 */
class LinodeTypeTest extends TypeTestCase
{
    public function testLinodeType()
    {
        $form = $this->factory->create(LinodeType::class);

        $data = [
            'label' => 'Test Linode',
            'backupsEnabled' => true,
        ];

        $object = (new Linode())
            ->setLabel('Test Linode')
            ->setBackupsEnabled(true);

        $form->submit($data);

        $this->assertTrue($form->isSynchronized());
        $this->assertEquals($object, $form->getData());

        $view = $form->createView();
        $children = $view->children;

        foreach (array_keys($data) as $key) {
            $this->assertArrayHasKey($key, $children);
        }
    }
}
