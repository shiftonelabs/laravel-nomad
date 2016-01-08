<?php
namespace ShiftOneLabs\LaravelNomad\Extension\Database\Schema\Grammars;

use ShiftOneLabs\LaravelNomad\Traits\Database\Schema\Grammars\PassthruTrait;
use Illuminate\Database\Schema\Grammars\SqlServerGrammar as BaseSqlServerGrammar;

class SqlServerGrammar extends BaseSqlServerGrammar
{
    use PassthruTrait;
}
