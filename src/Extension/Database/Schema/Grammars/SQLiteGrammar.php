<?php
namespace ShiftOneLabs\LaravelNomad\Extension\Database\Schema\Grammars;

use Illuminate\Database\Schema\Grammars\SQLiteGrammar as BaseSQLiteGrammar;
use ShiftOneLabs\LaravelNomad\Traits\Database\Schema\Grammars\PassthruTrait;

class SQLiteGrammar extends BaseSQLiteGrammar
{
    use PassthruTrait;
}
