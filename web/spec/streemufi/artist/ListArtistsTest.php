<?php
namespace spec\streemufi\artist;

use spec\streemufi\fixtures\component\artist\ListComponentFixture;
use watoki\scrut\Specification;

/**
 * @property ListComponentFixture component <-
 */
class ListArtistsTest extends Specification {

    function testNoArtists() {
        $this->component->whenIOpenTheList();
        $this->component->thenThereShouldBe_Artists(0);
    }

}
 