<?php
namespace spec\streemufi\fixtures\component\artist;

use spec\streemufi\fixtures\component\ComponentFixture;
use streemufi\web\artist\ListComponent;

/**
 * @property ListComponent component
 */
class ListComponentFixture extends ComponentFixture {

    public function whenIOpenTheList() {
        $this->model = $this->component->doGet();
    }

    public function thenThereShouldBe_Artists($int) {
        $this->spec->assertCount($int, $this->getField("artist"));
    }

    protected function getComponentClass() {
        return ListComponent::$CLASS;
    }
}