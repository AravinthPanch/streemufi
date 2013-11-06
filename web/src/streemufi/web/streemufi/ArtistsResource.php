<?php
namespace streemufi\web\streemufi;

use streemufi\Configuration;
use streemufi\stores\ArtistStore;
use streemufi\web\Presenter;
use streemufi\web\StreemufiResource;
use watoki\curir\resource\Container;

class ArtistsResource extends Container {

    static $CLASS = __CLASS__;

    /** @var ArtistStore <- */
    private $store;

    /** @var Configuration <- */
    private $config;

    public function doGet() {
        return new Presenter(array(
            'artist' => $this->assembleArtists()
        ));
    }

    private function assembleArtists() {
        $artists = array();
        foreach ($this->store->readAll() as $artist) {
            $url = $this->getAncestor(StreemufiResource::$CLASS)->getUrl()->copy();
            $url->getPath()->append('artist');
            $url->getPath()->append($artist['key']);

            $artists[] = array(
                'name' => $artist['name'],
                'url' => array(
                    'href' => $url->toString()
                ),
                'location' => null
            );
        }
        return $artists;
    }

}