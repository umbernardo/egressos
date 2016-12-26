<?php
/**
 * Created by PhpStorm.
 * User: Ricardo Bernardo
 * Date: 17/11/2015
 * Time: 09:35
 */
return array(
    'services' => array(
        'PHPMailer' => '\Egressos\Mailer\Factory\PHPMailerFactory',
    ),
    'renderer' => array(
        'viewFolders' => array(
            'mailer' => __DIR__ . '/../view/mailer/',
            'mailer-layout' => __DIR__ . '/../view/layout/',
        ),
    ),
);
