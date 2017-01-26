<?php
/**
 * Created by PhpStorm.
 * User: Ricardo
 * Date: 17/11/2015
 * Time: 15:21
 */

namespace Egressos\TrabalheConosco\Controller\Factory;


use Cupcake\Request\RequestManager;
use Cupcake\Service\ServiceManager;
use Egressos\FaleConosco\MailSender\FaleConoscoMailSender;
use Egressos\TrabalheConosco\Controller\TrabalheConoscoController;
use League\Plates\Engine;

class TrabalheConoscoControllerFactory
{
    /**
     * @return TrabalheConoscoController
     */
    public function __invoke(ServiceManager $serviceManager)
    {
        /** @var FaleConoscoMailSender $mailSender */
        $mailSender = $serviceManager->get('TrabalheConoscoMailSender');
        /** @var Engine $templateEngine */
        $templateEngine = $serviceManager->get('Renderer');
        /** @var RequestManager $requestManager */
        $requestManager = $serviceManager->get('RequestManager');

        return new TrabalheConoscoController($templateEngine, $mailSender, $requestManager);
    }
}
