<?php

session_start();
error_reporting(E_ALL & ~E_NOTICE);

/** @var \Cupcake\Application\Application $app */
$app = require __DIR__ . '/../../bootstrap.php';

/** @var \Cupcake\Request\RequestManager $rm */
$rm = $app->getServiceManager()->get(\Cupcake\Request\RequestManager::class);

$baseUrl = $rm->getContext()->getBaseUrl();
$painelBaseUrl = explode('/painel', $baseUrl);
define('BASE_URL', reset($painelBaseUrl) . '/painel/');
define('PAINEL_BASE_URL', BASE_URL);

if (empty($_SESSION['admin_usuario_logado'])) {
    //$_SESSION['pagina_acessada'] = $_SERVER['PHP_SELF'];
    $expld = explode("/", $_SERVER['PHP_SELF']);
    header("Location: logon.php?p=" . end($expld));
}
