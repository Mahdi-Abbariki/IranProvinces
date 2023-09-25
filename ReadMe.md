# Iran Provinces Package

This package offers functionality to manage Iran's provinces and cities through database tables. It comes with flexible configuration options, allowing you to:

- Choose whether or not to create a table for cities.
- Decide whether to include latitude and longitude data in the cities table.
- Add or exclude timestamps in the tables.

## Persian Install Guide

<div dir="rtl">

[راهنمای نصب فارسی](Persian_ReadMe.md)

</div>

## Installation

To get started, run the following command:

```php
    composer require MahdiAbbariki/IranProvinces
```

## For Laravel Versions Prior to v6

For Laravel versions older than v6, you need to add the following line to the `providers` array in the `config/app.php` file:

```php
    'providers' => [
    // ...
    MahdiAbbariki\IranProvinces\IranProvincesServiceProvider::class, // Add this line at the end of the provider array
    ],
```

<hr>

<br>

the package is successfully integrated into your project.

After that, run the following command to publish the package's configuration, migration, and seeder files:

```shell
    php artisan vendor:publish --provider="MahdiAbbariki\IranProvinces\IranProvincesServiceProvider"
```

Make sure to edit the configuration file ( `config/iranProvinces.php` ) to match your specific requirements. The default configurations are suitable for most users.

Once you've customized the configuration, run your migrations.

```shell
    php artisan migrate
```

## Seeding

You have two options for seeding the data.

You can execute this command to run the designated seeders included with this package:

```shell
    php artisan province:seed
```

Alternatively, you can add the following lines to the `run` method in the `DatabaseSeeder` class located in the `database/seeders` directory:

```php
    $this->call([
        //...
        IranProvincesTableSeeder::class,
        IranProvincesCitiesTableSeeder::class,
        //...
    ]);
```

then you can use the built-in laravel seed command:

```shell
    php artisan db:seed
```

<hr>

Now, your models and tables are ready for use.

## Examples

Here are some examples of how to use them:

```php
    use MahdiAbbariki\IranProvinces\Models\Province;
    use MahdiAbbariki\IranProvinces\Models\City;

    $province = Province::find(1);
    $cities = $province->cities;

    $city = City::find(1);
    $province = $city->province;
```

## Contribution

If you encounter any bugs, please report them to [info@mahdiab.ir](mailto:info@mahdiab.ir). Your contributions are welcome!
