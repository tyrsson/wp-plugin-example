<?php

declare(strict_types=1);

namespace PP;

use WP\Wpdb;

final class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => [
                'factories' => [
                    Plugin::class => PluginFactory::class,
                    Table\ProductTable::class => Table\ProductTableFactory::class,
                ],
                'invokables' => [
                    Wpdb::class => Wpdb::class,
                ],
            ],
        ];
    }
}
