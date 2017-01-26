<?php
error_reporting(E_ALL);
/* @var $app \Cupcake\Application\Application */
$app = require_once __DIR__ . '/bootstrap.php';
echo $app->run();
