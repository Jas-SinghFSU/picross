<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
//phpinfo();
define('DB_SERVER', 'us-cdbr-iron-east-01.cleardb.net');
define('DB_USERNAME', 'bfee5fabd369bb');
define('DB_PASSWORD', 'd131311b');
define('DB_NAME', 'heroku_3c0e2eb533d6f40'); 
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>