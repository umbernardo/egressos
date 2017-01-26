<?php
/**
 * Created by PhpStorm.
 * User: Ricardo
 * Date: 17/11/2015
 * Time: 09:25
 */

return array(
    'routes' => array(
        'fale-conosco' => array(
            'route' => '/fale-conosco',
            'controller' => 'FaleConoscoController',
            'action' => 'Index'
        ),
        'fale-conosco-sucesso' => array(
            'route' => '/fale-conosco/sucesso',
            'controller' => 'FaleConoscoController',
            'action' => 'Success'
        ),
        'fale-conosco-erro' => array(
            'route' => '/fale-conosco/erro',
            'controller' => 'FaleConoscoController',
            'action' => 'Error'
        ),
    ),
    'services' => array(
        'FaleConoscoMailSender' => '\Egressos\FaleConosco\MailSender\Factory\FaleConoscoMailSenderFactory',
    ),
    'controllers' => array(
        'FaleConoscoController' => '\Egressos\FaleConosco\Controller\Factory\FaleConoscoControllerFactory',
    ),
    'renderer' => array(
        'viewFolders' => array(
            'faleConosco' => __DIR__ . '/../view/',
        ),
    ),
);
