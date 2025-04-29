<?php

declare(strict_types=1);

namespace PP;

use PP\Entity\Product;
use PP\Table\ProductTable;
use Tracy\Debugger;

final class Plugin
{
    public function __construct(private ProductTable $productTable) {}

    public function run(): void
    {
        // Plugin logic goes here
        $product = $this->productTable->getProduct();
        Debugger::dump($product->id);
        Debugger::dump($product->name);
        Debugger::dump($product->price);
        Debugger::dump($product->getArrayCopy());
    }
}
