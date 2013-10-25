<?php

require_once("bootstrap.php");

$factory = new \watoki\factory\Factory();
$factory->setProvider('StdClass', new \watoki\factory\providers\PropertyInjectionProvider($factory));

$userConfig = __DIR__ . '/usr/configuration.php';
if (file_exists($userConfig)) {
    /** @var callable $loader */
    $loader = require_once($userConfig);
    $loader($factory);
}

try {
    $app = new watoki\curir\WebApplication(streemufi\web\StreemufiResource::$CLASS, $factory);
    $app->run();
} catch (Exception $e) {
    echo "Something went wrong. Sorry. <!-- " . $e;
}
