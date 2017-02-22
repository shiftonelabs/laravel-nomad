<?php
namespace ShiftOneLabs\LaravelNomad;

use Illuminate\Database\Connection;
use Illuminate\Support\ServiceProvider;
use ShiftOneLabs\LaravelNomad\Extension\Database\MySqlConnection;
use ShiftOneLabs\LaravelNomad\Extension\Database\SQLiteConnection;
use ShiftOneLabs\LaravelNomad\Extension\Database\PostgresConnection;
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
        if (method_exists(Connection::class, 'resolverFor')) {
            // Laravel 5.4 and newer
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
        } else {
            // Laravel 5.3 and older
            $this->app->bind('db.connection.mysql', 'ShiftOneLabs\LaravelNomad\Extension\Database\MySqlConnection');
            $this->app->bind('db.connection.pgsql', 'ShiftOneLabs\LaravelNomad\Extension\Database\PostgresConnection');
            $this->app->bind('db.connection.sqlite', 'ShiftOneLabs\LaravelNomad\Extension\Database\SQLiteConnection');
            $this->app->bind('db.connection.sqlsrv', 'ShiftOneLabs\LaravelNomad\Extension\Database\SqlServerConnection');
        }
    }
}
