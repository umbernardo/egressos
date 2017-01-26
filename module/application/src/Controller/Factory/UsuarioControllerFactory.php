<?php
/**
 * Created by PhpStorm.
 * User: ricardo
 * Date: 27/10/16
 * Time: 15:57
 */

namespace Egressos\Application\Controller\Factory;


use Cupcake\Request\RequestManager;
use Cupcake\Service\ServiceManager;
use Egressos\Application\Controller\UsuarioController;
use Egressos\Application\Manager\UserManager;

class UsuarioControllerFactory
{
    /**
     * @param ServiceManager $serviceManager
     * @return UsuarioController
     * @throws \Cupcake\Service\Exception\ContainerException
     * @throws \Cupcake\Service\Exception\NotFoundException
     */
    public function __invoke(ServiceManager $serviceManager)
    {
        $templateEngine = $serviceManager->get('Renderer');
        $userManager = $serviceManager->get('UserManager');
        $requestManager = $serviceManager->get('RequestManager');
        return new UsuarioController($templateEngine, $userManager, $requestManager);
    }
}
