<?php
namespace streemufi\web\artist;

use watoki\curir\controller\Component;
use watoki\curir\controller\Module;
use watoki\curir\Path;
use watoki\factory\Factory;
use watoki\tempan\Renderer;

class ListComponent extends Component {

    static $CLASS = __CLASS__;

    function __construct(Factory $factory, Path $route, Module $parent = null) {
        parent::__construct($factory, $route, $parent);
        $this->rendererFactory->setRenderer('html', Renderer::$CLASS);
    }

    public function doGet() {
        return array();
    }

}