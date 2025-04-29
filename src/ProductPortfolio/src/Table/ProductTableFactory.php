<?php

declare(strict_types=1);

namespace PP\Table;

use PP\Entity\Product;
use Psr\Container\ContainerInterface;

final class ProductTableFactory
{
    public function __invoke(ContainerInterface $container): ProductTable
    {
        return new ProductTable(
            //$container->get(\WP\Wpdb::class),
            new Product(),
        );
    }
}
