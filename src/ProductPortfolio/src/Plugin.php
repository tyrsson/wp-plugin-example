<?php

declare(strict_types=1);

namespace PP;

use PP\Table\ProductTable;
use Tracy\Debugger;
use WP\Wpdb;

final class Plugin
{
    public function __construct(private ProductTable $productTable, private array $config = []) {}

    public function run(): void
    {
        // Plugin logic goes here, could be where you register hooks, etc.
        // I'm just using it to provide an example of some workflow.
        $product = $this->productTable->getProduct();
        Debugger::dump($product->id); // This dumps the Product entity's $this->storage['id']
        Debugger::dump($product->name); // This dumps the Product entity's $this->storage['name']
        Debugger::dump($product->price); // This dumps the Product entity's $this->storage['price']
        Debugger::dump($product->getArrayCopy()); // This dumps the Product entity's $storage array
        Debugger::dump($this->productTable->get_results("SELECT * FROM products", Wpdb::ARRAY_A)); // This dumps the Product Entity
        Debugger::dump($this->productTable->insert('products', ['name' => 'Product 3', 'price' => 300])); // This dumps a returned fake ID
        Debugger::dump($this->productTable->update('products', ['name' => 'Product 4', 'price' => 400], ['id' => 1])); // This dumps a returned fake number of affected rows
        Debugger::dump($this->config);
    }
}
