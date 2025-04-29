<?php

declare(strict_types=1);

namespace PP;

use Laminas\InputFilter\InputFilterAwareInterface;

interface EntityInterface
{
    public function exchangeArray($data): void;
    public function getArrayCopy();
}
