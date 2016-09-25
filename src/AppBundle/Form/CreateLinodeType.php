<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use AppBundle\Service\LinodeAvailService;
use AppBundle\Enum\PaymentTermEnum;
use AppBundle\Model\DataCenter;
use AppBundle\Model\LinodePlan;
use AppBundle\Transformer\ConstantToEnumTransformer;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class LinodeFormType
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class CreateLinodeType extends AbstractType
{
    /**
     * __construct
     *
     * @param LinodeApiService $availApi
     */
    public function __construct(LinodeAvailService $availApi)
    {
        $this->availApi = $availApi;
        $this->terms = array_values((new \ReflectionClass(PaymentTermEnum::class))->getConstants());
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
                'choices' => $this->availApi->getDataCenters(),
                'choice_label' => function (DataCenter $dataCenter) {
                    return $dataCenter->getLocation();
                }
            ))
            ->add('plan', ChoiceType::class, array(
                'label' => 'Plan',
                'choices' => $this->availApi->getPlans(),
                'choice_label' => function (LinodePlan $plan) {
                    return $plan->getLabel();
                }
            ))
            ->add('paymentTerm', ChoiceType::class, array(
                'label' => 'Payment Term',
                'choices' => $this->terms,
                'choice_label' => function($value, $key, $index) {
                    return sprintf("%d Months", $value);
                },
            ))
            ->add('submit', SubmitType::class);

        $builder->get('paymentTerm')
            ->addModelTransformer(new ConstantToEnumTransformer(PaymentTermEnum::class));
    }

    /**
     * undocumented function
     *
     * @return void
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'csrf_protection' => false,
        ));
    }

}
