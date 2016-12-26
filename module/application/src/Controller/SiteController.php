<?php
namespace Egressos\Application\Controller;

use Cupcake\ObjectMapper\ObjectMapper;
use Cupcake\Request\RequestManager;
use Egressos\Application\Manager\UserManager;
use League\Plates\Engine;

final class SiteController
{
    /**
     * @var Engine
     */
    private $templateEngine;
    /**
     * @var ObjectMapper
     */
    private $dataHelper;
    /**
     * @var UserManager
     */
    private $userManager;
    /**
     * @var RequestManager
     */
    private $requestManager;

    /**
     * SiteController constructor.
     * @param Engine $templateEngine
     * @param ObjectMapper $dataHelper
     * @param UserManager $userManager
     * @param RequestManager $requestManager
     */
    public function __construct(
        Engine $templateEngine,
        ObjectMapper $dataHelper,
        UserManager $userManager,
        RequestManager $requestManager
    )
    {
        $this->templateEngine = $templateEngine;
        $this->dataHelper = $dataHelper;
        $this->userManager = $userManager;
        $this->requestManager = $requestManager;
    }

    /**
     * @return string
     */
    public function actionHome()
    {
        if (true == $this->userManager->usuarioEstaLogado()) {
            return $this->requestManager->redirect('/dashboard');
        }
        return $this->templateEngine->render('site::home', array());
    }

}
