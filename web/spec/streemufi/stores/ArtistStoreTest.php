<?php
namespace spec\streemufi\stores;

use spec\streemufi\fixtures\stores\ArtistStoreFixture;
use watoki\scrut\Specification;

/**
 * @property ArtistStoreFixture store <-
 */
class ArtistStoreTest extends Specification {

    function testReadAll() {
        $this->store->givenTheResponseIs('{
            "count": 2,
            "artists": [
                {
                    "name": "El Barto",
                    "url": "localhost/artist/Bart"
                },
                {
                    "name": "El Home",
                    "url": "localhost/artist/Homer"
                }
            ]
        }');
        $this->store->whenIReadAllArtists();
        $this->store->thenTheRequestShould_TheUrl('get', 'artists');
        $this->store->thenTheListOfArtistShouldHaveTheSize(2);
        $this->store->thenArtist_ShouldHaveThe_(1, 'name', 'El Barto');
        $this->store->thenArtist_ShouldHaveThe_(1, 'url', 'localhost/artist/Bart');
    }

    function testCatchException() {
        $this->store->givenTheRequestThrowsAnException();
        $this->store->whenIReadAllArtists();
        $this->store->thenTheListOfArtistShouldHaveTheSize(0);
    }

    function testReadByKey() {
        $this->store->whenIReadTheArtistWithTheKey('MyKey');
        $this->store->thenTheRequestShould_TheUrl('get', 'artist/MyKey');
    }

}