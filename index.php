<?php

use Crawlers\Controllers\BaseController;
use Crawlers\Models\Database;

use Toanlt\Crawler\Router;

require_once __DIR__ . '/vendor/autoload.php';

$Db_Host = $_SERVER['DB_HOST'];
$Db_Name = $_SERVER['DB_NAME'];
$Db_Username = $_SERVER['DB_USERNAME'];
$Db_Password = $_SERVER['DB_PASSWORD'];
const BASE_PATH = __DIR__;
const VIEW_PATH = BASE_PATH . '/views';
$database = new Database($Db_Host, $Db_Name, $Db_Username, $Db_Password);

$route = new Router();
$route->post('/crawler', [new BaseController($database), 'load']);
$route->get('/crawler', [new BaseController($database), 'form']);

$route->dispatch();