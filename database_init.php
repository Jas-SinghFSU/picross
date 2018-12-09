<?php
   $dbhost = 'us-cdbr-iron-east-01.cleardb.net';
   $dbuser = 'bfee5fabd369bb';
   $dbpass = 'd131311b';
   $dbdata = "heroku_3c0e2eb533d6f40";
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
 
   
   if(! $conn ) {
      die('Could not connect: \n' . mysqli_error());
   }
   
   //echo 'Connected successfully <br>';
   
   $sql = 'CREATE DATABASE IF NOT EXISTS yeet';

   $retval = mysqli_query( $conn, $sql );

   $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbdata);


   /* if(! $conn ) {
        die('Could not connect 2: <br>' . mysqli_error());
    }*/
//---------------------------------LEVEL 1 7x7-----------------------------//
    $droppedTable = "DROP TABLE 1_7x7";
    mysqli_query ($conn, $droppedTable);

   $sql2 = "CREATE TABLE IF NOT EXISTS 1_7x7 (
            one INT NOT NULL,
            two INT NOT NULL,
            three INT NOT NULL,
            four INT NOT NULL,
            five INT NOT NULL,
            six INT NOT NULL,
            seven INT NOT NULL
    )";
    //$one7="SELECT * FROM 1_7x7";
    $retval2 = mysqli_query ( $conn, $sql2 );

    $row1 = "INSERT INTO 1_7x7 (one,two,three,four,five,six,seven)
    VALUES (1, 0, 0, 0, 0, 0, 1);";
    mysqli_query($conn, $row1);
    $row2 = "INSERT INTO 1_7x7 (one,two,three,four,five,six,seven)
    VALUES (0, 1, 0, 0, 0, 1, 0);";
    mysqli_query($conn, $row2);
    $row3 = "INSERT INTO 1_7x7 (one,two,three,four,five,six,seven)
    VALUES (0, 0, 1, 0, 1, 0, 0);";
    mysqli_query($conn, $row3);
    $row4 = "INSERT INTO 1_7x7 (one,two,three,four,five,six,seven)
    VALUES (0, 0, 0, 1, 0, 0, 0);";
    mysqli_query($conn, $row4);
    $row5 = "INSERT INTO 1_7x7 (one,two,three,four,five,six,seven)
    VALUES (0, 0, 1, 0, 1, 0, 0);";
    mysqli_query($conn, $row5);
    $row6 = "INSERT INTO 1_7x7 (one,two,three,four,five,six,seven)
    VALUES (0, 1, 0, 0, 0, 1, 0);";
    mysqli_query($conn, $row6);
    $row7 = "INSERT INTO 1_7x7 (one,two,three,four,five,six,seven)
    VALUES (1, 0, 0, 0, 0, 0, 1);";
    mysqli_query($conn, $row7);
//-------------------------------------------------------------------------//

//---------------------------------LEVEL 2 7x7-----------------------------//
    $droppedTable = "DROP TABLE 2_7x7";
    mysqli_query ($conn, $droppedTable);
    $sql2 = "CREATE TABLE IF NOT EXISTS 2_7x7 (
        one INT NOT NULL,
        two INT NOT NULL,
        three INT NOT NULL,
        four INT NOT NULL,
        five INT NOT NULL,
        six INT NOT NULL,
        seven INT NOT NULL
    )";

    $retval2 = mysqli_query ( $conn, $sql2 );

    $row1 = "INSERT INTO 2_7x7 (one,two,three,four,five,six,seven)
    VALUES (0, 0, 1, 0, 1, 0, 0);";
    mysqli_query($conn, $row1);
    $row2 = "INSERT INTO 2_7x7 (one,two,three,four,five,six,seven)
    VALUES (0, 1, 0, 1, 0, 1, 0);";
    mysqli_query($conn, $row2);
    $row3 = "INSERT INTO 2_7x7 (one,two,three,four,five,six,seven)
    VALUES (1, 1, 1, 1, 1, 1, 1);";
    mysqli_query($conn, $row3);
    $row4 = "INSERT INTO 2_7x7 (one,two,three,four,five,six,seven)
    VALUES (1, 0, 0, 1, 0, 0, 1);";
    mysqli_query($conn, $row4);
    $row5 = "INSERT INTO 2_7x7 (one,two,three,four,five,six,seven)
    VALUES (0, 1, 0, 0, 1, 0, 0);";
    mysqli_query($conn, $row5);
    $row6 = "INSERT INTO 2_7x7 (one,two,three,four,five,six,seven)
    VALUES (0, 0, 0, 1, 0, 1, 0);";
    mysqli_query($conn, $row6);
    $row7 = "INSERT INTO 2_7x7 (one,two,three,four,five,six,seven)
    VALUES (0, 0, 0, 1, 1, 0, 0);";
    mysqli_query($conn, $row7);
