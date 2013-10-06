// DATA ACCESS LAYER
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

function insertQuery(table , param, callback){
    var UUID = Math.floor((Math.random()*100000)+1);
    var url = param.name + UUID

    var query = 'INSERT INTO ' + table + '(id, name, contact, location, text, video, url)' + " VALUES ('" + UUID  + "' , '" +
        param.name + "' , '" + param.contact + "' , '" + param.location + "' , '" + param.text + "' , '" + param.video +
        "' , '" + url + "')"

    connection.query(query, function(err, result) {
        if(err == null) {
            console.log('SQL INSERT SUCCESS')
            callback.end(JSON.stringify(url))
        }
        else {
            console.log('ERROR IN SQL\n' + err)
        }
    });
};

function getAllArtist(callback){
    var query = 'SELECT name, url FROM artist'

    connection.query(query, function(err, result) {
        if(err == null) {
            response = {
                count : result.length,
                artists : result
            };
            callback.end(JSON.stringify(response))
        }
        else {
            console.log('ERROR IN SQL\n' + err)
        }
    });
};


function getArtist(param,callback){
    var query = "SELECT * FROM artist WHERE url = '" + param + "'"

    connection.query(query, function(err, result) {
        if(err == null) {
            response = {
                artist : result[0]
            };
            callback.end(JSON.stringify(response))
        }
        else {
            console.log('ERROR IN SQL\n' + err)
        }
    });
};

exports.postData = function(entity, data, callback){
    switch(entity){
        case 'artist' :
            startConnection();
            insertQuery('artist', data, callback)
            stopConnection();
            break;
    }
};

exports.getData = function(entity, data, callback){
    switch(entity){
        case 'artist' :
            startConnection();
            getAllArtist(callback)
            stopConnection();
            break;
        case 'artist' :
            startConnection();
            getArtist('Aravinth96624', callback)
            stopConnection();
            break;
    }
};


