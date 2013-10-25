<?php
namespace spec\streemufi\fixtures\component\artist;

use spec\streemufi\fixtures\component\ComponentFixture;
use streemufi\web\streemufi\artist\xxArtistResource;

/**
 * @property xxArtistResource $resource
 */
class ArtistResourceFixture extends ComponentFixture {

    public function whenIOpenTheProfileOf($key) {
        $this->responder = $this->resource->doGet($key);
    }

    public function thenHisNameShouldBe($string) {
        $this->spec->assertEquals($string, $this->getField('profile/name'));
    }

    public function thenTheTextShouldBe($string) {
        $this->spec->assertEquals($string, $this->getField('profile/text'));
    }

    public function thenTheContactShouldBeTheText($string) {
        $this->spec->assertEquals($string, $this->getField('profile/contact'));
    }

    public function thenTheContact_ShouldLinkTo($label, $link) {
        $this->spec->assertEquals($link, $this->getField('profile/contact/href'));
        $this->spec->assertEquals($label, $this->getField('profile/contact/_'));
    }

    public function thenTheVideoUrlShouldBe($string) {
        $this->spec->assertEquals($string, $this->getField('profile/video/url/_'));
        $this->spec->assertEquals($string, $this->getField('profile/video/url/href'));
    }

    public function thenTheVideoShouldBeEmbeddedWith($url) {
        $this->spec->assertEquals($url, $this->getField('profile/video/embedded/src'));
    }

    protected function getResourceClass() {
        return xxArtistResource::$CLASS;
    }
}