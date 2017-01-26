<?php
namespace Egressos\Error\Controller;

use Cupcake\Config\ConfigManager;
use Exception;
use League\Plates\Engine;

/**
 * @author Ricardo
 */
final class ErrorController
{
    /**
     * @var ConfigManager
     */
    private $configManager;
    /**
     * @var Engine
     */
    private $templateEngine;

    /**
     * ErrorController constructor.
     * @param ConfigManager $configManager
     * @param Engine $templateEngine
     */
    public function __construct(ConfigManager $configManager, Engine $templateEngine)
    {
        $this->configManager = $configManager;
        $this->templateEngine = $templateEngine;
    }

    /**
     * @return string
     */
    public function actionError404()
    {
        header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
        header("Status: 404 Not Found");
        $_SERVER['REDIRECT_STATUS'] = 404;

        return $this->templateEngine->render('error::erro_404');
    }

    /**
     * @param Exception $exception
     * @param array $others
     * @return string
     */
    public function actionError500(Exception $exception, array $others = array())
    {
        header($_SERVER["SERVER_PROTOCOL"] . " 500 Internal Server Error");
        header("Status: 500 Internal Server Error");
        $_SERVER['REDIRECT_STATUS'] = 500;

        return $this->templateEngine->render('error::erro_geral', array(
            'exception' => $exception,
            'others' => $others,
            'debug' => $this->configManager->get('debug'),
            'title' => 'Error 500',
        ));
    }

}
