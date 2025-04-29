<?php

declare(strict_types=1);

namespace PP\Entity;

use Laminas\Stdlib\ArrayObject;
use PP\EntityInterface;
use Laminas\InputFilter\InputFilterAwareInterface;
use Laminas\InputFilter\InputFilterAwareTrait;
use Laminas\InputFilter\InputFilterInterface;

abstract class AbstractEntity extends ArrayObject implements EntityInterface, InputFilterAwareInterface
{
    protected InputFilterInterface $inputFilter;

    public function __construct(array $data = [])
    {
        parent::__construct(flags: ArrayObject::ARRAY_AS_PROPS);
        if ($data !== []) {
            $this->exchangeArray($data);
        }
    }

    public function setInputFilter($inputFilter): void
    {
        throw new \RuntimeException('Setting input filter is not supported');
    }

    public function exchangeArray($data): void
    {
        $filter = $this->getInputFilter();
        $filter->setData($data);
        if ($filter->isValid()) {
            parent::exchangeArray($filter->getValues());
        } else {
            throw new \RuntimeException('Invalid data provided');
        }
    }
}
