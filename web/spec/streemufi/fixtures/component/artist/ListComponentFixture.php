<?php
namespace spec\streemufi\fixtures\component\artist;

use spec\streemufi\fixtures\component\ComponentFixture;
use streemufi\web\ArtistsComponent;

/**
 * @property \streemufi\web\ArtistsComponent component
 */
class ListComponentFixture extends ComponentFixture {

    public function whenIOpenTheList() {
        $this->model = $this->component->doGet();
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

    protected function getComponentClass() {
        return \streemufi\web\ArtistsComponent::$CLASS;
    }

    private function getFieldOfArtist($int, $field) {
        $int--;
        return $this->getField("artist/$int/$field");
    }
}