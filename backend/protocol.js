/**
 * Author: Aravinth, S.Panchadcharam
 * Project: Streemufi
 * Version: 1.0
 * Date: 04/10/13
 * Description: Protocol definition for RESTFul Operations which in turn do SQL CRUD Operations
 */

/**
 * Method: POST
 * Entity: v1/artist
 * Description: Frontend sends new artist information with the following required parameters
 */
var createArtist = {};
createArtist.requestMessage = {
    name : 'Aravinth',
    contact: '017631173663',
    location	: 'Warschauerstr',
    text : 'Im a Guitarist',
    video : 'youtube.com/aravinth123'
}
createArtist.responseMessage = {
    url : 'Aravinth1234'
}

/**
 * Method: GET
 * Entity: v1/artist/artistUrl , i.e v1/artist/Aravinth1234
 * Description: Frontend requests an artist information at artist's url and URL will extracted at the backend
 */
var readArtist = {};
readArtist.requestMessage = 'v1/artist/Aravinth1234'
readArtist.responseMessage = {
    name : 'Aravinth',
    contact: '017631173663',
    location	: 'Warschauerstr',
    text : 'Im a Guitarist',
    video : 'youtube.com/aravinth123',
    url : 'Aravinth1234'
}

/**
 * Method: GET
 * Entity: v1/artist/getAllArtists
 * Description: Frontend requests list of all artists at above given url and URL will extracted at the backend
 */

var readArtists = {};
readArtists.requestMessage = 'v1/artist/getAllArtists'
readArtists.responseMessage = {
    "count": 2,
    "artists": [
        {
            "name": "El Barto",
            "url": "localhost/artist/Bart"
        },
        {
            "name": "El Home",
            "url": "localhost/artist/Homer"
        }
    ]
}

/**
 * Description: Scout
 */
var user = {
    name : 'karim',
    phoneNumber: '12345'
};
