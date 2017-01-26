<?php
/**
 * Created by PhpStorm.
 * User: ricardo
 * Date: 27/10/16
 * Time: 15:57
 */

namespace Egressos\Application\Controller\Factory;


use Cupcake\ObjectMapper\ObjectMapper;
use Cupcake\Request\RequestManager;
use Cupcake\Service\ServiceManager;
use Egressos\Application\Controller\OportunidadesController;
use Egressos\Application\Manager\UserManager;

class OportunidadesControllerFactory
{
    /**
     * @param ServiceManager $serviceManager
     * @return OportunidadesController
     * @throws \Cupcake\Service\Exception\ContainerException
     * @throws \Cupcake\Service\Exception\NotFoundException
     */
    public function __invoke(ServiceManager $serviceManager)
    {
        $templateEngine = $serviceManager->get('Renderer');
        $userManager = $serviceManager->get('UserManager');
        $requestManager = $serviceManager->get('RequestManager');
        $objectMapper = $serviceManager->get('DataHelper');
        return new OportunidadesController($templateEngine, $userManager, $requestManager, $objectMapper);
    }
}
