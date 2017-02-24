<?php

namespace ShiftOneLabs\LaravelNomad;

use Illuminate\Database\Connection;

class FeatureDetection
{
    /**
     * Resolve the connection via bindings.
     *
     * @var string
     */
    const CONNECTION_RESOLVER_BINDINGS = 'bindings';

    /**
     * Resolve the connection via the connection resolver method.
     *
     * @var string
     */
    const CONNECTION_RESOLVER_METHOD = 'connection-method';

    /**
     * Determine the driver for resolving the connection.
     *
     * @return string
     */
    public function connectionResolverDriver()
    {
        if (method_exists(Connection::class, 'resolverFor')) {
            return self::CONNECTION_RESOLVER_METHOD;
        }

        return self::CONNECTION_RESOLVER_BINDINGS;
    }

    /**
     * Check if the connection resolver method is of the given type.
     *
     * @param  string  $driver
     *
     * @return bool
     */
    public function isConnectionResolver($driver)
    {
        return $this->connectionResolverDriver() == $driver;
    }
}
