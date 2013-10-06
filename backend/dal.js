/**
 * Author: Aravinth, S.Panchadcharam
 * Project: Streemufi
 * Version: 1.0
 * Date: 05/10/13
 * Description: Data Access Layer (dal) consists of configuration of MySQl Connection and processes Request and Response Operations
 */

var mysql      = require('mysql');
var connection = {};
var request = {};
var response = {};
var results = {};

function startConnection(){
    connection = mysql.createConnection({
        host     : 'localhost',
        user      : 'streemuf',
        password : 'yivGealebeagg',
        database  : 'streemuf'
        // user     : 'root',
        // password : '',
        // database  : 'test'
    });

    connection.connect(function(err) {
        response = 'MySql Connection is started'
        console.log(response)
    });
};

function stopConnection(){
    connection.end(function(err) {
        response = 'MySql Connection is stopped'
        console.log(response)
    });
};

function sendResponse(response, status, responder){
    switch(status){
        case 'ok' :
            responder.writeHead(200, {'Content-Type': 'text/plain', 'Access-Control-Allow-Origin' : '*'})
            responder.end(response)
            break;

        case 'bad' :
            responder.writeHead(500, {'Content-Type': 'text/plain', 'Access-Control-Allow-Origin' : '*'})
            responder.end(response)
            break;
    }
};

function uniqueIdGenerator(){
    return Math.floor((Math.random()*100000)+1);
};

function insertQuery(table, param, callback){
    var UID = uniqueIdGenerator()
    var url = param.name + UID

    var query = 'INSERT INTO ' + table + '(id, name, contact, location, text, video, url)' + " VALUES ('" + UID  + "' , '" +
        param.name + "' , '" + param.contact + "' , '" + param.location + "' , '" + param.text + "' , '" + param.video +
        "' , '" + url + "')"

    connection.query(query, function(err, result) {
        try {
            response = {
                url : url   
            }            
            sendResponse(JSON.stringify(response), 'ok', callback)
            console.log('SQL INSERT SUCCESS')
        }
        catch(e){
            console.log('ERROR IN SQL\n' + err)
            sendResponse(err, 'bad', callback)
        }
        finally {
            stopConnection()
        }
    });
};

function getAllArtists(callback){
    var query = 'SELECT name, url FROM artist'

    connection.query(query, function(err, result) {
        try {
            response = {
                count : result.length,
                artists : result
            }
            sendResponse(JSON.stringify(response), 'ok', callback)
            console.log('SQL getAllArtist')
        }
        catch(e){
            console.log('ERROR IN SQL\n' + err)
            sendResponse(err, 'bad', callback)
        }
        finally {
            stopConnection()
        }
    });
};

function getArtist(param,callback){
    var query = "SELECT * FROM artist WHERE url = '" + param + "'"

    connection.query(query, function(err, result) {
        try {
            response = {
                artist : result[0]
            }
            sendResponse(JSON.stringify(response), 'ok', callback)
            console.log('SQL getArtist')
        }
        catch(e){
            console.log('ERROR IN SQL\n' + err)
            sendResponse(err, 'bad', callback)
        }
        finally {
            stopConnection()
        }
    });
};

exports.postData = function(entity, data, callback){
    switch(entity){
        case 'artist' :
            startConnection();
            insertQuery('artist', data, callback)
            break;
    }
};

exports.getData = function(entity, callback){
    if(entity == 'getAllArtists'){
        startConnection();
        getAllArtist(callback)
    }
    else {
        startConnection();
        getArtist(entity, callback)
    }
};


