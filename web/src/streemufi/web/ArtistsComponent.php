<?php
namespace streemufi\web;

use streemufi\Configuration;
use streemufi\stores\ArtistStore;
use watoki\curir\controller\Component;
use watoki\curir\controller\Module;
use watoki\curir\Path;
use watoki\factory\Factory;

class ArtistsComponent extends Component {

    static $CLASS = __CLASS__;

    /** @var ArtistStore */
    private $store;

    /** @var Configuration */
    private $config;

    function __construct(Factory $factory, Path $route, Module $parent = null) {
        parent::__construct($factory, $route, $parent);

        $this->store = $factory->getInstance(ArtistStore::$CLASS);
        $this->config = $factory->getInstance(Configuration::$CLASS);
    }

    public function doGet() {
        return array(
            'artist' => $this->assembleArtists()
        );
    }

    private function assembleArtists() {
        $artists = array();
        foreach ($this->store->readAll() as $artist) {
            $artists[] = array(
                'name' => $artist['name'],
                'url' => array(
                    'href' => $this->config->getArtistUrl($artist['key'])
                ),
                'location' => null
            );
        }
        return $artists;
    }

}