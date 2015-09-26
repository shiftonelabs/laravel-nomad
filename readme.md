# laravel-nomad

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.txt)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what
PSRs you support to avoid any confusion with users and contributors.

## Install

Via Composer

``` bash
$ composer require shiftonelabs/laravel-nomad
```

Once composer has been updated and the package has been installed, add the service provider to the providers array.

For Laravel 4, open `app/config/app.php` and add following line to the providers array:

``` php
		'ShiftOneLabs\LaravelNomad\LaravelNomadServiceProvider',
```

For Laravel 5, open `config/app.php` and add following line to the providers array:
``` php
        ShiftOneLabs\LaravelNomad\LaravelNomadServiceProvider::class,
```

## Usage

``` php
// todo
```

## Contributing

Contributions are very welcome. Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email patrick@shiftonelabs.com instead of using the issue tracker.

## Credits

- [Patrick Carlo-Hickman][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.txt) for more information.

[ico-version]: https://img.shields.io/packagist/v/shiftonelabs/laravel-nomad.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/shiftonelabs/laravel-nomad/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/shiftonelabs/laravel-nomad.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/shiftonelabs/laravel-nomad.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/shiftonelabs/laravel-nomad.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/shiftonelabs/laravel-nomad
[link-travis]: https://travis-ci.org/shiftonelabs/laravel-nomad
[link-scrutinizer]: https://scrutinizer-ci.com/g/shiftonelabs/laravel-nomad/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/shiftonelabs/laravel-nomad
[link-downloads]: https://packagist.org/packages/shiftonelabs/laravel-nomad
[link-author]: https://github.com/patrickcarlohickman
[link-contributors]: ../../contributors