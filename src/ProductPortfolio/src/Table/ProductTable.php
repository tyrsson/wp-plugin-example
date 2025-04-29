<?php

declare(strict_types=1);

namespace PP\Table;

use PP\Entity\Product;

final class ProductTable extends AbstractTable
{
    public function __construct(
        Product $entity
    ) {
        parent::__construct($entity);
    }
    public function getProduct()
    {
        $this->wpdb->setMockData(
            ['id' => 2, 'name' => 'Product 2', 'price' => 200],
        );
        $result = $this->wpdb->get_results("SELECT * FROM products", $this->wpdb::ARRAY_A);
        $this->entity->exchangeArray($result);
        return $this->entity;
    }
}
