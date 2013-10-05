<?php
namespace streemufi\usr;

use watoki\factory\Factory;

class Configuration extends \streemufi\Configuration {

    public function getApiUrl() {
        return 'http://localhost/streemuf';
    }

}

return function(Factory $factory) {
    $factory->setSingleton(\streemufi\Configuration::$CLASS, new Configuration());
};