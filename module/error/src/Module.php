<?php
/**
 * Created by PhpStorm.
 * User: Ricardo Bernardo
 * Date: 29/10/2015
 * Time: 17:10
 */

namespace Egressos\Error;


class Module
{
    /**
     * @return array
     */
    public function getConfig()
    {
        return require __DIR__ . '/../config/config.php';
    }
}
