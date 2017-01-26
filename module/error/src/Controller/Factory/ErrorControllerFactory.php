<?php
namespace Egressos\Error\Controller\Factory;

use Cupcake\Service\ServiceManager;
use Egressos\Error\Controller\ErrorController;

class ErrorControllerFactory
{

    public function __invoke(ServiceManager $serviceManager)
    {
        $configManager = $serviceManager->get('ConfigManager');
        $templateEngine = $serviceManager->get('Renderer');

        return new ErrorController($configManager, $templateEngine);
    }

}
