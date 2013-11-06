<?php
namespace spec\streemufi\fixtures\component\artist;

use spec\streemufi\fixtures\component\ResourceFixture;
use streemufi\web\streemufi\ArtistsResource;

/**
 * @property ArtistsResource $resource
 */
class ListResourceFixture extends ResourceFixture {

    public function whenIOpenTheList() {
        $this->responder = $this->resource->doGet();
    }

    public function thenThereShouldBe_Artists($int) {
        $this->spec->assertCount($int, $this->getField("artist"));
    }

    public function thenArtist_ShouldHaveTheName($int, $string) {
        $this->spec->assertEquals($string, $this->getFieldOfArtist($int, 'name'));
    }

    public function thenArtist_ShouldHaveTheVanityUrl($int, $string) {
        $this->spec->assertEquals($string, $this->getFieldOfArtist($int, 'url/href'));
    }

    protected function getResourceClass() {
        return ArtistsResource::$CLASS;
    }

    private function getFieldOfArtist($int, $field) {
        $int--;
        return $this->getField("artist/$int/$field");
    }
}