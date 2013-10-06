<?php
namespace streemufi;

use watoki\curir\Controller;
use watoki\curir\Path;
use watoki\curir\Request;
use watoki\curir\Router;

class DynamicRouter extends Router {

    /** @var \watoki\curir\Path */
    private $pattern;

    /** @var string */
    private $controllerClass;

    function __construct(Path $pattern, $controllerClass) {
        $this->pattern = $pattern;
        $this->controllerClass = $controllerClass;
    }

    /**
     * @param Path $route
     * @return boolean
     */
    public function matches(Path $route) {
//        var_dump($route->getNodes()->toArray(), $this->pattern->getNodes()->toArray());die;
        $patterns = $this->pattern->getNodes();
        foreach ($route->getNodes() as $i => $node) {
            if (!$patterns->isInBound($i) || !$this->nodesMatch($patterns->get($i), $node)) {
                return false;
            }
        }
        return true;
    }

    /**
     * @param Request $request
     * @return Controller
     */
    public function resolve(Request $request) {
        foreach ($this->pattern->getNodes() as $i => $node) {
            if ($this->isPattern($node)) {
                $key = substr($node, 1, -1);
                $value = $request->getResource()->getNodes()->get($i);
                $request->getParameters()->set($key, $value);
            }
        }
        $nodes = $request->getResource()->getNodes()->splice(0, $this->pattern->getNodes()->count());
        return $this->createController($this->controllerClass, new Path($nodes));
    }

    private function nodesMatch($a, $b) {
        return $a == $b || $this->isPattern($a);
    }

    private function isPattern($a) {
        return substr($a, 0, 1) == '{' && substr($a, -1) == '}';
    }
}