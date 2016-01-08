<?php
namespace ShiftOneLabs\LaravelNomad\Extension\Database;

use Illuminate\Database\SQLiteConnection as BaseSQLiteConnection;
use ShiftOneLabs\LaravelNomad\Extension\Database\Schema\Blueprint;
use ShiftOneLabs\LaravelNomad\Extension\Database\Schema\Grammars\SQLiteGrammar as SchemaGrammar;

class SQLiteConnection extends BaseSQLiteConnection
{

    /**
     * Get the default schema grammar instance.
     *
     * @return \ShiftOneLabs\LaravelNomad\Extension\Database\Schema\Grammars\SQLiteGrammar
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
