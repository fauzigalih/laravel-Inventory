# Laravel Inventory
Project build with framework Laravel version 7.x.

Status: <b>Release Version 1.0</b>

# Required Project
1. Composer
2. PHP version 7 or above
3. Git

# Technology
1. PHP Language
2. Laravel framework
3. Migration database

# Migration Database
1. Create database in (MySQL, SQL Server, or etc), example: laravel-inventory .
2. Run `php artisan migrate` on CLI .
3. Refresh your database, and get 7 new tables .
4. Finish .

# Installation Project
1. Clone this project with new repository or download project file .
2. Open CLI/Terminal and select <code>cd laravel-inventory</code> and run composer update :
```
composer update -vvv
```
3. Duplicate file `.env.example` with new file `.env` in root folder .
4. Setting database in `.env` in here :
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel-inventory
DB_USERNAME=root
DB_PASSWORD=
```
5. Use migration for instalation database in <a href="https://github.com/fauzigalih/laravel-Inventory#migration-database">here</a> .
6. Copy code in `resources/views/layout/custom.php` and paste code in `vendor/laravelcollective/html/src/HtmlBuilder.php` , delete file `custom.php` after copying .
7. Run `php artisan serve` on CLI, this automatic create url access for aplication ex: http://127.0.0.1:8000/ . 
8. Copy paste access url in your browser .
9. Finish.

<br><br><br>Created by: <a href="https://www.instagram.com/fauzigalihajisaputro/">@fauzigalihajisaputro</a>
