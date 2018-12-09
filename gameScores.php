<?php
session_start();
//$parameter="this is a php variable";
//echo "var myval=foo(" . parameter . ");";
$dbhost = 'us-cdbr-iron-east-01.cleardb.net';
   $dbuser = 'bfee5fabd369bb';
   $dbpass = 'd131311b';
   $dbdata = "heroku_3c0e2eb533d6f40";

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbdata);

    $score=  $_POST['score'] ?? '';
    $spentTime=  $_POST['spentTime'] ?? '';
    $gameType=  $_POST['gameType'] ?? '';
    $mistakes=  $_POST['totalErrs'] ?? '';
    $usersname = $_SESSION['username'] ?? '';
    //$decoded = json_decode($parameter, true);

    if(!empty($score))
    {
    $sql = "INSERT INTO `high_scores7x7`(`player`, `score`, `duration`, `mode`, `errors`) VALUES ('$usersname','$score', '$spentTime', '$gameType', '$mistakes')";   
    $retval = mysqli_query( $conn, $sql );
    }
    
    
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <title>Log in</title>
    <link rel="stylesheet" href="styleGame.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Aldrich|Bungee+Inline|Fredericka+the+Great|Kumar+One+Outline|Monofett|Monoton|Notable|Orbitron|Patua+One|Press+Start+2P|Questrial|Righteous|Teko"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Merriweather|Noto+Serif" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond|Eczar|Gentium+Basic|Libre+Baskerville|Libre+Franklin|Proza+Libre|Rubik|Taviraj|Trirong|Work+Sans"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bungee+Shade" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ewert|Gravitas+One|Monoton" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond|Eczar|Gentium+Basic|Libre+Baskerville|Libre+Franklin|Proza+Libre|Rubik|Taviraj|Trirong|Work+Sans"
        rel="stylesheet">
    <script type="text/javascript" src="logic.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Merriweather|Noto+Serif" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond|Eczar|Gentium+Basic|Libre+Baskerville|Libre+Franklin|Proza+Libre|Rubik|Taviraj|Trirong|Work+Sans"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ewert|Gravitas+One|Monoton" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Aldrich" rel="stylesheet">
</head>
<body>
    <section id="register">
        <div id="registerDiv">
        <article>Login</article>
        <hr>
       
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div  <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username:<sup>*</sup></label>
                <input style="margin-left:2%;"type="text" name="username" value="<?php echo $username; ?>">
                <span><?php echo $username_err; ?></span>
            </div>    
            <div <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password:<sup>*</sup></label>
                <input style="margin-left:3.5%;"type="password" name="password">
                <span><?php echo $password_err; ?></span>
            </div>
            <div>
                <input type="submit" value="Submit">
            </div>
            <p>Don't have an account? <a href="register_mysql.php">Sign up now</a>.</p>
        </form>
</div>
</section>
</body>
</html>