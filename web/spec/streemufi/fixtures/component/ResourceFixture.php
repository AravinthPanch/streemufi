<?php
namespace spec\streemufi\fixtures\component;

use streemufi\web\StreemufiResource;
use watoki\curir\http\Path;
use watoki\curir\http\Url;
use watoki\curir\responder\Presenter;
use watoki\curir\responder\Redirecter;
use watoki\curir\Responder;
use watoki\factory\Factory;
use watoki\factory\providers\PropertyInjectionProvider;
use watoki\scrut\Fixture;
use watoki\scrut\Specification;

abstract class ResourceFixture extends Fixture {

    /** @var Responder */
    protected $responder;

    protected $resource;

    abstract protected function getResourceClass();

    public function __construct(Specification $spec, Factory $factory) {
        parent::__construct($spec, $factory);

        $root = $factory->getInstance(StreemufiResource::$CLASS, array(
            'url' => Url::parse('http://localhost'),
            'parent' => null
        ));

        $this->resource = $factory->getInstance($this->getResourceClass(), array(
            'url' => Url::parse('http://localhost/test'),
            'parent' => $root
        ));
    }

    public function thenIShouldBeRedirectedTo($url) {
        $this->spec->assertTrue($this->responder instanceof Redirecter);
        if ($this->responder instanceof Redirecter) {
            $this->spec->assertEquals($url, $this->responder->getTarget()->toString());
        }
    }

    public function thenIShouldNotBeRedirected() {
        $this->spec->assertFalse($this->responder instanceof Redirecter, 'Was redirected');
    }

    protected function getFieldIn($string, $field) {
        foreach (explode('/', $string) as $key) {
            if (!is_array($field) || !array_key_exists($key, $field)) {
                throw new \Exception("Could not find '$key' in " . json_encode($field));
            }
            $field = $field[$key];
        }
        return $field;
    }

    protected function getField($string) {
        if ($this->responder instanceof Presenter) {
            return $this->getFieldIn($string, $this->responder->getModel());
        } else {
            $this->spec->fail('Responder is not presenter');
            return null;
        }
    }

} 