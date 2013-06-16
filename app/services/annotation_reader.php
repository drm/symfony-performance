<?php
/**
 * For licensing information, please see the LICENSE file accompanied with this file.
 *
 * @author Gerard van Helden <drm@melp.nl>
 * @copyright 2012 Gerard van Helden <http://melp.nl>
 */

if (!isset($GLOBALS['services']['annotation_reader'])) {
    $GLOBALS['services']['annotation_reader'] = new \Doctrine\Common\Annotations\FileCacheReader(
        new \Doctrine\Common\Annotations\AnnotationReader(),
        APP_ROOT . '/cache/prod/annotations',
        false
    );
}

return $GLOBALS['services']['annotation_reader'];