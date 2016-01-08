<?php
namespace ShiftOneLabs\LaravelNomad\Extension\Database;

use ShiftOneLabs\LaravelNomad\Extension\Database\Schema\Blueprint;
use Illuminate\Database\PostgresConnection as BasePostgresConnection;
use ShiftOneLabs\LaravelNomad\Extension\Database\Schema\Grammars\PostgresGrammar as SchemaGrammar;

class PostgresConnection extends BasePostgresConnection
{

    /**
     * Get the default schema grammar instance.
     *
     * @return \ShiftOneLabs\LaravelNomad\Extension\Database\Schema\Grammars\PostgresGrammar
     */
    protected function getDefaultSchemaGrammar()
    {
        return $this->withTablePrefix(new SchemaGrammar());
    }

    /**
     * Get a schema builder instance for the connection.
     *
     * @return \Illuminate\Database\Schema\Builder
     */
    public function getSchemaBuilder()
    {
        $parentBuilder = parent::getSchemaBuilder();

        // add a blueprint resolver closure that returns the custom blueprint
        $parentBuilder->blueprintResolver(function ($table, $callback) {
            return new Blueprint($table, $callback);
        });

        return $parentBuilder;
    }
}