//-------------------------------------------------------------------------//

//---------------------------------LEVEL 3 7x7-----------------------------//
    $droppedTable = "DROP TABLE 3_7x7";
    mysqli_query ($conn, $droppedTable);
    $sql2 = "CREATE TABLE IF NOT EXISTS 3_7x7 (
        one INT NOT NULL,
        two INT NOT NULL,
        three INT NOT NULL,
        four INT NOT NULL,
        five INT NOT NULL,
        six INT NOT NULL,
        seven INT NOT NULL
    )";

    $retval2 = mysqli_query ( $conn, $sql2 );

    $row1 = "INSERT INTO 3_7x7 (one,two,three,four,five,six,seven)
    VALUES (0, 0, 0, 1, 0, 0, 1);";
    mysqli_query($conn, $row1);
    $row2 = "INSERT INTO 3_7x7 (one,two,three,four,five,six,seven)
    VALUES (0, 1, 0, 1, 0, 0, 0);";
    mysqli_query($conn, $row2);
    $row3 = "INSERT INTO 3_7x7 (one,two,three,four,five,six,seven)
    VALUES (0, 0, 1, 1, 0, 0, 0);";
    mysqli_query($conn, $row3);
    $row4 = "INSERT INTO 3_7x7 (one,two,three,four,five,six,seven)
    VALUES (0, 0, 0, 1, 1, 0, 0);";
    mysqli_query($conn, $row4);
    $row5 = "INSERT INTO 3_7x7 (one,two,three,four,five,six,seven)
    VALUES (0, 0, 1, 1, 0, 0, 0);";
    mysqli_query($conn, $row5);
    $row6 = "INSERT INTO 3_7x7 (one,two,three,four,five,six,seven)
    VALUES (0, 1, 0, 1, 0, 0, 0);";
    mysqli_query($conn, $row6);
    $row7 = "INSERT INTO 3_7x7 (one,two,three,four,five,six,seven)
    VALUES (1, 0, 0, 1, 0, 0, 0);";
    mysqli_query($conn, $row7);
//-------------------------------------------------------------------------//

//---------------------------------LEVEL 1 13x13---------------------------//
    $droppedTable = "DROP TABLE 1_13x13";
    mysqli_query ($conn, $droppedTable);
$sql2 = "CREATE TABLE 1_13x13 (
    one INT NOT NULL,
    two INT NOT NULL,
    three INT NOT NULL,
    four INT NOT NULL,
    five INT NOT NULL,
    six INT NOT NULL,
    seven INT NOT NULL
    eight INT NOT NULL,
    nine INT NOT NULL,
    ten INT NOT NULL,
    eleven INT NOT NULL,
    twelve INT NOT NULL,
    thirteen INT NOT NULL,
)";

$retval2 = mysqli_query ( $conn, $sql2 );

$row1 = "INSERT INTO 1_13x13 (one,two,three,four,five,six,seven,eight,nine,ten,eleven,twelve,thirteen)
VALUES (0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0);";
mysqli_query($conn, $row1);
$row2 = "INSERT INTO 1_13x13 (one,two,three,four,five,six,seven,eight,nine,ten,eleven,twelve,thirteen)
VALUES (0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0);";
mysqli_query($conn, $row2);
$row3 = "INSERT INTO 1_13x13 (one,two,three,four,five,six,seven,eight,nine,ten,eleven,twelve,thirteen)
VALUES (0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0);";
mysqli_query($conn, $row3);
$row4 = "INSERT INTO 1_13x13 (one,two,three,four,five,six,seven,eight,nine,ten,eleven,twelve,thirteen)
VALUES (0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0);";
mysqli_query($conn, $row4);
$row5 = "INSERT INTO 1_13x13 (one,two,three,four,five,six,seven,eight,nine,ten,eleven,twelve,thirteen)
VALUES (0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0);";
mysqli_query($conn, $row5);
$row6 = "INSERT INTO 1_13x13 (one,two,three,four,five,six,seven,eight,nine,ten,eleven,twelve,thirteen)
VALUES (0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0);";
mysqli_query($conn, $row6);
$row7 = "INSERT INTO 1_13x13 (one,two,three,four,five,six,seven,eight,nine,ten,eleven,twelve,thirteen)
VALUES (1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0);";
mysqli_query($conn, $row7);
$row8 = "INSERT INTO 1_13x13 (one,two,three,four,five,six,seven,eight,nine,ten,eleven,twelve,thirteen)
VALUES (1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0);";
mysqli_query($conn, $row8);
$row9 = "INSERT INTO 1_13x13 (one,two,three,four,five,six,seven,eight,nine,ten,eleven,twelve,thirteen)
VALUES (1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0);";
mysqli_query($conn, $row9);
$row10 = "INSERT INTO 1_13x13 (one,two,three,four,five,six,seven,eight,nine,ten,eleven,twelve,thirteen)
VALUES (1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0);";
mysqli_query($conn, $row10);
$row11 = "INSERT INTO 1_13x13 (one,two,three,four,five,six,seven,eight,nine,ten,eleven,twelve,thirteen)
VALUES (1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0);";
mysqli_query($conn, $row11);
$row12 = "INSERT INTO 1_13x13 (one,two,three,four,five,six,seven,eight,nine,ten,eleven,twelve,thirteen)
VALUES (1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0);";
mysqli_query($conn, $row12);
$row13 = "INSERT INTO 1_13x13 (one,two,three,four,five,six,seven,eight,nine,ten,eleven,twelve,thirteen)
VALUES (1, 0, 0, 1, 0, 0, , 0, 0, 0, 0, 0, 0);";
mysqli_query($conn, $row13);

