<?php
namespace streemufi\web;

use watoki\collections\Liste;
use watoki\curir\controller\Module;
use watoki\curir\Path;
use watoki\curir\router\RedirectRouter;
use watoki\curir\Router;

class StreemufiModule extends Module {

    static $CLASS = __CLASS__;

    protected function createRouters() {
        return new Liste(array(
            new RedirectRouter(Path::parse(''), 'artists'),
        ));
    }
}