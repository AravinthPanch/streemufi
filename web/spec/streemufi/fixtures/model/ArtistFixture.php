<?php
namespace spec\streemufi\fixtures\model;

use rtens\mockster\MockFactory;
use streemufi\stores\ArtistStore;
use watoki\factory\Factory;
use watoki\scrut\Fixture;
use watoki\scrut\Specification;

class ArtistFixture extends Fixture {

    public $artists = array();

    public function __construct(Specification $spec, Factory $factory) {
        parent::__construct($spec, $factory);

        $mic = new MockFactory();
        $store = $mic->getInstance(ArtistStore::$CLASS);
        $factory->setSingleton(ArtistStore::$CLASS, $store);

        $that = $this;
        $store->__mock()->method('readAll')->willCall(function () use ($that) {
            return array_values($that->artists);
        });
        $store->__mock()->method('readByKey')->willCall(function ($key) use ($that) {
            if (!array_key_exists($key, $that->artists)) {
                throw new \Exception;
            }
            return $that->artists[$key];
        });
    }

    public function givenTheArtist_WithTheKey($name, $key) {
        $this->artists[$key] = array(
            'name' => $name,
            'key' => $key,
            'location' => null,
            'text' => null,
            'contact' => null,
            'video' => null
        );
    }

    public function given_HasThe_($key, $field, $value) {
        $this->artists[$key][$field] = $value;
    }
}