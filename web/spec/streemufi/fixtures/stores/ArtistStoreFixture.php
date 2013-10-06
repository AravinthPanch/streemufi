<?php
namespace spec\streemufi\fixtures\stores;

use Guzzle\Http\Message\Response;
use rtens\mockster\MockFactory;
use streemufi\stores\ArtistStore;
use watoki\factory\Factory;
use watoki\scrut\Fixture;
use watoki\scrut\Specification;

class ArtistStoreFixture extends Fixture {

    private $all;

    /** @var ArtistStore */
    private $store;

    public function __construct(Specification $spec, Factory $factory) {
        parent::__construct($spec, $factory);

        $mic = new MockFactory();
        $client = $mic->getInstance("Guzzle\\Http\\Client");
        $factory->setSingleton("Guzzle\\Http\\Client", $client);

        $request = $mic->getInstance('Guzzle\Http\Message\Request');
        $client->__mock()->method('get')->willReturn($request);

        $this->response = new Response(200);
        $request->__mock()->method('send')->willReturn($this->response);

        $this->client = $client;
        $this->request = $request;

        $this->store = $this->spec->factory->getInstance(ArtistStore::$CLASS);
    }

    public function whenIReadAllArtists() {
        $this->all = $this->store->readAll();
    }

    public function whenIReadTheArtistWithTheKey($string) {
        $this->store->readByKey($string);
    }

    public function thenTheRequestShould_TheUrl($method, $url) {
        $mockMethod = $this->client->__mock()->method($method);
        $this->spec->assertTrue($mockMethod->getHistory()->wasCalled());
        $this->spec->assertEquals($url, $mockMethod->getHistory()->getCalledArgumentAt(0, 0));
    }

    public function givenTheResponseIs($string) {
        $this->response->setBody($string);
    }

    public function thenTheListOfArtistShouldHaveTheSize($int) {
        $this->spec->assertCount($int, $this->all);
    }

    public function thenArtist_ShouldHaveThe_($int, $field, $string) {
        $this->spec->assertEquals($string, $this->all[$int - 1][$field]);
    }

    public function givenTheRequestThrowsAnException() {
        $this->request->__mock()->method('send')->willThrow(new \Exception());
    }
}