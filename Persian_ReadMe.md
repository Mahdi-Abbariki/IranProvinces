# پکیج استان‌ها و شهرهای ایران

این پکیج قابلیت مدیریت استان‌ها و شهرهای ایران را از طریق جداول پایگاه داده فراهم می‌کند. این پکیج دارای گزینه‌های پیکربندی انعطاف‌پذیری است که به شما این امکان را می‌دهد:

<ul style="dir:rtl">
    <li> انتخاب ایجاد یا عدم ایجاد جدول برای شهرها.</li>
    <li>تصمیم در مورد اضافه کردن یا حذف اطلاعات عرض جغرافیایی و طول جغرافیایی به جدول شهرها.</li>
    <li>افزودن یا حذف زمان‌های ایجاد و به‌روزرسانی در جداول.</li>
</ul>

## English instructions

<div dir="rtl">

[English Instruction file](ReadMe.md)

</div>

## نصب

برای شروع، دستور زیر را اجرا کنید:

```shell
    composer require MahdiAbbariki/IranProvinces
```

## برای نسخه‌های Laravel کمتر از 6

برای نسخه‌های Laravel کمتر از نسخه 6، باید خط زیر را به آرایه `providers` در فایل `config/app.php` اضافه کنید:

```php
    'providers' => [
    // ...
    MahdiAbbariki\IranProvinces\IranProvincesServiceProvider::class,
    ],
```

با افزودن این خط، پکیج با موفقیت به پروژه شما ادغام می‌شود.

سپس دستور زیر را اجرا کنید تا فایل‌های پیکربندی، مهاجرت و سیدر پکیج منتشر شوند:

```shell
    php artisan vendor:publish --provider="MahdiAbbariki\IranProvinces\IranProvincesServiceProvider"
```

حتماً فایل پیکربندی (`config/iranProvinces.php`) را براساس نیازهای خود ویرایش کنید. پیکربندی‌های پیش‌فرض برای اکثر کاربران مناسب است.

پس از ویرایش فایل پیکربندی، دستور migration را اجرا کنید.

## وارد کردن اطلاعات

شما می‌توانید به دو روش اطلاعات را وارد پایگاه داده خود کنید.

می‌توانید این دستور را برای اجرای سیدرهای مشخص شده در این پکیج اجرا کنید:

```shell
    php artisan province:seed
```

یک روش دیگر این است که این خطوط را به متد `run` در کلاس `DatabaseSeeder` در دایرکتوری `database/seeders` اضافه کنید.

```php
    $this->call([
        //...
        \MahdiAbbariki\IranProvinces\Database\Seeders\IranProvincesTableSeeder::class,
        \MahdiAbbariki\IranProvinces\Database\Seeders\IranProvincesCitiesTableSeeder::class,
        //...
    ]);
```
و از دستور زیر استفاده کنید:
```shell
    php artisan db:seed
```

حالا مدل‌ها و جداول برای استفاده آماده هستند.

## نحوه استفاده

```php 
    use MahdiAbbariki\IranProvinces\Models\Province;
    use MahdiAbbariki\IranProvinces\Models\City;

    $province = Province::find(1);
    $cities = $province->cities;

    $city = City::find(1);
    $province = $city->province;
```

## مشارکت

اگر با هر نوع خطا مواجه شدید، لطفاً آن را به
[info@mahdiab.ir](mailto:info@mahdiab.ir)
گزارش دهید!
