# php-cicd-lab

Навчальний PHP-проєкт для лабораторної роботи з Git, GitHub Actions та CI/CD.

## Функціонал

- Додавання двох чисел
- Віднімання двох чисел

## Запуск тестів

```bash
composer install
./vendor/bin/pint --test
./vendor/bin/phpunit tests/Unit
```

Проєкт перевіряється автоматично після кожного push і Pull Request у гілку `main`.