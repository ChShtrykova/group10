<?php

session_start();

use core\App;
use core\database\QueryBuilder;
use core\Router;
use core\database\Connector;

require "vendor/autoload.php";

App::set('config', require "config.php");
App::set('query', new QueryBuilder( Connector::getConnection(App::get('config')['database']) ));

$title = 'Мой Сайт';
$pageTitle = "Мой Сайт";

$routers = new Router();
