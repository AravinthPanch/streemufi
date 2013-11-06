<?php
namespace streemufi;

class Configuration {

    public static $CLASS = __CLASS__;

    public function getApiUrl() {
        return 'http://localhost/v1';
    }

    public function getHostUrl() {
        return 'http://localhost';
    }
}