//-------------------------------------------------------------------------//
//---------------------------------LEVEL 2 13x13------------------------------//
    $droppedTable = "DROP TABLE 2_13x13";
    mysqli_query ($conn, $droppedTable);
$sql2 = "CREATE TABLE 2_13x13 (
    one INT NOT NULL,
    two INT NOT NULL,
    three INT NOT NULL,
    four INT NOT NULL,
    five INT NOT NULL,
    six INT NOT NULL,
    seven INT NOT NULL
    eight INT NOT NULL,
    nine INT NOT NULL,
    ten INT NOT NULL,
    eleven INT NOT NULL,
    twelve INT NOT NULL,
    thirteen INT NOT NULL,
)";

$retval2 = mysqli_query ( $conn, $sql2 );

$row1 = "INSERT INTO 2_13x13 (one,two,three,four,five,six,seven,eight,nine,ten,eleven,twelve,thirteen)
VALUES (0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0);";
mysqli_query($conn, $row1);
$row2 = "INSERT INTO 2_13x13 (one,two,three,four,five,six,seven,eight,nine,ten,eleven,twelve,thirteen)
VALUES (0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0);";
mysqli_query($conn, $row2);
$row3 = "INSERT INTO 2_13x13 (one,two,three,four,five,six,seven,eight,nine,ten,eleven,twelve,thirteen)
VALUES (0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0);";
mysqli_query($conn, $row3);
$row4 = "INSERT INTO 2_13x13 (one,two,three,four,five,six,seven,eight,nine,ten,eleven,twelve,thirteen)
VALUES (0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0);";
mysqli_query($conn, $row4);
$row5 = "INSERT INTO 2_13x13 (one,two,three,four,five,six,seven,eight,nine,ten,eleven,twelve,thirteen)
VALUES (0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0);";
mysqli_query($conn, $row5);
$row6 = "INSERT INTO 2_13x13 (one,two,three,four,five,six,seven,eight,nine,ten,eleven,twelve,thirteen)
VALUES (0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0);";
mysqli_query($conn, $row6);
$row7 = "INSERT INTO 2_13x13 (one,two,three,four,five,six,seven,eight,nine,ten,eleven,twelve,thirteen)
VALUES (1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0);";
mysqli_query($conn, $row7);
$row8 = "INSERT INTO 2_13x13 (one,two,three,four,five,six,seven,eight,nine,ten,eleven,twelve,thirteen)
VALUES (1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0);";
mysqli_query($conn, $row8);
$row9 = "INSERT INTO 2_13x13 (one,two,three,four,five,six,seven,eight,nine,ten,eleven,twelve,thirteen)
VALUES (1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0);";
mysqli_query($conn, $row9);
$row10 = "INSERT INTO 2_13x13 (one,two,three,four,five,six,seven,eight,nine,ten,eleven,twelve,thirteen)
VALUES (1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0);";
mysqli_query($conn, $row10);
$row11 = "INSERT INTO 2_13x13 (one,two,three,four,five,six,seven,eight,nine,ten,eleven,twelve,thirteen)
VALUES (1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0);";
mysqli_query($conn, $row11);
$row12 = "INSERT INTO 2_13x13 (one,two,three,four,five,six,seven,eight,nine,ten,eleven,twelve,thirteen)
VALUES (1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0);";
mysqli_query($conn, $row12);
$row13 = "INSERT INTO 2_13x13 (one,two,three,four,five,six,seven,eight,nine,ten,eleven,twelve,thirteen)
VALUES (1, 0, 0, 1, 0, 0, , 0, 0, 0, 0, 0, 0);";
mysqli_query($conn, $row13);

//-------------------------------------------------------------------------//
//---------------------------------LEVEL 2 13x13------------------------------//
    $droppedTable = "DROP TABLE 3_13x13";
    mysqli_query ($conn, $droppedTable);
