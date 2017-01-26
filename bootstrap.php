<?php

use Cupcake\Application\Application;
use Cupcake\Config\ConfigManager;

require_once __DIR__ . '/vendor/autoload.php';

/*
 * Ajuste de hora
 */
if (function_exists('date_default_timezone_set')) {
    date_default_timezone_set('Brazil/East');
}
/*
 * Ajuste de Locale
 */
setlocale(LC_ALL, "pt_BR", "ptb");

$config = array();
$config = array_merge($config, require_once __DIR__ . '/config/application.config.php');

foreach (glob(__DIR__ . '/config/autoload/{{,*.}global,{,*.}local}.php', GLOB_BRACE) as $filename) {
    $config = array_merge($config, require_once $filename);
}

foreach ($config['modules'] as $moduleName => $moduleClassName) {
    $moduleClass = new $moduleClassName;
    $config = array_merge_recursive($config, $moduleClass->getConfig());
}
$configManager = new ConfigManager();
$configManager->setConfigFromArray($config);
$app = new Application($configManager);
return $app;
