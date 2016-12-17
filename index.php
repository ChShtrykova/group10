<?php
require_once "core/bootstrap.php";

use core\Router;

Router::load('routers')
    ->run();