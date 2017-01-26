<?php
namespace Egressos\Generator\Controller\Factory;

use Cupcake\Service\ServiceManager;
use Egressos\Generator\Controller\GeneratorController;
use League\Plates\Engine;

/**
 * @author Ricardo
 */
class GeneratorControllerFactory
{

    function __invoke(ServiceManager $serviceManager)
    {
        /** @var Engine $engine */
        $engine = $serviceManager->get('Renderer');

        return new GeneratorController($engine);
    }

}
