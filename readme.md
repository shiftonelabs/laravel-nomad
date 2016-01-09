# laravel-nomad

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.txt)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

This Laravel/Lumen package provides additional functionality for the Illuminate Database migrations. Currently the only additional functionality is the ability to specify custom database field types, but new functionality can be added as requested/submitted.

## Install

Via Composer

``` bash
$ composer require shiftonelabs/laravel-nomad
```

Once composer has been updated and the package has been installed, the service provider will need to be loaded.

For Laravel 4, open `app/config/app.php` and add following line to the providers array:

``` php
'ShiftOneLabs\LaravelNomad\LaravelNomadServiceProvider',
```

For Laravel 5, open `config/app.php` and add following line to the providers array:
``` php
ShiftOneLabs\LaravelNomad\LaravelNomadServiceProvider::class,
```

For Lumen 5, open `bootstrap/app.php` and add following line under the "Register Service Providers" section:
``` php
$app->register(ShiftOneLabs\LaravelNomad\LaravelNomadServiceProvider::class);
```

## Usage

####Custom Field Types
Laravel's migrations provide methods for a wide base of the standard field types used in the supported databases, however it is not an exhaustive list. Additionally, some databases have extensions that can be enabled that add new field types. Unfortunately, one cannot create fields with these new data types using built-in migration methods. 

As an example, PostgreSQL has a "citext" module to allow easy case-insensitive matching. This module adds a new "citext" field data type for storing case-insensitive string data. The built-in migration methods do not have a way to create a "citext" field, so one would have to add a direct "ALTER" statement to run after the table is created.

This package adds a new `passthru` method to allow defining custom data types in the migration. The `passthru` method can be used to add a field with any data type, as the specified type is merely passed through to the schema grammar.

The `passthru` method requires two parameters: the data type and the field name. An optional third parameter can be used to specify the actual data type definition, if needed. The `definition` method can also be chained on to specify the actual data type definition. A usage example is shown below:

``` php
class CreateUsersTable extends Migration {
    public function up()
    {
        Schema::create('users', function(Blueprint $table)
        {
            $table->increments('id');
            $table->passthru('citext', 'name');
            $table->passthru('citext', 'title')->nullable();
            $table->passthru('string', 'email', 'varchar(255)')->unique();
            $table->passthru('string', 'password')->definition('varchar(60)');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('users');
    }
}
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