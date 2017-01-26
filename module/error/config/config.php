<?php
/**
 * Created by PhpStorm.
 * User: Ricardo
 * Date: 29/10/2015
 * Time: 17:10
 */

return array(
    'renderer' => array(
        'viewFolders' => array(
            'error' => __DIR__ . '/../view/',
        ),
    ),
    'controllers'=> array(
        'ErrorController' => '\Egressos\Error\Controller\Factory\ErrorControllerFactory',
    ),
);
