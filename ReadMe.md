# Iran Provinces

This package provides iran provinces and cities tables, and It can be configured to :

- make cities table or not
- add lat,long to cities table or not
- add timestamps or not

## Persian Install Guide

<div dir="rtl">


[راهنمای نصب فارسی](Persian_ReadMe.md)


</div>

## installation

run:

```php
    composer require MahdiAbbariki/IranProvinces
```

For Laravel < v6

add to config/app.php

```php
'providers' => [
  ...
  MahdiAbbariki\IranProvinces\IranProvincesServiceProvider::class, // <-- add this line at the end of provider array
],

```

The package is successfully added to your project.

run:

```php
    php artisan province:config
```

This will publish the configuration file, edit this file based on your requirements, the default configuration suits
most users.

After editing configuration file, run:

```php
    php artisan province:database 
```

The Models and Tables are ready to use

Examples:

```php 
    $province = IranProvinces::find(1);
    $cities = $province->cities;
```
