<?php
namespace ShiftOneLabs\LaravelNomad\Tests;

class BlueprintTest extends TestCase
{

    public function testMysqlConnectionSchemaBuilderBlueprintIsOverridden()
    {
        $conn = $this->makeConnection('mysql');
        $builder = $conn->getSchemaBuilder();
        $blueprint = $this->getBuilderBlueprint($builder);

        $this->assertInstanceOf('ShiftOneLabs\LaravelNomad\Extension\Database\Schema\Blueprint', $blueprint);
    }

    public function testPgsqlConnectionSchemaBuilderBlueprintIsOverridden()
    {
        $conn = $this->makeConnection('pgsql');
        $builder = $conn->getSchemaBuilder();
        $blueprint = $this->getBuilderBlueprint($builder);

        $this->assertInstanceOf('ShiftOneLabs\LaravelNomad\Extension\Database\Schema\Blueprint', $blueprint);
    }

    public function testSqliteConnectionSchemaBuilderBlueprintIsOverridden()
    {
        $conn = $this->makeConnection('sqlite');
        $builder = $conn->getSchemaBuilder();
        $blueprint = $this->getBuilderBlueprint($builder);

        $this->assertInstanceOf('ShiftOneLabs\LaravelNomad\Extension\Database\Schema\Blueprint', $blueprint);
    }

    public function testSqlsrvConnectionSchemaBuilderBlueprintIsOverridden()
    {
        $conn = $this->makeConnection('sqlsrv');
        $builder = $conn->getSchemaBuilder();
        $blueprint = $this->getBuilderBlueprint($builder);

        $this->assertInstanceOf('ShiftOneLabs\LaravelNomad\Extension\Database\Schema\Blueprint', $blueprint);
    }

    public function testBlueprintPassthruColumnTypeIsPassthru()
    {
        $blueprint = $this->getNewBlueprint();
        $blueprint->passthru('customtype', 'field_name');
        $columns = $blueprint->getColumns();

        $this->assertEquals($columns[0]->type, 'passthru');
    }

    public function testBlueprintPassthruColumnRealType()
    {
        $blueprint = $this->getNewBlueprint();
        $blueprint->passthru('customtype', 'field_name');
        $columns = $blueprint->getColumns();

        $this->assertEquals($columns[0]->realType, 'customtype');
    }

    public function testBlueprintPassthruColumnName()
    {
        $blueprint = $this->getNewBlueprint();
        $blueprint->passthru('customtype', 'field_name');
        $columns = $blueprint->getColumns();

        $this->assertEquals($columns[0]->name, 'field_name');
    }

    public function testBlueprintPassthruColumnDefintionViaConstructor()
    {
        $blueprint = $this->getNewBlueprint();
        $blueprint->passthru('customtype', 'field_name', 'customtype(255)');
        $columns = $blueprint->getColumns();

        $this->assertEquals($columns[0]->definition, 'customtype(255)');
    }

    public function testBlueprintPassthruColumnDefintionViaMethod()
    {
        $blueprint = $this->getNewBlueprint();
        $blueprint->passthru('customtype', 'field_name')->definition('customtype(255)');
        $columns = $blueprint->getColumns();

        $this->assertEquals($columns[0]->definition, 'customtype(255)');
    }
}
