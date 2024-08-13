<p align="center">
    <img src="https://ipala.shop/public/assets/images/devme.png" alt="Banner" style="width: 100%; max-width: 800px;" />
</p>

<p align="center">
    <a href="https://github.com/filamentphp/filament/actions"><img alt="Tests passing" src="https://img.shields.io/badge/Tests-passing-green?style=for-the-badge&logo=github"></a>
    <a href="https://laravel.com"><img alt="Laravel v11.x" src="https://img.shields.io/badge/Laravel-v11.x-FF2D20?style=for-the-badge&logo=laravel"></a>
    <a href="https://livewire.laravel.com"><img alt="Livewire v3.x" src="https://img.shields.io/badge/Livewire-v3.x-FB70A9?style=for-the-badge"></a>
    <a href="https://php.net"><img alt="PHP 8.2" src="https://img.shields.io/badge/PHP-8.2-777BB4?style=for-the-badge&logo=php"></a>
</p>

## About Lara-DevMe

Laravel-DevMe is an open-source, full-stack Laravel codebase designed to help developers create modular, scalable applications quickly and efficiently. It includes a customizable admin module template, Tailwind CSS for frontend design, and supports the TALL stack (Tailwind CSS, Alpine.js, Laravel, Livewire).

- Modular Architecture: Easily build and manage your application with a clean, modular structure.
  
- Admin Module Template: Save time with a pre-built, fully customizable admin panel.
  
- Tailwind CSS: Create modern, responsive UIs with minimal effort.
  
- TALL Stack Compatibility: Enjoy the power of Livewire and Alpine.js for dynamic, reactive applications.
  
- Supported Database : Mysql , MongoDB & Postgres

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## [Demo](https://deve-me-fe.vercel.app/)

## Installation Steps

### 1. Require the Package

After creating your new Laravel application you can include the Voyager package with the following command:

```bash
composer require tcg/voyager
```

> If you are installing this on Laravel 10, we are working on getting a permanent release available; however, you can still use this with Larvel 10 by requiring the following:

```bash
composer require tcg/voyager dev-1.6-l10
```

### 2. Add the DB Credentials & APP_URL

Next make sure to create a new database and add your database credentials to your .env file:

```
DB_HOST=localhost
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```

You will also want to update your website URL inside of the `APP_URL` variable inside the .env file:

```
APP_URL=http://localhost:8000
```

### 3. Run The Installer

Lastly, we can install voyager. You can do this either with or without dummy data.
The dummy data will include 1 admin account (if no users already exists), 1 demo page, 4 demo posts, 2 categories and 7 settings.

To install Voyager without dummy simply run

```bash
php artisan voyager:install
```

If you prefer installing it with dummy run

```bash
php artisan voyager:install --with-dummy
```

And we're all good to go!

Start up a local development server with `php artisan serve` And, visit [http://localhost:8000/admin](http://localhost:8000/admin).

## Creating an Admin User

If you did go ahead with the dummy data, a user should have been created for you with the following login credentials:

>**email:** `admin@admin.com`   
>**password:** `password`

NOTE: Please note that a dummy user is **only** created if there are no current users in your database.

If you did not go with the dummy user, you may wish to assign admin privileges to an existing user.
This can easily be done by running this command:

```bash
php artisan voyager:admin your@email.com
```

If you did not install the dummy data and you wish to create a new admin user, you can pass the `--create` flag, like so:

```bash
php artisan voyager:admin your@email.com --create
```

And you will be prompted for the user's name and password.
