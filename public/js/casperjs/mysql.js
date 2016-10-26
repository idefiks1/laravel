
var mysql = require('mysql');
var client = mysql.createClient();
client.host='127.0.0.1';
client.port= '3306';
client.user='root';
client.password='root';
client.database='laravel';

client.end();

/*
var mysql      = require('mysql');
var connection = mysql.createConnection({
  host     : 'localhost',
  user     : 'root',
  password : 'root',
  database : 'laravel'
});

connection.connect();

var query = connection.query('INSERT INTO cars SET url=11111', user, function(err, result) {
  console.log(err);
  console.log(result);
});

connection.end();
*/