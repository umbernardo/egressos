<?php
/**
 * Created by PhpStorm.
 * User: Ricardo Bernardo
 * Date: 29/10/2015
 * Time: 15:59
 */

namespace Egressos\Application\Renderer\Factory;


use Cupcake\Config\ConfigManager;
use Cupcake\Request\RequestManager;
use Cupcake\Service\ServiceManager;
use Cupcake\Url\UrlGenerator;
use League\Plates\Engine;

class RendererFactory
{
    /**
     * @param ServiceManager $serviceManager
     * @return Engine
     * @throws \Cupcake\Service\Exception\ContainerException
     * @throws \Cupcake\Service\Exception\NotFoundException
     * @throws \Exception
     */
    public function __invoke(ServiceManager $serviceManager)
    {
        /** @var ConfigManager $config */
        $config = $serviceManager->get('ConfigManager');

        /** @var UrlGenerator $urlGenerator */
        $urlGenerator = $serviceManager->get(UrlGenerator::class);

        //Instantiate and add view folders
        $renderer = new Engine();
        foreach ($config->getNode('renderer')->get('viewFolders') as $alias => $folder) {
            $renderer->addFolder($alias, $folder);
        }

        $renderer->setFileExtension('phtml');
        $renderer->registerFunction('getPublicAssetsUrl', function () use ($urlGenerator) {
            return $urlGenerator->generateUrl(array('public_assets'));
        });

        $renderer->registerFunction('url', function ($caminho = '', $urlBase = '') use ($urlGenerator) {
            return $urlGenerator->generateUrl($caminho, $urlBase);
        });

        $renderer->registerFunction('date', function ($date) {
            return \DateTime::createFromFormat('Y-m-d', $date);
        });

        $renderer->registerFunction('resumir', function ($text, $maxWords = 20) {
            $text = strip_tags($text);
            $text = trim(preg_replace("/\s+/", " ", $text));
            $word_array = explode(" ", $text);
            if (count($word_array) <= $maxWords) {
                return implode(" ", $word_array);
            } else {
                $text = '';
                foreach ($word_array as $length => $word) {
                    $text .= $word;
                    if ($length == $maxWords) {
                        break;
                    } else {
                        $text .= " ";
                    }
                }
            }

            return $text;
        });

        $renderer->registerFunction('getClientIp', function () {
            $ip = $_SERVER['REMOTE_ADDR'];
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            }

            return $ip;
        });

        $dataHelper = $serviceManager->get('DataHelper');
        $renderer->registerFunction('getTextoGeral', function ($cod) use ($dataHelper) {
            return $dataHelper->getTextoGeral($cod);
        });

        $requestManager = $serviceManager->get(RequestManager::class);
        $pathInfo = $requestManager->getContext()->getPathInfo();
        $urlAtual = explode('/', ltrim($pathInfo, '/'));
        $paginaAtual = reset($urlAtual);
        if (empty($paginaAtual)) {
            $paginaAtual = 'home';
        }

        $banner = $serviceManager->get('DataHelper')->listar('banner')->registros;
        $renderer->addData(
            array(
                'urlAtual' => $urlAtual,
                'paginaAtual' => $paginaAtual,
                'siteInfo' => $serviceManager->get('DataHelper')->ver('sys_config'),
                'baseUrl' => $requestManager->getBaseUrl(),
                'banner' => reset($banner),
            )
        );

        return $renderer;

    }
}
