<p align="center">
<img src="https://app.numlookupapi.com/img/logo/numlookupapi.png" width="300"/>
</p>

# numlookupapi-php - Worldwide Phone Number Lookup & Verification API

[![Latest Version on Packagist](https://img.shields.io/packagist/v/everapi/numlookupapi-php.svg?style=flat-square)](https://packagist.org/packages/everapi/numlookupapi-php)
[![Total Downloads](https://img.shields.io/packagist/dt/everapi/numlookupapi-php.svg?style=flat-square)](https://packagist.org/packages/everapi/numlookupapi-php)

This package is a PHP wrapper for [numlookupapi.com] that aims to make the usage of the API as easy as possible in your project.

## Installation

You can install the package via composer:

```bash
composer require everapi/numlookupapi-php
```

## Usage

Initialize the API with your API Key (get one for free at [numlookupapi.com]):

```php
$numlookupapi = new \Numlookupapi\NumlookupapiClient('YOUR-API-KEY');
```

Afterwards you can use the endpoints of the API like this:

```php
echo $numlookupapi->status();
```


```php
var_dump($numlookupapi->validate('2069220880', [
    'country_code' => 'US'
]));
```


Learn more about endpoints, parameters and response data structure in the [docs].

[docs]: https://numlookupapi.com/docs
[numlookupapi.com]: https://numlookupapi.com

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
