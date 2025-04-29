<?php

declare(strict_types=1);

namespace PP;

use Psr\Container\ContainerInterface;

final class PluginFactory
{
    public function __invoke(ContainerInterface $container): Plugin
    {
        return new Plugin($container->get(\PP\Table\ProductTable::class));
    }
}
