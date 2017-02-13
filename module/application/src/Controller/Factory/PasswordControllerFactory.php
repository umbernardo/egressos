<?php
/**
 * Created by PhpStorm.
 * User: ricardo
 * Date: 11/02/17
 * Time: 09:26
 */

namespace Egressos\Application\Controller\Factory;


use Cupcake\Service\ServiceManager;
use Egressos\Application\Controller\PasswordController;

class PasswordControllerFactory
{
    /**
     * @param ServiceManager $serviceManager
     * @return PasswordController
     * @throws \Cupcake\Service\Exception\ContainerException
     * @throws \Cupcake\Service\Exception\NotFoundException
     */
    public function __invoke(ServiceManager $serviceManager)
    {
        $templateEngine = $serviceManager->get('Renderer');
        $userManager = $serviceManager->get('UserManager');
        $requestManager = $serviceManager->get('RequestManager');
        $mailer = $serviceManager->get('PHPMailer');
        return new PasswordController($templateEngine, $userManager, $requestManager, $mailer, '');
    }
}
