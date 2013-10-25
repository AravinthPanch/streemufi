<?php
namespace streemufi\web\streemufi\artist;

use streemufi\stores\ArtistStore;
use streemufi\web\Presenter;
use watoki\curir\http\Url;
use watoki\curir\Resource;
use watoki\curir\resource\DynamicResource;
use watoki\curir\responder\Redirecter;

class xxArtistResource extends DynamicResource {

    public static $CLASS = __CLASS__;

    /** @var ArtistStore <- */
    private $store;

    protected function getPlaceholderKey() {
        return 'key';
    }

    public function doGet($key) {
        try {
            return new Presenter(array(
                'profile' => $this->assembleProfile($key)
            ));
        } catch (\Exception $e) {
            return new Redirecter(Url::parse('../artists'));
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