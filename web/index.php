<?php

require_once("bootstrap.php");

$factory = new \watoki\factory\Factory();

$userConfig = __DIR__ . '/usr/configuration.php';
if (file_exists($userConfig)) {
    /** @var callable $loader */
    $loader = require_once($userConfig);
    $loader($factory);
}

/** @var \streemufi\Configuration $config */
$config = $factory->getInstance(\streemufi\Configuration::$CLASS);

try {
    $app = new watoki\curir\WebApplication(streemufi\web\StreemufiResource::$CLASS,
        \watoki\curir\http\Url::parse($config->getHostUrl()), $factory);
    $app->run();
} catch (Exception $e) {
    echo "Something went wrong. Sorry. <!-- " . $e;
}
