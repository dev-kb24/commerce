<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once "core/Errors.class.php";
require_once "core/Entity.class.php";
require_once "core/Model.class.php";
require_once "core/Controller.class.php";
require_once "core/Auth.class.php";
require_once "core/Router.class.php";
require_once "core/Dispatcher.class.php";
$router = new Router();
$router->call();