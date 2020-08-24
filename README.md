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
<h3>Instalation migration</h3>
<ul>
  <li>Create database in (MySQL, SQL Server, or etc), example: inventory.</li>
  <li>Setting connection database in <code>config/db_local.php</code></li>
  <li>Run CLI or Command Prompt in your root aplication (make sure you have installed the composer).</li>
  <li>Run <code>php yii migrate</code></li>
  <li>Refresh your database, and get 5 new tables in it.</li>
  <li>Finish.</li>
</ul>

# Migration Database
alkakj
lkla
lkalja

# Installation Project
1. Clone this project with new repository or download project file .
2. Open CLI/Terminal and select <code>cd laravel-inventory</code> and run composer update :
```
composer update -vvv
```
3. Create file `.env` in root folder, and insert this code :
```
APP_NAME= Inventory
APP_ENV=local
APP_KEY=base64:rpfpBam3syYIy8J+hFf6NA79YUMcFJ8CDmPMtXMQP9o=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel-inventory
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
```
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
6. Run `php artisan serve` on CLI, this automatic create url access for aplication ex: http://127.0.0.1:8000/ . 
7. Copy paste access url in your browser .
8. Finish.

<br><br><br>Created by: <a href="https://www.instagram.com/fauzigalihajisaputro/">@fauzigalihajisaputro</a>
