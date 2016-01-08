<?php
namespace ShiftOneLabs\LaravelNomad\Tests;

class SchemaGrammarTest extends TestCase
{

    public function testMysqlConnectionSchemaGrammarIsOverridden()
    {
        $conn = $this->makeConnection('mysql');
        $conn->useDefaultSchemaGrammar();
        $grammar = $conn->getSchemaGrammar();

        $this->assertInstanceOf('ShiftOneLabs\LaravelNomad\Extension\Database\Schema\Grammars\MySqlGrammar', $grammar);
    }

    public function testPgsqlConnectionSchemaGrammarIsOverridden()
    {
        $conn = $this->makeConnection('pgsql');
        $conn->useDefaultSchemaGrammar();
        $grammar = $conn->getSchemaGrammar();

        $this->assertInstanceOf('ShiftOneLabs\LaravelNomad\Extension\Database\Schema\Grammars\PostgresGrammar', $grammar);
    }

    public function testSqliteConnectionSchemaGrammarIsOverridden()
    {
        $conn = $this->makeConnection('sqlite');
        $conn->useDefaultSchemaGrammar();
        $grammar = $conn->getSchemaGrammar();

        $this->assertInstanceOf('ShiftOneLabs\LaravelNomad\Extension\Database\Schema\Grammars\SQLiteGrammar', $grammar);
    }

    public function testSqlsrvConnectionSchemaGrammarIsOverridden()
    {
        $conn = $this->makeConnection('sqlsrv');
        $conn->useDefaultSchemaGrammar();
        $grammar = $conn->getSchemaGrammar();

        $this->assertInstanceOf('ShiftOneLabs\LaravelNomad\Extension\Database\Schema\Grammars\SqlServerGrammar', $grammar);
    }

    public function testMysqlPassthruColumnToSql()
    {
        $conn = $this->makeConnection('mysql');
        $conn->useDefaultSchemaGrammar();
        $grammar = $conn->getSchemaGrammar();

        $blueprint = $this->getNewBlueprint();
        $blueprint->passthru('customtype', 'field_name');

        $columnsSql = $this->getColumnSql($grammar, $blueprint);

        $this->assertEquals('`field_name` customtype not null', $columnsSql[0]);
    }

    public function testMysqlPassthruColumnWithDefinitionToSql()
    {
        $conn = $this->makeConnection('mysql');
        $conn->useDefaultSchemaGrammar();
        $grammar = $conn->getSchemaGrammar();

        $blueprint = $this->getNewBlueprint();
        $blueprint->passthru('customtype', 'field_name')->definition('customtype(255)');

        $columnsSql = $this->getColumnSql($grammar, $blueprint);

        $this->assertEquals('`field_name` customtype(255) not null', $columnsSql[0]);
    }

    public function testMysqlPassthruColumnModifiedToSql()
    {
        $conn = $this->makeConnection('mysql');
        $conn->useDefaultSchemaGrammar();
        $grammar = $conn->getSchemaGrammar();

        $blueprint = $this->getNewBlueprint();
        $blueprint->passthru('customtype', 'field_name')->nullable();

        $columnsSql = $this->getColumnSql($grammar, $blueprint);

        $this->assertEquals('`field_name` customtype null', $columnsSql[0]);
    }

    public function testMysqlPassthruColumnWithDefinitionModifiedToSql()
    {
        $conn = $this->makeConnection('mysql');
        $conn->useDefaultSchemaGrammar();
        $grammar = $conn->getSchemaGrammar();

        $blueprint = $this->getNewBlueprint();
        $blueprint->passthru('customtype', 'field_name')
            ->definition('customtype(255)')
            ->nullable();

        $columnsSql = $this->getColumnSql($grammar, $blueprint);

        $this->assertEquals('`field_name` customtype(255) null', $columnsSql[0]);
    }

    public function testPgsqlPassthruColumnToSql()
    {
        $conn = $this->makeConnection('pgsql');
        $conn->useDefaultSchemaGrammar();
        $grammar = $conn->getSchemaGrammar();

        $blueprint = $this->getNewBlueprint();
        $blueprint->passthru('customtype', 'field_name');

        $columnsSql = $this->getColumnSql($grammar, $blueprint);

        $this->assertEquals('"field_name" customtype not null', $columnsSql[0]);
    }

    public function testPgsqlPassthruColumnWithDefinitionToSql()
    {
        $conn = $this->makeConnection('pgsql');
        $conn->useDefaultSchemaGrammar();
        $grammar = $conn->getSchemaGrammar();

        $blueprint = $this->getNewBlueprint();
        $blueprint->passthru('customtype', 'field_name')->definition('customtype(255)');

        $columnsSql = $this->getColumnSql($grammar, $blueprint);

        $this->assertEquals('"field_name" customtype(255) not null', $columnsSql[0]);
    }

