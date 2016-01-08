<?php
namespace ShiftOneLabs\LaravelNomad\Extension\Database\Schema;

use Illuminate\Database\Schema\Blueprint as BaseBlueprint;

class Blueprint extends BaseBlueprint
{

    /**
     * Create a new column on the table with the given type.
     *
     * @param string $realType
     * @param string $column
     * @param string $definition
     * @return \Illuminate\Support\Fluent
     */
    public function passthru($realType, $column, $definition = null)
    {
        return $this->addColumn('passthru', $column, compact('realType', 'definition'));
    }
}
