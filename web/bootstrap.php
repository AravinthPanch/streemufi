<?php

require __DIR__ . '/vendor/autoload.php';

$factory = new \watoki\factory\Factory();

$userConfig = __DIR__ . '/usr/configuration.php';
if (file_exists($userConfig)) {
    /** @var callable $loader */
    $loader = require_once($userConfig);
    $loader($factory);
}

return $factory;