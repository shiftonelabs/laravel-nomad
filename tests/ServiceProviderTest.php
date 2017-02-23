<?php

namespace ShiftOneLabs\LaravelNomad\Tests;

use Illuminate\Database\Connection;
use ShiftOneLabs\LaravelNomad\FeatureDetection;

class ServiceProviderTest extends TestCase
{
    public function testFeatureDetectionRegistered()
    {
        $this->assertInstanceOf(FeatureDetection::class, $this->app['nomad.feature.detection']);
    }

    public function testConnectionRegistrationThrowsExceptionForUnhandledFeature()
    {
        $this->app->bind('nomad.feature.detection', function ($app) {
            $mock = \Mockery::mock(FeatureDetection::class);
            $mock->shouldReceive('connectionResolverDriver')->andReturn('invalid-resolver-driver');

            return $mock;
        });

        $this->setExpectedException('LogicException');

        (new \ShiftOneLabs\LaravelNomad\LaravelNomadServiceProvider($this->app))->registerConnections();
    }

    public function testMysqlConnectionRegistered()
    {
        if ($this->detection->isConnectionResolver(FeatureDetection::CONNECTION_RESOLVER_METHOD)) {
            $this->assertNotNull(Connection::getResolver('mysql'));
        } else {
            $this->assertTrue($this->app->bound('db.connection.mysql'));
        }
    }

    public function testPgsqlConnectionRegistered()
    {
        if ($this->detection->isConnectionResolver(FeatureDetection::CONNECTION_RESOLVER_METHOD)) {
            $this->assertNotNull(Connection::getResolver('pgsql'));
        } else {
            $this->assertTrue($this->app->bound('db.connection.pgsql'));
        }
    }

    public function testSqliteConnectionRegistered()
    {
        if ($this->detection->isConnectionResolver(FeatureDetection::CONNECTION_RESOLVER_METHOD)) {
            $this->assertNotNull(Connection::getResolver('sqlite'));
        } else {
            $this->assertTrue($this->app->bound('db.connection.sqlite'));
        }
    }

    public function testSqlsrvConnectionRegistered()
    {
        if ($this->detection->isConnectionResolver(FeatureDetection::CONNECTION_RESOLVER_METHOD)) {
            $this->assertNotNull(Connection::getResolver('sqlsrv'));
        } else {
            $this->assertTrue($this->app->bound('db.connection.sqlsrv'));
        }
    }
}
