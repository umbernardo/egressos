<?php
namespace Egressos\Newsletter\Controller\Factory;

use Cupcake\Request\RequestManager;
use Cupcake\Service\ServiceManager;
use Cupcake\Url\UrlGenerator;
use Egressos\Newsletter\Controller\NewsletterController;

class NewsletterControllerFactory
{

    /**
     * @param ServiceManager $serviceManager
     * @return NewsletterController
     * @throws \Cupcake\Service\Exception\ContainerException
     * @throws \Cupcake\Service\Exception\NotFoundException
     */
    public function __invoke(ServiceManager $serviceManager)
    {
        $templateEngine = $serviceManager->get('Renderer');
        $requestManager = $serviceManager->get('RequestManager');
        $objectMapper = $serviceManager->get('DataHelper');
        $flashMessenger = $serviceManager->get('FlashMessenger');
        $pdo = $serviceManager->get('PDO');
        $urlGenerator = $serviceManager->get('UrlGenerator');

        return new NewsletterController(
            $templateEngine,
            $requestManager,
            $objectMapper,
            $flashMessenger,
            $pdo,
            $urlGenerator
        );
    }

}
