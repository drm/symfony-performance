<?php
/**
 * For licensing information, please see the LICENSE file accompanied with this file.
 *
 * @author Gerard van Helden <drm@melp.nl>
 * @copyright 2012 Gerard van Helden <http://melp.nl>
 */

if (!isset($GLOBALS['services']['doctrine.orm.default_manager_configurator'])) {
    $GLOBALS['services']['doctrine.orm.default_manager_configurator'] = new \Doctrine\Bundle\DoctrineBundle\ManagerConfigurator(array(), array());
}

return $GLOBALS['services']['doctrine.orm.default_manager_configurator'];

