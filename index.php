<?php

declare(strict_types=1);

use Exception;
use Faker\Factory;

use function App\Services\applyDiscount;
use function App\Services\calculateLineTotal;
use function App\Services\countCyrillicALetters;
use function App\Services\lastThreeWords;
use function App\Services\shiftArrayRight;

require_once __DIR__.'/vendor/autoload.php';

$faker = Factory::create();
$prices = [];

for ($index = 0; $index < 10; $index++) {
    $prices[] = $faker->randomFloat(2, 100, 5000);
}

$minThreshold = 1000.0;
$filteredPrices = array_values(array_filter(
    $prices,
    static function (float $price) use ($minThreshold): bool {
        return $price >= $minThreshold;
    }
));

$lineTotal = calculateLineTotal(749.99, 2);
$numbers = [12, 4, 9, 1];
$shiftedNumbers = shiftArrayRight($numbers);
$text = 'Монітор, клавіатура, миша, відеокарта';
$lastThreeWords = lastThreeWords($text);
$letterSample = 'Аа, аксесуари';
$letterCount = countCyrillicALetters($letterSample);
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Основи PHP — інтернет-магазин техніки</title>
</head>
<body>
    <main>
        <h1>Лабораторна робота №3: інтернет-магазин комп’ютерної техніки</h1>

        <?php require __DIR__.'/app/Models/EntityArray.php'; ?>

        <section>
            <h2>Типізовані операції</h2>
            <p>Вартість 2 товарів по 749,99: <?= number_format($lineTotal, 2, ',', ' ') ?> грн</p>
            <?php
try {
    applyDiscount(749.99, 150);
} catch (Exception $exception) {
    echo '<p>Помилка знижки: '
        .htmlspecialchars($exception->getMessage(), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8')
        .'</p>';
} finally {
    echo '<p>Завершення спроби розрахунку.</p>';
}
?>
        </section>

        <section>
            <h2>Тестові ціни Faker</h2>
            <p>Згенеровано 10 цін; поріг відбору: <?= number_format($minThreshold, 2, ',', ' ') ?> грн.</p>
            <h3>Усі ціни</h3>
            <ul>
                <?php foreach ($prices as $price) { ?>
                    <li><?= number_format($price, 2, ',', ' ') ?> грн</li>
                <?php } ?>
            </ul>
            <h3>Ціни від порога</h3>
            <ul>
                <?php foreach ($filteredPrices as $price) { ?>
                    <li><?= number_format($price, 2, ',', ' ') ?> грн</li>
                <?php } ?>
            </ul>
        </section>

        <section>
            <h2>Алгоритмічні завдання — варіант 12</h2>
            <p>
                Циклічний зсув вправо:
                [<?= implode(', ', $numbers) ?>] →
                [<?= implode(', ', $shiftedNumbers) ?>]
            </p>
            <p>Текст: <?= htmlspecialchars($text, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></p>
            <p>
                Три останні слова:
                <?= htmlspecialchars(implode(', ', $lastThreeWords), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?>
            </p>
            <p>
                Кількість кириличних літер «а» у «<?= htmlspecialchars($letterSample, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?>»:
                <?= $letterCount ?>
            </p>
        </section>
    </main>
</body>
</html>