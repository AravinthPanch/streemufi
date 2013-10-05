<?php
namespace streemufi\stores;

use Guzzle\Http\Client;
use streemufi\Configuration;

class ArtistStore {

    public static $CLASS = __CLASS__;

    /** @var Configuration */
    private $config;

    /** @var Client */
    private $client;

    function __construct(Configuration $config, Client $client) {
        $this->config = $config;
        $this->client = $client;

        $client->setBaseUrl($this->config->getApiUrl());
    }

    /**
     * @return array
     */
    public function readAll() {
        try {
            $request = $this->client->get('artists');
            $response = json_decode($request->send()->getBody()->__toString(), true);
            return $response['artists'];
        } catch (\Exception $e) {
            return array();
        }
    }
}