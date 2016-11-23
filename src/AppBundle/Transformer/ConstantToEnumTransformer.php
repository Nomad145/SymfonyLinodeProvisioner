<?php

namespace AppBundle\Transformer;

use Symfony\Component\Form\DataTransformerInterface;

/**
 * Class ConstantToEnumTransformer
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class ConstantToEnumTransformer implements DataTransformerInterface
{
    /**
     * __construct
     */
    public function __construct($class= "")
    {
        $this->class = $class;
    }

    /**
     * transform
     *
     * @param mixed
     * @return mixed
     */
    public function transform($enum)
    {
        return $enum == null ? null : $enum->getValue();
    }

    /**
     * reverseTransform
     *
     * @param mixed
     * @return mixed
     */
    public function reverseTransform($value)
    {
        return $value == null ? : new $this->class($value);
    }
}
