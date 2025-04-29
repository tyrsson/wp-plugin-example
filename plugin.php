<?php

declare(strict_types=1);

use Tracy\Debugger;

require 'vendor/autoload.php';

Debugger::enable();

/**
 * Self-called anonymous function that creates its own scope and keeps the global namespace clean.
 */
(function () {

    /** @var \Psr\Container\ContainerInterface $container */
    $container = require 'config/container.php';

    $plugin    = $container->get(\PP\Plugin::class);

    // This is a WordPress global variable, so we need to declare it as global to simulate the WordPress environment.
    // In a real WordPress plugin, you would not need to do this, as WordPress would provide the $wpdb variable.


    $plugin->run();
})();
