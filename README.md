# Laravel table layout

This package provides a simple way to display a resource as a table for your Laravel application.

## Installation

Run the following command from your project directory to add the dependency:

```shell
composer require mkaverin/laravel-table-layout
```

### Laravel without auto-discovery

If you don't use auto-discovery, add the ServiceProvider to the providers array in `config/app.php`:

```php
'providers' => [
    ...
    TableLayout\Providers\TableLayoutServiceProvider::class,
],
```

## Configuration

Copy the package config to your local config with the publish command:

```shell
php artisan vendor:publish --provider="TableLayout\Providers\TableLayoutServiceProvider"
```

You can find published layout in `resources/views/table.blade.php`.
