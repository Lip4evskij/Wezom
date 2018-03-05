<?php
require_once 'core/autoloader.php';
require_once 'core/request.php';
$request=new Request();
require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';
require_once 'core/route.php';
$route= new Route();
$route->start();
