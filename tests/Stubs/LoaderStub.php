<?php

namespace ShiftOneLabs\LaravelNomad\Tests\Stubs;

use Illuminate\Config\FileLoader;

class LoaderStub extends FileLoader
{
    public function __construct()
    {
        //
    }

    public function load($environment, $group, $namespace = null)
    {
        return [];
    }
}
