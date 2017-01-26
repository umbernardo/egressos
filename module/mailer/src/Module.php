<?php
/**
 * Created by PhpStorm.
 * User: Ricardo
 * Date: 17/11/2015
 * Time: 11:21
 */

namespace Egressos\Mailer;


class Module
{
    public function getConfig()
    {
        return require __DIR__ . '/../config/config.php';
    }
}
