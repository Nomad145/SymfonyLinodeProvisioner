<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use AppBundle\Service\LinodeAvailService;
use AppBundle\Enum\PaymentTerms;
use AppBundle\Model\DataCenter;
use AppBundle\Model\LinodePlan;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

/**
 * Class CreateLinodeFormType
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class CreateLinodeType extends AbstractType
{
    /**
     * __construct
     *
     * @param LinodeApiService $api
     */
    public function __construct(LinodeAvailService $api)
    {
        $this->api = $api;
        $this->terms = array_values((new \ReflectionClass(PaymentTerms::class))->getConstants());
    }

    /**
     * buildForm
     *
     * @param FormBuilderInterface $builder
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dataCenter', ChoiceType::class, array(
                'label' => 'Data Centers',
                'choices' => $this->api->getDataCenters(),
                'choice_label' => function (DataCenter $dataCenter) {
                    return $dataCenter->getLocation();
                }
            ))
            ->add('plans', ChoiceType::class, array(
                'label' => 'Plans',
                'choices' => $this->api->getPlans(),
                'choice_label' => function (LinodePlan $plan) {
                    return $plan->getLabel();
                }
            ))
            ->add('paymentTerm', ChoiceType::class, array(
                'label' => 'Payment Term',
                'choices' => $this->terms,
                'choice_label' => function($value, $key, $index) {
                    return sprintf("%d Months", $value);
                }
            ))
            ->add('submit', SubmitType::class);
    }
}
