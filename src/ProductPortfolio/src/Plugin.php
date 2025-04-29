<?php

declare(strict_types=1);

namespace PP;

use PP\Entity\Product;
use PP\Table\ProductTable;

final class Plugin
{
    public function __construct(private ProductTable $productTable) {}

    public function run(): void
    {
        // Plugin logic goes here
        \var_dump($this->productTable->getProduct());
    }
}
