# Iran Provinces

This package provides iran provinces and cities tables, and It can be configured to :

- make cities table or not
- add lat,long to cities table or not
- add timestamps or not

## Persian Install Guide

<div dir="rtl">


[راهنمای نصب فارسی](Persian_ReadMe.md)


</div>

## Installation

run:

```php
    composer require MahdiAbbariki/IranProvinces
```

For Laravel < v6

append the following line to `providers` array in ```config/app.php``` file

```php
'providers' => [
  ...
  MahdiAbbariki\IranProvinces\IranProvincesServiceProvider::class, // <-- add this line at the end of provider array
],

```

The package is successfully added to your project.

run:

```shell
    php artisan province:config
```

This will publish the configuration file, edit this file based on your requirements. the default configuration suits
most users.

After editing configuration file, run:

```shell
    php artisan province:database 
```

The Models and Tables are ready to use

Examples:

```php 
    $province = IranProvinces::find(1);
    $cities = $province->cities;
```

## Contribution

send any **Bug** reports to [info@mahdiab.ir](mailto:info@mahdiab.ir)