$sql2 = "CREATE TABLE 3_13x13 (
    one INT NOT NULL,
    two INT NOT NULL,
    three INT NOT NULL,
    four INT NOT NULL,
    five INT NOT NULL,
    six INT NOT NULL,
    seven INT NOT NULL
    eight INT NOT NULL,
    nine INT NOT NULL,
    ten INT NOT NULL,
    eleven INT NOT NULL,
    twelve INT NOT NULL,
    thirteen INT NOT NULL,
)";

$retval2 = mysqli_query ( $conn, $sql2 );

$row1 = "INSERT INTO 3_13x13 (one,two,three,four,five,six,seven,eight,nine,ten,eleven,twelve,thirteen)
VALUES (0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0);";
mysqli_query($conn, $row1);
$row2 = "INSERT INTO 3_13x13 (one,two,three,four,five,six,seven,eight,nine,ten,eleven,twelve,thirteen)
VALUES (0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0);";
mysqli_query($conn, $row2);
$row3 = "INSERT INTO 3_13x13 (one,two,three,four,five,six,seven,eight,nine,ten,eleven,twelve,thirteen)
VALUES (0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0);";
mysqli_query($conn, $row3);
$row4 = "INSERT INTO 3_13x13 (one,two,three,four,five,six,seven,eight,nine,ten,eleven,twelve,thirteen)
VALUES (0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0);";
mysqli_query($conn, $row4);
$row5 = "INSERT INTO 3_13x13 (one,two,three,four,five,six,seven,eight,nine,ten,eleven,twelve,thirteen)
VALUES (0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0);";
mysqli_query($conn, $row5);
$row6 = "INSERT INTO 3_13x13 (one,two,three,four,five,six,seven,eight,nine,ten,eleven,twelve,thirteen)
VALUES (0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0);";
mysqli_query($conn, $row6);
$row7 = "INSERT INTO 3_13x13 (one,two,three,four,five,six,seven,eight,nine,ten,eleven,twelve,thirteen)
VALUES (1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0);";
mysqli_query($conn, $row7);
$row8 = "INSERT INTO 3_13x13 (one,two,three,four,five,six,seven,eight,nine,ten,eleven,twelve,thirteen)
VALUES (1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0);";
mysqli_query($conn, $row8);
$row9 = "INSERT INTO 3_13x13 (one,two,three,four,five,six,seven,eight,nine,ten,eleven,twelve,thirteen)
VALUES (1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0);";
mysqli_query($conn, $row9);
$row10 = "INSERT INTO 3_13x13 (one,two,three,four,five,six,seven,eight,nine,ten,eleven,twelve,thirteen)
VALUES (1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0);";
mysqli_query($conn, $row10);
$row11 = "INSERT INTO 3_13x13 (one,two,three,four,five,six,seven,eight,nine,ten,eleven,twelve,thirteen)
VALUES (1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0);";
mysqli_query($conn, $row11);
$row12 = "INSERT INTO 3_13x13 (one,two,three,four,five,six,seven,eight,nine,ten,eleven,twelve,thirteen)
VALUES (1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0);";
mysqli_query($conn, $row12);
$row13 = "INSERT INTO 3_13x13 (one,two,three,four,five,six,seven,eight,nine,ten,eleven,twelve,thirteen)
VALUES (1, 0, 0, 1, 0, 0, , 0, 0, 0, 0, 0, 0);";
mysqli_query($conn, $row13);
//-------------------------------------------------------------------------//
$sql="CREATE TABLE IF NOT EXISTS high_scores7x7 (
    player varchar(20),
    score varchar(20),
    mode varchar(20),
    errors varchar(20),
    duration varchar(20)
    )";
$retval=mysqli_query($conn,$sql);
$sql="CREATE TABLE IF NOT EXISTS high_scores13x13 (
    player varchar(20),
    score varchar(20),
    mode varchar(20),
    errors varchar(20),
    duration varchar(20)
    )";
$retval=mysqli_query($conn,$sql);
/*if($retval)
        echo("Success db <br>");

    if($retval2)
        echo("Success tbl <br>");
    else echo("failure");

    if(! $retval ) {
        die('Could not create database: <br>' . mysqli_error(0));
    }
   

   echo "Database yeet created successfully\n";*/
   $sql="CREATE TABLE IF NOT EXISTS players (
    login varchar(100),
    password varchar(100),
    fname varchar(100),
    lname varchar(100),
    age INT NOT NULL,
    gender varchar(100),
    loc varchar(100)
    )";
    $retval=mysqli_query($conn,$sql);

   mysqli_close($conn);
?>

$firstname = trim($_POST["fname"]);
    $lastname = trim($_POST["lname"]);
    $age = trim($_POST["age"]);
    $gender = trim($_POST["gender"]);
    $location = trim($_POST["loc"]);