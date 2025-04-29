<?php

declare(strict_types=1);

namespace PP\Table;

use Laminas\Stdlib\ArrayUtils;
use PP\EntityInterface;

/**
 * This is here so your IDE can understand the methods available on $this->wpdb
 *
 * @method \wpdb get_results(string $query, int $output = OBJECT)
 */
abstract class AbstractTable
{
    protected $wpdb;

    public function __construct(
        protected ?EntityInterface $entity = null
    ) {
        // This is here to replive the global $wpdb variable
        $this->wpdb = $GLOBALS['wpdb'];
    }

    /**
     * We override the __call method to allow us to call methods on the $wpdb object
     * Note that if a method is defined in this class, it will be called instead of the __call method
     * @param mixed $name
     * @param mixed $arguments
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        $result = $this->wpdb->$name(...$arguments);
        if ($this->entity !== null && ArrayUtils::hasStringKeys($result)) {
            $this->entity->exchangeArray($result);
            return $this->entity;
        }
        return $result;
    }
}
