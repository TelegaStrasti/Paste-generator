# Paste Generator

Paste Generator - это веб-приложение, которое позволяет пользователям загружать и делиться кусками текста или кода, получая короткую ссылку для отправки другим людям. С помощью Paste Generator вы можете загружать данные как анонимно, так и после регистрации.
## Возможности

- Загружать куски текста.
- Получайте уникальную короткую ссылку для каждого загруженного куска данных.
- Отправляйте ссылки на загруженные данные другим людям для их просмотра.
- Просматривайте загруженные данные в личном кабинете после регистрации.
## Установка

1. Клонируйте репозиторий на свой локальный компьютер.
2. Пропишите команду `docker-compose up -d`
3. Затем перейдите в сам проект с помощью `docker compose exec -it  php-fpm bash`
4. Создайте файл `.env`  и настройте соединение с базой данных.
5. Запустите миграции с помощью команды `php artisan migrate`.
6. Создайте ключи шифрования для Passport с помощью команды `php artisan passport:install`.