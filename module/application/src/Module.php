<?php
/**
 * Created by PhpStorm.
 * User: Ricardo Bernardo
 * Date: 29/10/2015
 * Time: 10:33
 */

namespace Egressos\Application;


class Module
{
    public function getConfig(){
        return require __DIR__.'/../config/config.php';
    }
}
