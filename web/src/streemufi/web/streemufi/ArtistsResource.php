<?php
namespace streemufi\web\streemufi;

use streemufi\stores\ArtistStore;
use streemufi\web\Presenter;
use streemufi\web\StreemufiResource;
use watoki\curir\resource\Container;

class ArtistsResource extends Container {

    static $CLASS = __CLASS__;

    /** @var ArtistStore <- */
    private $store;

    public function doGet() {
        return new Presenter(array(
            'artist' => $this->assembleArtists()
        ));
    }

    private function assembleArtists() {
        $artists = array();
        foreach ($this->store->readAll() as $artist) {
            $artists[] = array(
                'name' => $artist['name'],
                'url' => array(
                    'href' => $this->getAncestor(StreemufiResource::$CLASS)->getUrl('artist/' . $artist['key'])->toString()
                ),
                'location' => null
            );
        }
        return $artists;
    }

}