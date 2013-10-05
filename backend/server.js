var http = require('http');
var dal = require('./dal');

http.createServer(function (req, res) {
    res.writeHead(200, {'Content-Type': 'text/plain', 'Access-Control-Allow-Origin' : '*'});

    var url = req.url
    var entity = ''    
    if(url.length > 3){
        entity  = url.substring(4)
    }

    if (req.method == 'POST') {
        var body = '';
        req.on('data', function (data) {
            body += data
        });
        req.on('end', function () {
            body = JSON.parse(body)
            dal.postData(entity, body, res)
        });
    }
    else{
        entity = entity.substring(11)        
        res.end('GET:')        
    }

}).listen(61555, '127.0.0.1');

console.log('Server running at http://127.0.0.1:61555/');

