<?php
namespace ShiftOneLabs\LaravelNomad;

use Illuminate\Support\ServiceProvider;

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
        $this->app->bind('db.connection.mysql', 'ShiftOneLabs\LaravelNomad\Extension\Database\MySqlConnection');
        $this->app->bind('db.connection.pgsql', 'ShiftOneLabs\LaravelNomad\Extension\Database\PostgresConnection');
        $this->app->bind('db.connection.sqlite', 'ShiftOneLabs\LaravelNomad\Extension\Database\SQLiteConnection');
        $this->app->bind('db.connection.sqlsrv', 'ShiftOneLabs\LaravelNomad\Extension\Database\SqlServerConnection');
    }
}
