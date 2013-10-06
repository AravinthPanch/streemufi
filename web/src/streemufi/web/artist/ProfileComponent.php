<?php
namespace streemufi\web\artist;

use streemufi\stores\ArtistStore;
use watoki\curir\controller\Component;
use watoki\curir\controller\Module;
use watoki\curir\Path;
use watoki\curir\Url;
use watoki\factory\Factory;

class ProfileComponent extends Component {

    public static $CLASS = __CLASS__;

    /** @var ArtistStore */
    private $store;

    function __construct(Factory $factory, Path $route, Module $parent = null) {
        parent::__construct($factory, $route, $parent);

        $this->store = $factory->getInstance(ArtistStore::$CLASS);
    }

    public function doGet($key) {
        try {
            return array(
                'profile' => $this->assembleProfile($key)
            );
        } catch (\Exception $e) {
            return $this->redirect(Url::parse('../artists'));
        }
    }

    private function assembleProfile($key) {
        $artist = $this->store->readByKey($key);
        return array(
            'name' => $artist['name'],
            'text' => $artist['text'],
            'location' => $artist['location'],
            'contact' => $this->assembleContact($artist['contact']),
            'video' => array(
                'url' => array(
                    '_' => $artist['video'],
                    'href' => $artist['video']
                ),
                'embedded' => $this->getEmbeddedUrl($artist['video'])
            )
        );
    }

    private function getEmbeddedUrl($video) {
        $matches = array();
        if (preg_match('#youtube\.com/watch\?v=([^&]+)#', $video, $matches)) {
            return array(
                'src' => 'https://www.youtube-nocookie.com/embed/' . $matches[1] . '?wmode=opaque'
            );
        }
        return null;
    }

    private function assembleContact($contact) {
        if (substr($contact, 0, 4) == 'http') {
            return array(
                '_' => $contact,
                'href' => $contact
            );
        } else if (strpos($contact, '@')) {
            return array(
                '_' => $contact,
                'href' => 'mailto:' . $contact
            );
        } else {
            return $contact;
        }
    }

} 