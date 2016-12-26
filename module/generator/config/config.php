<?php
/**
 * Created by PhpStorm.
 * User: Ricardo Bernardo
 * Date: 16/11/2015
 * Time: 10:49
 */

return array(
    'routes' => array(
        'generateSiteControllerFromViews' => array(
            'route' => '/generateSiteControllerFromViews',
            'controller' => 'GeneratorController',
            'action' => 'GenerateSiteControllerFromViews'
        ),
        'generateRoutesFromViews' => array(
            'route' => '/generateRoutesFromViews',
            'controller' => 'GeneratorController',
            'action' => 'GenerateRoutesFromViews'
        ),
    ),
    'controllers' => array(
        'GeneratorController' => '\Egressos\Generator\Controller\Factory\GeneratorControllerFactory',
    ),
    'renderer' => array(
        'viewFolders' => array(
            'generator' => __DIR__ . '/../view/',
        ),
    ),
);
