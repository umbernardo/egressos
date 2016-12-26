<?php
namespace Egressos\Application\Controller\Factory;

use Cupcake\Request\RequestManager;
use Cupcake\Service\ServiceManager;
use Egressos\Application\Controller\SiteController;
use Egressos\Application\Manager\UserManager;

class SiteControllerFactory
{

    /**
     * @param ServiceManager $serviceManager
     * @return SiteController
     * @throws \Cupcake\Service\Exception\ContainerException
     * @throws \Cupcake\Service\Exception\NotFoundException
     */
    public function __invoke(ServiceManager $serviceManager)
    {
        $templateEngine = $serviceManager->get('Renderer');
        $dataHelper = $serviceManager->get('DataHelper');
        $userManager = $serviceManager->get(UserManager::class);
        $requestManager = $serviceManager->get(RequestManager::class);

        return new SiteController($templateEngine, $dataHelper, $userManager, $requestManager);
    }

}
