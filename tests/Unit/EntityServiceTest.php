<?php

declare(strict_types=1);

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

use function App\Services\applyDiscount;
use function App\Services\calculateLineTotal;

class EntityServiceTest extends TestCase
{
    public function test_calculates_line_total(): void
    {
        $this->assertEqualsWithDelta(1499.98, calculateLineTotal(749.99, 2), 0.00001);
    }

    public function test_rejects_non_positive_quantity(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        calculateLineTotal(10.0, 0);
    }

    public function test_applies_discount(): void
    {
        $this->assertEqualsWithDelta(90.0, applyDiscount(100.0, 10.0), 0.00001);
    }

    public function test_rejects_discount_above_one_hundred_percent(): void
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Неприпустиме значення знижки!');

        applyDiscount(100.0, 150.0);
    }
}
