<?php

namespace Scraps;

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once $_SERVER['DOCUMENT_ROOT'] . '/components/Router.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/dbConfig.php';

$router = new Router();
$router->run();
