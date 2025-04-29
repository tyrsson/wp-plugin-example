<?php

declare(strict_types=1);

use Tracy\Debugger;
use WP\Wpdb;

// you would need to replace this with require_once plugin_dir_path(__FILE__) . 'vendor/autoload.php';
require 'vendor/autoload.php';

Debugger::enable();

$GLOBALS['wpdb'] = new Wpdb(); // we have a use statement for this, but we need to declare it as global to simulate the WordPress environment

(function () {
    /** @var \Psr\Container\ContainerInterface $container */
    $container = require 'config/container.php'; // this is where we set up the container and the DI
    $plugin    = $container->get(\PP\Plugin::class); // this is where we get the plugin instance from the container
    $plugin->run(); // this is where we run the plugin, which will execute the logic in the Plugin class
})();
