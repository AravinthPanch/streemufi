// DATA ACCESS LAYER
var mysql      = require('mysql');
var connection = {};
var request = {};
var response = {};
var results = {};

function startConnection(){
    connection = mysql.createConnection({
        user     : 'root',
        password : '',
        database	: 'test'
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

function insertQuery(table , param){	
	var UUID = Math.floor((Math.random()*100000)+1);
	var url = param.name + UUID
    
    var query = 'INSERT INTO ' + table + '(id, name, contact, location, text, video, url)' + " VALUES ('" + UUID  + "' , '" +
        param.name + "' , '" + param.contact + "' , '" + param.location + "' , '" + param.text + "' , '" + param.video +
       "' , '" + url + "')"

    connection.query(query, function(err, result) {
        if(err == null) {
            console.log('SQL INSERT SUCCESS')
        }
        else {
            console.log('ERROR IN SQL\n' + err)
        }
    });
};

function getAllArtist(){
    var query = 'SELECT name, url FROM artist'

    connection.query(query, function(err, result) {
        if(err == null) {                        
            response = { 
            	count : result.length,
            	artists : result
            };            
            console.log(response)
        }
        else {
            console.log('ERROR IN SQL\n' + err)
        }
    });
};


function getArtist(param){
    var query = "SELECT * FROM artist WHERE url = '" + param + "'"

    connection.query(query, function(err, result) {
        if(err == null) {                        
            response = {             	
            	artist : result[0]
            };            
            console.log(result[0])
        }
        else {
            console.log('ERROR IN SQL\n' + err)
        }
    });
};

exports.setData = function(request){

    startConnection();
    //insertQuery('artist',request)
    //getAllArtist()
    getArtist('Aravinth15592')
    stopConnection();


    // if(request != undefined){
    //     switch(request.messageType){
    //         case 'newUserCreateRequest' :
    //             console.log('new user created');
    //             sqlConnection();
    //             insertQuery('artist',request.data)	
    //             return 'new user created ' + results;                
    //             break;
    //     }
    // }else{
    //     return 'NO DATA SENT';
    // }
};

exports.getData = function(request){

};


