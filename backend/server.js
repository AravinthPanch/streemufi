/**
 * Author: Aravinth, S.Panchadcharam
 * Project: Streemufi
 * Version: 1.0
 * Date: 04/10/13
 * Description: Streemufi API built using Node.Js processes REST Operations
 */

var http = require('http');
var dal = require('./dal'); // DATA ACCESS LAYER

http.createServer(function (req, res) {
    var url = req.url
    var APIversion = url.substring(1, 3)
    var entity = ''

    if( APIversion == 'v1' && url.length > 3){
        entity  = url.substring(4)

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
            entity = url.substring(11)
            dal.getData(entity,res)
        }
    }
    else{
        res.writeHead(200, {'Content-Type': 'text/plain', 'Access-Control-Allow-Origin' : '*'});
        res.end('Streemufi API v1')
    }

}).listen(61555, '127.0.0.1');

console.log('Server running at http://127.0.0.1:61555/');

