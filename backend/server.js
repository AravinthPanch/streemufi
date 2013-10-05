var http = require('http');
var dal = require('./dal')

http.createServer(function (req, res) {
    res.writeHead(200, {'Content-Type': 'text/plain', 'Access-Control-Allow-Origin' : '*'});

    if (req.method == 'POST') {
        var body = '';
        req.on('data', function (data) {
            body += data;
        });
        req.on('end', function () {
            body = JSON.parse(body);            
            dal.postData(body, res)
        });
    }
    else{
        res.end('GET:')
    }

}).listen(61555, '127.0.0.1');

console.log('Server running at http://127.0.0.1:61555/');

