<?php
/**
 * Created by PhpStorm.
 * User: ricardo
 * Date: 26/01/17
 * Time: 12:01
 */

namespace Egressos\Application\Controller\Factory;


use Cupcake\Service\ServiceManager;
use Cupcake\Url\UrlGenerator;

class TestFactory
{
    public function __invoke(ServiceManager $serviceManager)
    {
        return new UrlGenerator($serviceManager->get('RequestManager'));
    }
}
