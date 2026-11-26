<?php

declare(strict_types=1);

namespace App\Services;

use InvalidArgumentException;

function calculateLineTotal(float $unitPrice, int $quantity): float
{
    if ($unitPrice < 0) {
        throw new InvalidArgumentException('Ціна не може бути від’ємною.');
    }

    if ($quantity < 1) {
        throw new InvalidArgumentException('Кількість має бути більшою за нуль.');
    }

    return $unitPrice * $quantity;
}

function applyDiscount(float $price, float $discount): float
{
    if ($price < 0) {
        throw new InvalidArgumentException('Ціна не може бути від’ємною.');
    }

    if ($discount < 0 || $discount > 100) {
        throw new \Exception('Неприпустиме значення знижки!');
    }

    return $price - ($price * ($discount / 100));
}
