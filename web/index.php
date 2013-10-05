<?php

require_once("bootstrap.php");

use streemufi\web\StreemufiModule;
use streemufi\WebApplication;

$route = $_REQUEST['_'];
unset($_REQUEST['_']);
$request = $_REQUEST['-'];
unset($_REQUEST['-']);

$app = new WebApplication($route, StreemufiModule::$CLASS);
$app->handleRequest($request);
