<?php
namespace streemufi;

use watoki\curir\controller\Module;
use watoki\curir\Path;
use watoki\curir\Request;
use watoki\factory\Factory;

class WebApplication {

    /** @var Module */
    private $module;

    function __construct($route, $moduleClass, Factory $factory = null) {
        $factory = $factory ? : new Factory();
        $this->module = $factory->getInstance($moduleClass, array(
            'route' => Path::parse($route)
        ));
    }

    public function handleRequest($request) {
        $this->module->respond(Request::build($request))->flush();
    }
}