<?php
/**
 * Created by PhpStorm.
 * User: ricardo
 * Date: 09/12/16
 * Time: 15:12
 */

namespace Egressos\Application\Controller\Factory;


use Cupcake\Request\RequestManager;
use Cupcake\Service\ServiceManager;
use Egressos\Application\Controller\CadastroController;

class CadastroControllerFactory
{
    /**
     * @param ServiceManager $serviceManager
     * @return CadastroController
     * @throws \Cupcake\Service\Exception\ContainerException
     * @throws \Cupcake\Service\Exception\NotFoundException
     */
    public function __invoke(ServiceManager $serviceManager)
    {
        $templateEngine = $serviceManager->get('Renderer');
        $dataHelper = $serviceManager->get('DataHelper');
        $usuarioValidator = $serviceManager->get('UsuarioValidator');
        $requestManager = $serviceManager->get(RequestManager::class);
        $pdo = $serviceManager->get(\PDO::class);
        return new CadastroController($requestManager, $templateEngine, $dataHelper, $usuarioValidator, $pdo);
    }
}
