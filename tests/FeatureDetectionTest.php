<?php

namespace ShiftOneLabs\LaravelNomad\Tests;

use PHPUnit_Framework_TestCase;
use ShiftOneLabs\LaravelNomad\FeatureDetection;

class FeatureDetectionTest extends PHPUnit_Framework_TestCase
{
    public function testIsConnectionResolverReturnsTrueForCorrectResolver()
    {
        $detection = new FeatureDetection();

        $this->assertTrue($detection->isConnectionResolver($detection->connectionResolverDriver()));
    }

    public function testIsConnectionResolverReturnsFalseForIncorrectResolver()
    {
        $detection = new FeatureDetection();

        $this->assertFalse($detection->isConnectionResolver('invalid-resolver-driver'));
    }
}