    public function testPgsqlPassthruColumnModifiedToSql()
    {
        $conn = $this->makeConnection('pgsql');
        $conn->useDefaultSchemaGrammar();
        $grammar = $conn->getSchemaGrammar();

        $blueprint = $this->getNewBlueprint();
        $blueprint->passthru('customtype', 'field_name')->nullable();

        $columnsSql = $this->getColumnSql($grammar, $blueprint);

        $this->assertEquals('"field_name" customtype null', $columnsSql[0]);
    }

    public function testPgsqlPassthruColumnWithDefinitionModifiedToSql()
    {
        $conn = $this->makeConnection('pgsql');
        $conn->useDefaultSchemaGrammar();
        $grammar = $conn->getSchemaGrammar();

        $blueprint = $this->getNewBlueprint();
        $blueprint->passthru('customtype', 'field_name')
            ->definition('customtype(255)')
            ->nullable();

        $columnsSql = $this->getColumnSql($grammar, $blueprint);

        $this->assertEquals('"field_name" customtype(255) null', $columnsSql[0]);
    }

    public function testSqlitePassthruColumnToSql()
    {
        $conn = $this->makeConnection('sqlite');
        $conn->useDefaultSchemaGrammar();
        $grammar = $conn->getSchemaGrammar();

        $blueprint = $this->getNewBlueprint();
        $blueprint->passthru('customtype', 'field_name');

        $columnsSql = $this->getColumnSql($grammar, $blueprint);

        $this->assertEquals('"field_name" customtype not null', $columnsSql[0]);
    }

    public function testSqlitePassthruColumnWithDefinitionToSql()
    {
        $conn = $this->makeConnection('sqlite');
        $conn->useDefaultSchemaGrammar();
        $grammar = $conn->getSchemaGrammar();

        $blueprint = $this->getNewBlueprint();
        $blueprint->passthru('customtype', 'field_name')->definition('customtype(255)');

        $columnsSql = $this->getColumnSql($grammar, $blueprint);

        $this->assertEquals('"field_name" customtype(255) not null', $columnsSql[0]);
    }

    public function testSqlitePassthruColumnModifiedToSql()
    {
        $conn = $this->makeConnection('sqlite');
        $conn->useDefaultSchemaGrammar();
        $grammar = $conn->getSchemaGrammar();

        $blueprint = $this->getNewBlueprint();
        $blueprint->passthru('customtype', 'field_name')->nullable();

        $columnsSql = $this->getColumnSql($grammar, $blueprint);

        $this->assertEquals('"field_name" customtype null', $columnsSql[0]);
    }

    public function testSqlitePassthruColumnWithDefinitionModifiedToSql()
    {
        $conn = $this->makeConnection('sqlite');
        $conn->useDefaultSchemaGrammar();
        $grammar = $conn->getSchemaGrammar();

        $blueprint = $this->getNewBlueprint();
        $blueprint->passthru('customtype', 'field_name')
            ->definition('customtype(255)')
            ->nullable();

        $columnsSql = $this->getColumnSql($grammar, $blueprint);

        $this->assertEquals('"field_name" customtype(255) null', $columnsSql[0]);
    }

    public function testSqlsrvPassthruColumnToSql()
    {
        $conn = $this->makeConnection('sqlsrv');
        $conn->useDefaultSchemaGrammar();
        $grammar = $conn->getSchemaGrammar();

        $blueprint = $this->getNewBlueprint();
        $blueprint->passthru('customtype', 'field_name');

        $columnsSql = $this->getColumnSql($grammar, $blueprint);

        $this->assertEquals('"field_name" customtype not null', $columnsSql[0]);
    }

    public function testSqlsrvPassthruColumnWithDefinitionToSql()
    {
        $conn = $this->makeConnection('sqlsrv');
        $conn->useDefaultSchemaGrammar();
        $grammar = $conn->getSchemaGrammar();

        $blueprint = $this->getNewBlueprint();
        $blueprint->passthru('customtype', 'field_name')->definition('customtype(255)');

        $columnsSql = $this->getColumnSql($grammar, $blueprint);

        $this->assertEquals('"field_name" customtype(255) not null', $columnsSql[0]);
    }

    public function testSqlsrvPassthruColumnModifiedToSql()
    {
        $conn = $this->makeConnection('sqlsrv');
        $conn->useDefaultSchemaGrammar();
        $grammar = $conn->getSchemaGrammar();

        $blueprint = $this->getNewBlueprint();
        $blueprint->passthru('customtype', 'field_name')->nullable();

        $columnsSql = $this->getColumnSql($grammar, $blueprint);

        $this->assertEquals('"field_name" customtype null', $columnsSql[0]);
    }

    public function testSqlsrvPassthruColumnWithDefinitionModifiedToSql()
    {
        $conn = $this->makeConnection('sqlsrv');
        $conn->useDefaultSchemaGrammar();
        $grammar = $conn->getSchemaGrammar();

        $blueprint = $this->getNewBlueprint();
        $blueprint->passthru('customtype', 'field_name')
            ->definition('customtype(255)')
            ->nullable();

        $columnsSql = $this->getColumnSql($grammar, $blueprint);

        $this->assertEquals('"field_name" customtype(255) null', $columnsSql[0]);
    }
}
