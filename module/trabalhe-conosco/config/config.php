<?php
/**
 * Created by PhpStorm.
 * User: Ricardo
 * Date: 17/11/2015
 * Time: 15:20
 */
return array(
    'routes' => array(
        'trabalhe-conosco' => array(
            'route' => '/trabalhe-conosco',
            'controller' => 'TrabalheConoscoController',
            'action' => 'Index',
        ),
        'trabalhe-conosco-sucesso' => array(
            'route' => '/trabalhe-conosco/sucesso',
            'controller' => 'TrabalheConoscoController',
            'action' => 'Success',
        ),
        'trabalhe-conosco-erro' => array(
            'route' => '/trabalhe-conosco/erro',
            'controller' => 'TrabalheConoscoController',
            'action' => 'Error',
        ),
    ),
    'services' => array(
        'TrabalheConoscoMailSender' => '\Egressos\TrabalheConosco\MailSender\Factory\TrabalheConoscoMailSenderFactory',
    ),
    'controllers' => array(
        'TrabalheConoscoController' => '\Egressos\TrabalheConosco\Controller\Factory\TrabalheConoscoControllerFactory',
    ),
    'renderer' => array(
        'viewFolders' => array(
            'trabalheConosco' => __DIR__ . '/../view/',
        ),
    ),
);
