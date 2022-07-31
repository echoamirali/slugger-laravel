# A simple package for create simple slug.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/echoamirali/slugger.svg?style=flat-square)](https://packagist.org/packages/echoamirali/slugger)
[![Total Downloads](https://img.shields.io/packagist/dt/echoamirali/slugger.svg?style=flat-square)](https://packagist.org/packages/echoamirali/slugger)

## Installation

### Step 1

- **Method 1**:
You can install the package via composer:

```bash
composer require echoamirali/slugger
```

- **Method 2**:
Add this line to **Composer.json** file in your project:

```bash
"echoamirali/slugger": "*"
```

Then run following command to download extension using **composer**

```bash
$ composer update
```

### Step 2

Head to **config/app.php** and add this line to the end of **providers** Array:

```php
Echoamirali\Slugger\SluggerServiceProvider::class,
```

### Step 3

Then in the **config/app.php** and add this line to the end of **aliases** Array:

```php
'Slugger' => Echoamirali\Slugger\SluggerFacade::class,
```

### Step 4

Run this command in your project dirctory:

```bash
php artisan vendor:publish
```

In the message appear, find the number of Slugger, enter the related number then hit Enter.

### Step 5

You can configure package, for this head to **config/slugger.php**

```php
return [
    /**
     * if do initail option be true, package do some operations on your string like
     * trims spaces, changes characters to lowercase , changes spaces to hyphen, ...
    **/
    'do_initial' => false,
    /**
     * if do translate option be true, package translate your string from 'translate_from'
     * option to 'translate_to' option at the first even before do initial
    **/ 
    'do_translate' => false,
    'translate_from' => 'fa',
    'translate_to' => 'en',
    /**
     * if do pattern option be true, package implement your string into
     * your pattern define in pattern option instead of #string# 
    **/
    'do_pattern' => false,
    'pattern' => '',
    /**
     * first of all you should know remain options only use in laravel models for 
     * avoid repetition and when you put true in 'is_unique' option they work
    **/
    'is_unique' => false,
    // put your database column in this option, that you want be unique
    'field' => 'slug',
    /**
     * this package use some symbols for avoid repetition and you can
     * choose which you want and put it in 'iteration_symbol' option.
     * available options for are : 
     * decimal, decimal_leading_zero, roman, numbers_in_word, ordinal_number
     **/
    'iteration_symbol' => 'decimal',
    //you can add your custom symbols in this option like alphabet
    'custom_iteration_symbols' => [
        'alphabet' => range('a', 'z')
    ]
];
```

## Usage

You can use the package where ever you want.

- First use the class:

```php
use Slugger;
```

Then use this pattern to slugify your string:

```php

$slug = Slugger::make($string);

```


### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email echoamirali@gmail.com instead of using the issue tracker.

## Credits

-   [AmirAli](https://github.com/echoamirali)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
