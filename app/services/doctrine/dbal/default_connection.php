<?php
/**
 * For licensing information, please see the LICENSE file accompanied with this file.
 *
 * @author Gerard van Helden <drm@melp.nl>
 * @copyright 2012 Gerard van Helden <http://melp.nl>
 */

if (!isset($GLOBALS['services']['doctrine.dbal.default_connection'])) {
    $factory = include APP_ROOT . '/services/doctrine/dbal/connection_factory.php';

    $GLOBALS['services']['doctrine.dbal.default_connection'] = $factory->createConnection(
        array(
            'dbname' => 'perftest',
            'host' => '127.0.0.1',
            'port' => NULL,
            'user' => 'dev',
            'password' => NULL,
            'charset' => 'UTF8',
            'driver' => 'pdo_mysql',
            'driverOptions' => array()
        ),
        new \Doctrine\DBAL\Configuration(),
        null,
        // we skip this, because we aren't using it, and to be frank, anything that is "container aware"
        // should be questioned anyway.
//        new \Symfony\Bridge\Doctrine\ContainerAwareEventManager($this),
        array()
    );
}


return $GLOBALS['services']['doctrine.dbal.default_connection'];