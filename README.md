### Compare Performance of Laravel Eloquent Collection `loadCount()` Method

#### Initial Setup

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed --class=ItemSeeder
```

#### Profiling With Blackfire

There are two console commands, one that uses the current `loadCount()` method, and one that uses an improved version of the method:

```bash
blackfire run php artisan load-count-laravel

Wall Time   2min 5s
I/O Wait      29.9s
CPU Time   1min 35s
Memory       18.7MB
Network         n/a     n/a     n/a
SQL           28.5s     4rq
```

```bash
blackfire run php artisan load-count-improved

Wall Time     23.9s
I/O Wait      22.9s
CPU Time      984ms
Memory       18.7MB
Network         n/a     n/a     n/a
SQL           22.4s     4rq
```


