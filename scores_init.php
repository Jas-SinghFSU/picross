<?php
   $dbhost = 'us-cdbr-iron-east-01.cleardb.net';
   $dbuser = 'bfee5fabd369bb';
   $dbpass = 'd131311b';
   $dbdata = "heroku_3c0e2eb533d6f40";
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbdata);
   
   if(! $conn ) {
      die('Could not connect: \n' . mysqli_error());
   }

   $sql = "CREATE TABLE IF NOT EXISTS high_scores (
            player varchar(20) NOT NULL,
            score INT NOT NULL,
            mode varchar(20) NOT NULL,
            errors INT NOT NULL
    )";

    $retval2 = mysqli_query ( $conn, $sql );