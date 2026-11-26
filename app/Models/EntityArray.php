<?php

$categories = [
    'Accessories',
    'Graphics Cards',
    'Laptops',
    'Monitors',
    'Processors',
];

sort($categories, SORT_STRING);

$product = [
    'id' => 1001,
    'categoryId' => 2,
    'sku' => 'GPU-RTX-5070',
    'name' => 'Graphics card RTX 5070',
    'price' => 749.99,
    'stockQuantity' => 12,
    'isPublished' => true,
];
?>
<section>
    <h2>Категорії товарів</h2>
    <ul>
        <?php foreach ($categories as $category) { ?>
            <li><?= htmlspecialchars($category, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></li>
        <?php } ?>
    </ul>
</section>

<section>
    <h2>Приклад товару</h2>
    <ul>
        <?php foreach ($product as $attribute => $value) { ?>
            <li>
                <strong><?= htmlspecialchars($attribute, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?>:</strong>
                <?= htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?>
            </li>
        <?php } ?>
    </ul>
</section>
