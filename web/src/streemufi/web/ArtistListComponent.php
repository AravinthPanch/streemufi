<?php
namespace streemufi\web;

use watoki\curir\controller\Component;
use watoki\curir\Request;
use watoki\curir\Response;

class ArtistListComponent extends Component {

    static $CLASS = __CLASS__;

    public function respond(Request $request) {
        $response = new Response();
        $response->setBody('Hello World');
        return $response;
    }

} 