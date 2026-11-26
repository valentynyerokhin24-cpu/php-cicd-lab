# PHP CI/CD and Computer Store Lab

![PHP CI Application](https://github.com/valentynyerokhin24-cpu/php-cicd-lab/actions/workflows/php-ci.yml/badge.svg)

Навчальний PHP-проєкт для лабораторних робіт із Git, GitHub Actions, CI/CD та основ PHP. Предметна область — інтернет-магазин комп'ютерної техніки.

## Лабораторна робота №3

- Масиви категорій і дані товару, узгоджені з UML-моделлю.
- Типізовані операції розрахунку вартості та знижки.
- Генерація й фільтрація тестових цін за допомогою Faker.
- Алгоритми варіанта 12: циклічний зсув масиву вправо, вибір трьох останніх слів і підрахунок літери «а».

## Встановлення та запуск

```bash
composer install
php -S localhost:8000
```

Відкрийте `http://localhost:8000` у браузері.

## Перевірки

```bash
./vendor/bin/pint --test
./vendor/bin/phpunit tests/Unit
```

GitHub Actions запускає Pint і PHPUnit після push та для Pull Request у `main`.
