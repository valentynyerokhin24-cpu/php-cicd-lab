<?php

declare(strict_types=1);

namespace App\Services;

use InvalidArgumentException;

/**
 * @param  list<int>  $numbers
 * @return list<int>
 */
function shiftArrayRight(array $numbers): array
{
    if ($numbers === []) {
        return [];
    }

    $lastNumber = array_pop($numbers);
    array_unshift($numbers, $lastNumber);

    return $numbers;
}

/**
 * @return list<string>
 */
function lastThreeWords(string $text): array
{
    $text = trim($text);

    if ($text === '') {
        return [];
    }

    $words = preg_split('/\s+/u', $text);

    if ($words === false) {
        throw new InvalidArgumentException('Текст має бути закодований у UTF-8.');
    }

    return array_values(array_slice($words, -3));
}

function countCyrillicALetters(string $text): int
{
    $count = preg_match_all('/а/iu', $text);

    if ($count === false) {
        throw new InvalidArgumentException('Текст має бути закодований у UTF-8.');
    }

    return $count;
}
