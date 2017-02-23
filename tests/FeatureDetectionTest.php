<?php

namespace ShiftOneLabs\LaravelNomad\Tests;

use PHPUnit\Framework\TestCase;
use ShiftOneLabs\LaravelNomad\FeatureDetection;

class FeatureDetectionTest extends TestCase
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
