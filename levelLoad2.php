<?php
   $dbhost = 'us-cdbr-iron-east-01.cleardb.net';
   $dbuser = 'bfee5fabd369bb';
   $dbpass = 'd131311b';
   $dbdata = "heroku_3c0e2eb533d6f40";
   $one7="SELECT * FROM 1_7x7";
   $two7="SELECT * FROM 2_7x7";  
   $three7="SELECT * FROM 3_7x7";  
   $one13="SELECT * FROM 1_13x13";
   $two13="SELECT * FROM 2_13x13";  
   $three13="SELECT * FROM 3_13x13";                   
   
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbdata);//connect

   //if(! $conn ) die('Could not connect: \n' . mysqli_error()); //else echo 'Connected successfully <br>';

   $retval = mysqli_query( $conn, $two7 );

   $data = array();
   //$data=mysqli_fetch_array($retval);//json_encode ($retval);
   //$data=mysqli_fetch_assoc($retval);//json_encode ($retval);
   while($row=mysqli_fetch_assoc($retval)) {
    $data[] = $row;
   }

   $tmp = json_encode($data); 
   //echo $tmp . "<br>";

   echo $tmp;

   /*if($retval) echo("query success <br>"); else echo 'query failed';*/
   mysqli_close($conn);
?>
