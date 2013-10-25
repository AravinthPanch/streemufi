<?php
namespace streemufi\web;

use watoki\curir\http\Url;
use watoki\curir\resource\Container;
use watoki\curir\responder\Redirecter;

class StreemufiResource extends Container {

    static $CLASS = __CLASS__;

    public function doGet() {
        return new Redirecter(Url::parse('artists'));
    }
}