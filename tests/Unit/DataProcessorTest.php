<?php

declare(strict_types=1);

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

use function App\Services\countCyrillicALetters;
use function App\Services\lastThreeWords;
use function App\Services\shiftArrayRight;

class DataProcessorTest extends TestCase
{
    public function test_shifts_numbers_right_by_one_position(): void
    {
        $this->assertSame([1, 12, 4, 9], shiftArrayRight([12, 4, 9, 1]));
    }

    public function test_shifting_an_empty_array_returns_an_empty_array(): void
    {
        $this->assertSame([], shiftArrayRight([]));
    }

    public function test_returns_the_last_three_words_in_original_order(): void
    {
        $this->assertSame(
            ['клавіатура,', 'миша,', 'відеокарта'],
            lastThreeWords('Монітор, клавіатура, миша, відеокарта')
        );
    }

    public function test_returns_available_words_when_text_has_fewer_than_three(): void
    {
        $this->assertSame(['Один', 'два'], lastThreeWords('Один   два'));
    }

    public function test_counts_cyrillic_a_case_insensitively(): void
    {
        $this->assertSame(4, countCyrillicALetters('Аа, аксесуари'));
    }

    public function test_does_not_count_latin_a_as_cyrillic_a(): void
    {
        $this->assertSame(0, countCyrillicALetters('Laptop and monitor'));
    }
}
