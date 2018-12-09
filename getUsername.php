<?php
   $dbhost = 'us-cdbr-iron-east-01.cleardb.net';
   $dbuser = 'bfee5fabd369bb';
   $dbpass = 'd131311b';
   $dbdata = "heroku_3c0e2eb533d6f40";
                 
   
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbdata);//connect
   //if(! $conn ) die('Could not connect: \n' . mysqli_error()); //else echo 'Connected successfully <br>';

   //$data=mysqli_fetch_array($retval);//json_encode ($retval);
   //$data=mysqli_fetch_assoc($retval);//json_encode ($retval);
   session_start();
    $tmp = json_encode($_SESSION['username']);
    echo $tmp; 

   /*if($retval) echo("query success <br>"); else echo 'query failed';*/
   mysqli_close($conn);
?>
