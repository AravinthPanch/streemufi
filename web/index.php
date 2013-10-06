<?php

$factory = require_once("bootstrap.php");

use streemufi\web\StreemufiModule;
use streemufi\WebApplication;

$route = $_REQUEST['_'];
unset($_REQUEST['_']);
$request = $_REQUEST['-'];
unset($_REQUEST['-']);

try {
    $app = new WebApplication($route, StreemufiModule::$CLASS, $factory);
    $app->handleRequest($request);
} catch (Exception $e) {
    echo "Something went wrong. Sorry. <!-- " . $e;
}
