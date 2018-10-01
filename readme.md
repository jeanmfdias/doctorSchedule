# DoctorSchedule

## Requirements

- PHP >= 7.1
- MySQL >= 5.6
- Node.js >= 8

## Steps to execute

```sh
$ composer install
$ cp .env.example .env
$ php artisan key:generate
```

Create database doctor_schedule_db

```sh
$ php artisan migrate
$ npm install
$ npm run dev
$ php artisan serve
```

Project running at http://127.0.0.1:8000