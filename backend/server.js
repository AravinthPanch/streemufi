var http = require('http');
http.createServer(function (req, res) {
  res.writeHead(200, {'Content-Type': 'text/plain', 'Access-Control-Allow-Origin' : '*'}); 	  
  res.end('Connected to NodeJS\n');
}).listen(61050, '127.0.0.1');
console.log('Server running at http://127.0.0.1:61050/');