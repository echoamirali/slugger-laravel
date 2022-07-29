# A simple package for create simple slug.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/echoamirali/slugger.svg?style=flat-square)](https://packagist.org/packages/echoamirali/slugger)
[![Total Downloads](https://img.shields.io/packagist/dt/echoamirali/slugger.svg?style=flat-square)](https://packagist.org/packages/echoamirali/slugger)

## Installation

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


## Usage

- **Step 1**:

Head to **config/app.php** and add this line to the end of **providers** Array:

```php
Echoamirali\Slugger\SluggerServiceProvider::class,
```

So that array must me something like this:

```php
'providers' => [
		/*
		* Laravel Framework Service Providers...
		*/
		.
		.
		Echoamirali\Slugger\SluggerServiceProvider::class
]
```

- **Step 2**:

Then in the **config/app.php** and add this line to the end of **aliases** Array:

```php
'Slugger' => Echoamirali\Slugger\SluggerFacade::class,
```

### Testing

```bash
composer test
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
