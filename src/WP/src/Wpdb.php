<?php

declare(strict_types=1);

namespace WP;

final class Wpdb
{
    public const OBJECT = 0;
    public const ARRAY_A = 1;
    public const ARRAY_N = 2;
    public const ASSOC = 3;

    private array $mockData = [];

    public function setMockData(array $data): void
    {
        $this->mockData = $data;
    }

    public function insert(string $table, array $data, array $format = []): int
    {
        // Simulate an insert operation and return a fake ID
        return rand(1, 1000);
    }
    public function update(string $table, array $data, array $where, array $format = []): int
    {
        // Simulate an update operation and return the number of affected rows
        return rand(1, 10);
    }
    public function delete(string $table, array $where, array $format = []): int
    {
        // Simulate a delete operation and return the number of affected rows
        return rand(1, 10);
    }

    public function get_results(string $query, int $output = self::OBJECT): array
    {
        return $this->mockData;
    }
}

