<?php
namespace ShiftOneLabs\LaravelNomad\Tests;

use Illuminate\Database\Connection;

class ServiceProviderTest extends TestCase
{

    public function testMysqlConnectionBound()
    {
        if ($this->laravel54) {
            $this->assertNotNull(Connection::getResolver('mysql'));
        } else {
            $this->assertTrue($this->app->bound('db.connection.mysql'));
        }
    }

    public function testPgsqlConnectionBound()
    {
        if ($this->laravel54) {
            $this->assertNotNull(Connection::getResolver('pgsql'));
        } else {
            $this->assertTrue($this->app->bound('db.connection.pgsql'));
        }
    }

    public function testSqliteConnectionBound()
    {
        if ($this->laravel54) {
            $this->assertNotNull(Connection::getResolver('sqlite'));
        } else {
            $this->assertTrue($this->app->bound('db.connection.sqlite'));
        }
    }

    public function testSqlsrvConnectionBound()
    {
        if ($this->laravel54) {
            $this->assertNotNull(Connection::getResolver('sqlsrv'));
        } else {
            $this->assertTrue($this->app->bound('db.connection.sqlsrv'));
        }
    }
}
