<?php

namespace AppBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use AppBundle\Service\LinodeAvailService;
use AppBundle\Service\LinodeHostService;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use AppBundle\Model\Linode;

/**
 * Class CloneFormType
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class CloneType extends CreateLinodeType
{
    /**
     * __construct
     *
     * @param LinodeAvailService
     * @param LinodeHostService
     */
    public function __construct(LinodeAvailService $availApi, LinodeHostService $hostApi)
    {
        parent::__construct($availApi);
        $this->hostApi = $hostApi;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('linode', LinodeType::class, array(
            'label' => 'New Linode'
            ))
            ->add('clone', ChoiceType::class, array(
                'label' => "Clone",
                'choices' => $this->hostApi->getLinodes(),
                'choice_label' => function (Linode $linode) {
                    return $linode->getLabel();
                }
            ));

        parent::buildForm($builder, $options);
    }
}
