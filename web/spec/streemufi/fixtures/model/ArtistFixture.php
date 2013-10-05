<?php
namespace spec\streemufi\fixtures\model;

use rtens\mockster\MockFactory;
use streemufi\stores\ArtistStore;
use watoki\factory\Factory;
use watoki\scrut\Fixture;
use watoki\scrut\Specification;

class ArtistFixture extends Fixture {

    private $artists = array();

    public function __construct(Specification $spec, Factory $factory) {
        parent::__construct($spec, $factory);

        $mic = new MockFactory();
        $this->store = $mic->getInstance(ArtistStore::$CLASS);
        $factory->setSingleton(ArtistStore::$CLASS, $this->store);
    }

    public function givenTheArtist_WithTheKey($name, $key) {
        $this->artists[] = array(
            'name' => $name,
            'key' => $key,
            'url' => 'streemufi.com/artist/'  . $key,
            'location' => null
        );
        $this->store->__mock()->method('readAll')->willReturn($this->artists);
    }
}