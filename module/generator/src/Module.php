<?php
/**
 * Created by PhpStorm.
 * User: Ricardo
 * Date: 29/10/2015
 * Time: 17:10
 */

namespace Egressos\Generator;


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
