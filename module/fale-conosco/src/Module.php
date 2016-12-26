<?php
/**
 * Created by PhpStorm.
 * User: Ricardo Bernardo
 * Date: 17/11/2015
 * Time: 09:25
 */

namespace Egressos\FaleConosco;


class Module
{
    public function getConfig()
    {
        return require __DIR__ . '/../config/config.php';
    }
}
