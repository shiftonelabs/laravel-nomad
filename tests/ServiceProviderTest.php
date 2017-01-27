<?php
namespace ShiftOneLabs\LaravelNomad\Tests;

use Illuminate\Database\Connection;

class ServiceProviderTest extends TestCase
{

    public function testMysqlConnectionBound()
    {
        $this->assertNotNull(Connection::getResolver('mysql'));
    }

    public function testPgsqlConnectionBound()
    {
        $this->assertNotNull(Connection::getResolver('pgsql'));
    }

    public function testSqliteConnectionBound()
    {
        $this->assertNotNull(Connection::getResolver('sqlite'));
    }

    public function testSqlsrvConnectionBound()
    {
        $this->assertNotNull(Connection::getResolver('sqlsrv'));
    }
}
