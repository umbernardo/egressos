<?php

/* @var $app \Cupcake\Core\CupCake */

$app = require_once __DIR__ . '/bootstrap.php';
$entityManager = $app->getServiceManager()->get('EntityManager');
return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);