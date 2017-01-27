<?php
namespace ShiftOneLabs\LaravelNomad;

use Illuminate\Database\Connection;
use Illuminate\Support\ServiceProvider;
use ShiftOneLabs\LaravelNomad\Extension\Database\MySqlConnection;
use ShiftOneLabs\LaravelNomad\Extension\Database\PostgresConnection;
use ShiftOneLabs\LaravelNomad\Extension\Database\SQLiteConnection;
use ShiftOneLabs\LaravelNomad\Extension\Database\SqlServerConnection;

class LaravelNomadServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Connection::resolverFor('mysql', function ($connection, $database, $prefix, $config) {
            return new MySqlConnection($connection, $database, $prefix, $config);
        });
        Connection::resolverFor('pgsql', function ($connection, $database, $prefix, $config) {
            return new PostgresConnection($connection, $database, $prefix, $config);
        });
        Connection::resolverFor('sqlite', function ($connection, $database, $prefix, $config) {
            return new SQLiteConnection($connection, $database, $prefix, $config);
        });
        Connection::resolverFor('sqlsrv', function ($connection, $database, $prefix, $config) {
            return new SqlServerConnection($connection, $database, $prefix, $config);
        });
    }
}
