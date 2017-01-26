<?php
/**
 * Created by PhpStorm.
 * User: Ricardo
 * Date: 17/11/2015
 * Time: 09:59
 */

namespace Egressos\FaleConosco\Controller\Factory;


use Cupcake\Request\RequestManager;
use Cupcake\Service\ServiceManager;
use Egressos\FaleConosco\Controller\FaleConoscoController;
use Egressos\FaleConosco\MailSender\FaleConoscoMailSender;
use League\Plates\Engine;

final class FaleConoscoControllerFactory
{
    public function __invoke(ServiceManager $serviceManager)
    {
        /** @var FaleConoscoMailSender $mailSender */
        $mailSender = $serviceManager->get('FaleConoscoMailSender');
        /** @var Engine $templateEngine */
        $templateEngine = $serviceManager->get('Renderer');
        /** @var RequestManager $requestManager */
        $requestManager = $serviceManager->get('RequestManager');

        return new FaleConoscoController($templateEngine, $mailSender, $requestManager);
    }
}
