<?php
namespace Egressos\Newsletter;

/**
 * Created by PhpStorm.
 * User: Ricardo
 * Date: 30/10/2015
 * Time: 10:29
 */
class Module
{
    public function getConfig()
    {
        return require __DIR__ . '/../config/config.php';
    }
}
