<?php
require_once "core/Errors.class.php";
require_once "core/Entity.class.php";
require_once "core/Model.class.php";
require_once "core/Controller.class.php";
require_once "core/Router.class.php";
require_once "core/Dispatcher.class.php";
$router = new Router();
$router->parseURL();