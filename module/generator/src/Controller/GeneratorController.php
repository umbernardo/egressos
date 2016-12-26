<?php
namespace Egressos\Generator\Controller;

use League\Plates\Engine;

/**
 * @author Ricardo Bernardo
 */
final class GeneratorController
{
    /**
     * @var Engine
     */
    private $templateEngine;


    /**
     * GeneratorController constructor.
     * @param Engine $templateEngine
     */
    public function __construct(Engine $templateEngine)
    {
        $this->templateEngine = $templateEngine;
    }

    public function actionGenerateSiteControllerFromViews()
    {
        $s = scandir($this->getViewDir());
        foreach ($s as $f) {
            if ($f != '.' && $f != '..') {
                $view = str_replace('.php', '', $f);
                $action = $this->getActionName($view);
                echo $this->templateEngine->render('generator::viewSiteControllerGenerator',
                    array('view' => $view, 'action' => $action));
            }
        }
    }

    /**
     *
     */
    public function actionGenerateRoutesFromViews()
    {
        $s = scandir($this->getViewDir());
        foreach ($s as $f) {
            if ($f != '.' && $f != '..') {
                $view = str_replace('.php', '', $f);
                $nome = $view;
                $action = $this->getActionName($view);
                $controller = 'SiteController';
                echo $this->templateEngine->render('generator::viewGenerateRoutesFromViews',
                    array('nome' => $nome, 'route' => $view, 'controller' => $controller, 'action' => $action));
            }
        }
    }

    public function getViewDir()
    {
        return __DIR__ . '/../../../../module/application/view/site/';
    }

    /**
     * @param $view
     * @return string
     */
    public function getActionName($view)
    {
        $nameList = explode('-', $view);
        $action = '';
        foreach ($nameList as $actionName) {
            $action .= ucfirst($actionName);
        }

        return $action;
    }

}
