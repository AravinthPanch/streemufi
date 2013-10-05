<?php

require_once("bootstrap.php");

use streemufi\web\FreemufiModule;
use streemufi\WebApplication;

$route = $_REQUEST['_'];
unset($_REQUEST['_']);
$request = $_REQUEST['-'];
unset($_REQUEST['-']);

$app = new WebApplication($route, FreemufiModule::$CLASS);
$app->handleRequest($request);
