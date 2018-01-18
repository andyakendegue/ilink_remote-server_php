/*var socket = require('socket.io'),
    http = require('http'),
    server = http.createServer(),
    socket = socket.listen(server);
socket.on('connection', function(connection) {
    console.log('User Connected');
    connection.on('message', function(msg){
        socket.emit('message', msg);
    });
});
server.listen(3000, function(){
    console.log('Server started');
});*/
var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);
var port = process.env.PORT || 3000;




app.get('/', function(req, res){
  //res.setHeader('Access-Control-Allow-Origin', "http://"+req.headers.host+':8100');

  res.setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, PATCH, DELETE');
  res.setHeader('Accept','*/*');
  res.setHeader('User-Agent', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit (KHTML, like Gecko) Chrome Safari');
  res.setHeader('Access-Control-Allow-Origin', 'http://localhost:8100');
  //'Access-Control-Allow-Methods': 'GET, POST, PUT, PATCH, DELETE, OPTIONS',
  res.setHeader('Access-Control-Max-Age', '3600');
  res.setHeader('Access-Control-Allow-Headers', 'x-requested-with,origin,content-type,accept,X-XSRF-TOKEN');
  res.setHeader('Access-Control-Allow-Credentials', 'false');
  res.send('<h1>Chat server</h1>');
});

io.on('connection', function(socket){
  console.log('User Connected'+socket);
  socket.on('message', function(msg){
    io.emit('message', msg);
  });
});

http.listen(port, function(){
  console.log('listening on *:' + port);
});
