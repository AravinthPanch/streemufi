var http = require('http');
http.createServer(function (req, res) {
  res.writeHead(200, {'Content-Type': 'text/plain', 'Access-Control-Allow-Origin' : '*'});
  db();
  res.end('Connected to NodeJS\n');
}).listen(1337, '127.0.0.1');
console.log('Server running at http://127.0.0.1:1337/');

function db() {
var mysql      = require('mysql');
var connection = mysql.createConnection({ 
  user     : 'root',
  password : '',
  database	: 'test'  
});

connection.connect(function(err) {
	console.log('connected')
});

connection.query('select * from user', function(err, result) {
  console.log(result)
});

connection.end();
}