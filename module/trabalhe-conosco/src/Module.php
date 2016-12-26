<?php
/**
 * Created by PhpStorm.
 * User: Ricardo Bernardo
 * Date: 17/11/2015
 * Time: 15:20
 */

namespace Egressos\TrabalheConosco;


class Module
{
    public function getConfig()
    {
        return require __DIR__ . '/../config/config.php';
    }
}
