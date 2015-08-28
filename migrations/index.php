<?php

use Nextras\Migrations\Bridges;
use Nextras\Migrations\Controllers;
use Nextras\Migrations\Drivers;
use Nextras\Migrations\Extensions;

/** @var Nette\DI\Container $dic */
$dic = require __DIR__ . '/../app/bootstrap.php';

$conn = $dic->getByType('Nextras\Dbal\Connection');
$dbal = new Bridges\NextrasDbal\NextrasAdapter($conn);
$driver = new Drivers\MySqlDriver($dbal);
$controller = new Controllers\HttpController($driver);

$baseDir = __DIR__;
$controller->addGroup('structures', "$baseDir/structures");
$controller->addGroup('basic-data', "$baseDir/basic-data", ['structures']);
$controller->addGroup('dummy-data', "$baseDir/dummy-data", ['basic-data']);
$controller->addExtension('sql', new Extensions\SqlHandler($driver));

$controller->run();
