<?php
/**
 * Created by PhpStorm.
 * User: ricardo
 * Date: 07/12/16
 * Time: 16:40
 */

namespace Egressos\Application\Manager\Factory;

use Cupcake\Request\RequestManager;
use Cupcake\Service\ServiceManager;
use Egressos\Application\Manager\UserManager;

class UserManagerFactory
{

    /**
     * @param ServiceManager $serviceManager
     * @return UserManager
     * @throws \Cupcake\Service\Exception\ContainerException
     * @throws \Cupcake\Service\Exception\NotFoundException
     */
    public function __invoke(ServiceManager $serviceManager)
    {
        $dataHelper = $serviceManager->get('DataHelper');
        $requestManager = $serviceManager->get(RequestManager::class);
        $pdo = $serviceManager->get('PDO');

        return new UserManager($dataHelper, $requestManager, $pdo);
    }
}
