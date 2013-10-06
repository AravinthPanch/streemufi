<?php
namespace spec\streemufi\artist;

use spec\streemufi\fixtures\component\artist\ListComponentFixture;
use spec\streemufi\fixtures\model\ArtistFixture;
use watoki\scrut\Specification;

/**
 * @property ArtistFixture artist <-
 * @property ListComponentFixture component <-
 */
class ListArtistsTest extends Specification {

    function testNoArtists() {
        $this->component->whenIOpenTheList();
        $this->component->thenThereShouldBe_Artists(0);
    }

    function testTwoArtists() {
        $this->artist->givenTheArtist_WithTheKey('El Barto', 'Bart');
        $this->artist->givenTheArtist_WithTheKey('El Homo', 'Homer');
        $this->component->whenIOpenTheList();
        $this->component->thenThereShouldBe_Artists(2);
        $this->component->thenArtist_ShouldHaveTheName(1, 'El Barto');
        $this->component->thenArtist_ShouldHaveTheVanityUrl(1, 'http://localhost/artist/Bart');
        $this->component->thenArtist_ShouldHaveTheName(2, 'El Homo');
    }

}
