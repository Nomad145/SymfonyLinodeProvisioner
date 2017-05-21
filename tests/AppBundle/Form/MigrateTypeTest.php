<?php

namespace AppBundle\Form;

use Symfony\Component\Form\Test\TypeTestCase;
use AppBundle\Form\MigrateType;
use AppBundle\Model\MigrateConfig;

/**
 * Class MigrateTypeTest
 * @author Michael Phillips <michael.phillips@manpow.com>
 */
class MigrateTypeTest extends TypeTestCase
{
    public function testMigrateType()
    {
        $form = $this->factory->create(MigrateType::class);

        $data = [
            'domain' => 'testdomain.com',
            'hostname' => 'test',
            'ipv4' => '127.0.0.1',
            'ipv6' => '::1',
            'longviewUrl' => 'longviewUrl',
            'longviewKey' => 'longviewKey',
            'mandrillKey' => 'mandrillKey',
            'mandrillSub' => 'mandrillSub',
            'submit' => 'submit',
        ];

        $object = (new MigrateConfig())
            ->setDomain('testdomain.com')
            ->setHostname('test')
            ->setIpv4('127.0.0.1')
            ->setIpv6('::1')
            ->setLongviewUrl('longviewUrl')
            ->setLongviewKey('longviewKey')
            ->setMandrillKey('mandrillKey')
            ->setMandrillSub('mandrillSub');


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
