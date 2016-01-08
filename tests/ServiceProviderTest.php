<?php
namespace ShiftOneLabs\LaravelNomad\Tests;

class ServiceProviderTest extends TestCase
{

    public function testMysqlConnectionBound()
    {
        $this->assertTrue($this->app->bound('db.connection.mysql'));
    }

    public function testPgsqlConnectionBound()
    {
        $this->assertTrue($this->app->bound('db.connection.pgsql'));
    }

    public function testSqliteConnectionBound()
    {
        $this->assertTrue($this->app->bound('db.connection.sqlite'));
    }

    public function testSqlsrvConnectionBound()
    {
        $this->assertTrue($this->app->bound('db.connection.sqlsrv'));
    }
}
