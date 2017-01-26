<?php
/**
 * Created by PhpStorm.
 * User: Ricardo
 * Date: 30/10/2015
 * Time: 10:30
 */

return array(
    'routes' => array(
        'Salvar Newsletter' => array(
            'route' => '/newsletter/salvar',
            'controller' => 'NewsletterController',
            'action' => 'SalvarNewsletter'
        ),
        'newsletter-sucesso' => array(
            'route' => '/newsletter/sucesso',
            'controller' => 'NewsletterController',
            'action' => 'Sucesso'
        ),
        'newsletter-erro' => array(
            'route' => '/newsletter/erro',
            'controller' => 'NewsletterController',
            'action' => 'Erro'
        ),

    ),
    'controllers' => array(
        'NewsletterController' => '\Egressos\Newsletter\Controller\Factory\NewsletterControllerFactory',
    ),
    'renderer' => array(
        'viewFolders' => array(
            'newsletter' => __DIR__ . '/../view/',
        ),
    ),
);
