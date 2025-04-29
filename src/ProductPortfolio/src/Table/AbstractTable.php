<?php

declare(strict_types=1);

namespace PP\Table;

use PP\EntityInterface;

abstract class AbstractTable
{
    public function __construct(
        protected \WP\Wpdb $wpdb,
        protected EntityInterface $entity
    ) {
    }
}
