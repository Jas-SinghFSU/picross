<?php
$dbhost = 'us-cdbr-iron-east-01.cleardb.net';
$dbuser = 'bfee5fabd369bb';
$dbpass = 'd131311b';
$dbdata = "heroku_3c0e2eb533d6f40";
              
$randomModeS = "SELECT * FROM high_scores7x7 WHERE `mode` = 'Random' order by `score`*1 desc limit 10";
$randomModeT = "SELECT * FROM high_scores7x7 WHERE `mode` = 'Random' order by TIME_TO_SEC(`duration`) asc limit 10";

$attackModeS = "SELECT * FROM high_scores7x7 WHERE `mode` = 'Attack' order by `score`*1 desc limit 10";
$attackModeT = "SELECT * FROM high_scores7x7 WHERE `mode` = 'Attack' order by  TIME_TO_SEC(`duration`) asc limit 10";

$arcadeModeS = "SELECT * FROM high_scores7x7 WHERE `mode` = 'Arcade' order by `score`*1 desc limit 10";
$arcadeModeT = "SELECT * FROM high_scores7x7 WHERE `mode` = 'Arcade' order by TIME_TO_SEC(`duration`) asc limit 10";
 
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbdata);//connect
 
session_start();
  
$ifSelector =  $_GET['selectIf'] ?? '';

 if($ifSelector == 'RandomModeT')
{
  $result = mysqli_query( $conn, $randomModeT);
}

if($ifSelector == 'RandomModeS')
{ 
  $result = mysqli_query( $conn, $randomModeS);
}

if($ifSelector == 'ArcadeModeT')
{
  $result = mysqli_query( $conn, $arcadeModeT);
}

if($ifSelector == 'ArcadeModeS')
{
  $result = mysqli_query( $conn, $arcadeModeS);
}

if($ifSelector == 'AttackModeT')
{
  $result = mysqli_query( $conn, $attackModeT);
}

if($ifSelector == 'AttackModeS')
{
  $result = mysqli_query( $conn, $attackModeS);
}
 
$data = array();

while($row=mysqli_fetch_assoc($result)) {
    $data[] = $row;
   }

$tmp = json_encode($data);  
echo $tmp;

mysqli_close($conn);
?>
 


