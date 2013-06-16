<?php
/**
 * For licensing information, please see the LICENSE file accompanied with this file.
 *
 * @author Gerard van Helden <drm@melp.nl>
 * @copyright 2012 Gerard van Helden <http://melp.nl>
 */

if (!isset($GLOBALS['services']['doctrine_connection_factory'])) {
    $GLOBALS['services']['doctrine_connection_factory'] = new \Doctrine\Bundle\DoctrineBundle\ConnectionFactory(array());
}

return $GLOBALS['services']['doctrine_connection_factory'];
