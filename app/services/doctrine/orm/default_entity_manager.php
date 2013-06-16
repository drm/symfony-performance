<?php
/**
 * For licensing information, please see the LICENSE file accompanied with this file.
 *
 * @author Gerard van Helden <drm@melp.nl>
 * @copyright 2012 Gerard van Helden <http://melp.nl>
 */

if (!isset($GLOBALS['services']['doctrine.orm.default_entity_manager'])) {
    $a = new \Doctrine\Common\Cache\ArrayCache();
    $a->setNamespace('sf2orm_default_4dc499e16de01377f9d213983ffb38f4');
    $b = new \Doctrine\Common\Cache\ArrayCache();
    $b->setNamespace('sf2orm_default_4dc499e16de01377f9d213983ffb38f4');
    $c = new \Doctrine\Common\Cache\ArrayCache();
    $c->setNamespace('sf2orm_default_4dc499e16de01377f9d213983ffb38f4');
    $d = new \Doctrine\ORM\Mapping\Driver\DriverChain();
    $d->addDriver(new \Doctrine\ORM\Mapping\Driver\AnnotationDriver(
        include APP_ROOT . '/services/annotation_reader.php',
        array(
            0 => APP_ROOT . '/../src/Melp/TestingBundle/Entity')
        ),
        'Melp\\TestingBundle\\Entity'
    );
    $e = new \Doctrine\ORM\Configuration();
    $e->setEntityNamespaces(
        array('MelpTestingBundle' => 'Melp\\TestingBundle\\Entity')
    );
    $e->setMetadataCacheImpl($a);
    $e->setQueryCacheImpl($b);
    $e->setResultCacheImpl($c);
    $e->setMetadataDriverImpl($d);
    $e->setProxyDir(APP_ROOT . '/cache/prod/doctrine/orm/Proxies');
    $e->setProxyNamespace('Proxies');
    $e->setAutoGenerateProxyClasses(false);
    $e->setClassMetadataFactoryName('Doctrine\\ORM\\Mapping\\ClassMetadataFactory');
    $e->setDefaultRepositoryClassName('Doctrine\\ORM\\EntityRepository');
    $e->setNamingStrategy(new \Doctrine\ORM\Mapping\DefaultNamingStrategy());

    $GLOBALS['services']['doctrine.orm.default_entity_manager']
        = call_user_func(
            array('Doctrine\\ORM\\EntityManager', 'create'),
            include APP_ROOT . '/services/doctrine/dbal/default_connection.php',
            $e
        );

    $configurator = include APP_ROOT . '/services/doctrine/orm/default_manager_configurator.php';
    $configurator->configure($GLOBALS['services']['doctrine.orm.default_entity_manager']);
}

return $GLOBALS['services']['doctrine.orm.default_entity_manager'];
