<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Ip;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Model\MigrateConfig;

/**
 * Class MigrateConfigType
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class MigrateType extends AbstractType
{
    /**
     * @inherit
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('domain')
            ->add('hostname')
            ->add('ipv4', TextType::class, array(
                'constraints' => new Ip(array('version' => 4))
            ))
            ->add('ipv6', TextType::class, array(
                'constraints' => new Ip(array('version' => 6))
            ))
            ->add('longviewUrl')
            ->add('longviewKey')
            ->add('mandrillKey')
            ->add('mandrillSub')
            ->add('submit', SubmitType::class);
    }

    /**
     * undocumented function
     *
     * @return void
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => MigrateConfig::class,
            'csrf_protection' => false
        ));
    }
}
