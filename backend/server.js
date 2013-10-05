var results

var http = require('http');
http.createServer(function (req, res) {
  res.writeHead(200, {'Content-Type': 'text/plain' }); 	     
  res.end('Connected to NodeJS\n' + db());
}).listen(61555, '127.0.0.1');
console.log('Server running at http://127.0.0.1:61555/');

function db() {
var mysql      = require('mysql');
var connection = mysql.createConnection({ 
  host     : 'localhost',
  user 		: 'streemuf',
  password : 'yivGealebeagg',
  database	: 'streemuf'
});

connection.connect(function(err) {
	console.log('connected')
});

connection.query('select * from user', function(err, result) {  	
	results = result[0].name
});
return results;
connection.end();
}
