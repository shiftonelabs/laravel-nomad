<?php
namespace ShiftOneLabs\LaravelNomad\Traits\Database\Schema\Grammars;

use Illuminate\Support\Fluent;

trait PassthruTrait
{

    /**
     * Create the column definition for a string type.
     *
     * @param \Illuminate\Support\Fluent $column
     * @return string
     */
    protected function typePassthru(Fluent $column)
    {
        return !empty($column->definition) ? $column->definition : $column->realType;
    }
}
