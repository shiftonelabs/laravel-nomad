<?php
namespace ShiftOneLabs\LaravelNomad\Extension\Database\Schema\Grammars;

use ShiftOneLabs\LaravelNomad\Traits\Database\Schema\Grammars\PassthruTrait;
use Illuminate\Database\Schema\Grammars\PostgresGrammar as BasePostgresGrammar;

class PostgresGrammar extends BasePostgresGrammar
{
    use PassthruTrait;
}
