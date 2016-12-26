<?php
error_reporting(E_ALL);
/* @var $app \Cupcake\Application\Application */
$app = require_once __DIR__ . '/bootstrap.php';
try {
    echo $app->run();
} catch (Exception $e) {
    die($e->getMessage());
}
