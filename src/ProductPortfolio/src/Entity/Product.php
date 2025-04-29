<?php

declare(strict_types=1);

namespace PP\Entity;

final class Product extends AbstractEntity
{
    public function getInputFilter()
    {
        $inputFilter = new \Laminas\InputFilter\InputFilter();
        $inputFilter->add([
            'name' => 'id',
            'required' => false,
            'filters' => [
                ['name' => 'Int'],
            ],
        ]);
        $inputFilter->add([
            'name' => 'name',
            'required' => true,
            'filters' => [
                ['name' => 'StringTrim'],
                ['name' => 'StripTags'],
            ],
        ]);
        $inputFilter->add([
            'name' => 'price',
            'required' => true,
            'filters' => [
                ['name' => 'Int'],
            ],
        ]);
        return $inputFilter;
    }
}
