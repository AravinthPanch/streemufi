<?php
namespace streemufi;

class Configuration {

    public static $CLASS = __CLASS__;

    public function getApiUrl() {
        return 'http://localhost/v1';
    }

    public function getArtistUrl($key) {
        return $this->getBaseUrl() . '/artist/' . $key;
    }

    public function getBaseUrl() {
        return 'http://localhost';
    }
}