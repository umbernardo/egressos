<?php
/**
 * Created by PhpStorm.
 * User: ricardo
 * Date: 09/12/16
 * Time: 15:07
 */

namespace Egressos\Application\Controller\Factory;


use Cupcake\Request\RequestManager;
use Cupcake\Service\ServiceManager;
use Egressos\Application\Controller\LoginController;
use Egressos\Application\Manager\UserManager;

class LoginControllerFactory
{
    /**
     * @param ServiceManager $serviceManager
     * @return LoginController
     * @throws \Cupcake\Service\Exception\ContainerException
     * @throws \Cupcake\Service\Exception\NotFoundException
     */
    public function __invoke(ServiceManager $serviceManager)
    {
        $templateEngine = $serviceManager->get('Renderer');
        $requestManager = $serviceManager->get(RequestManager::class);
        $userManager = $serviceManager->get(UserManager::class);

        return new LoginController($userManager, $templateEngine, $requestManager);
    }

}
