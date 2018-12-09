<?php
// Include config file
require_once 'config_mysql.php';
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
$fname = $lname = $age = $gender = $loc = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate username
    $firstname = trim($_POST["fname"]);
    $lastname = trim($_POST["lname"]);
    $age = trim($_POST["age"]);
    $gender = trim($_POST["gender"]);
    $location = trim($_POST["loc"]);
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT login FROM players WHERE login = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            // Set parameters
            $param_username = trim($_POST["username"]);  
            echo $param_username;      
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);   
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        // Close statement
        mysqli_stmt_close($stmt);
    }
    // Validate password
    if(empty(trim($_POST['password']))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST['password'])) < 1){
        $password_err = "Password must have atleast 1 characters.";
    } else{
        $password = trim($_POST['password']);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = 'Please confirm password.';     
    } else{
        $confirm_password = trim($_POST['confirm_password']);
        if($password != $confirm_password){
            $confirm_password_err = 'Password did not match.';
        }
    } 
 
    // Check input errors before inserting in database
    if(empty($username_err)&& empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO players (login, password, fname, lname, age, gender, loc) VALUES (?, ?, ?, ?, ?, ?, ?)";
         //echo "outer pass";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssss", $param_username, $param_password, $firstname, $lastname, $age, $gender, $location);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login_mysql.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
        // Close statement
        mysqli_stmt_close($stmt);
    }
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
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
        <article>Sign up</article>
        <hr>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            <div <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username:<sup>*</sup></label>
                <input style="margin-left:3%;" name="username" value="<?php echo $username; ?>">
                <span><?php echo $username_err; ?></span>
            </div>    

            <div <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password:<sup>*</sup></label>
                <input style="margin-left:4.5%;" style="margin-left:1.5%;"type="password" name="password" value="<?php echo $password; ?>">
                <span><?php echo $password_err; ?></span>
            </div>

            <div <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm:<sup>*</sup></label>
                <input style="margin-left:9%;"type="password" name="confirm_password" value="<?php echo $confirm_password; ?>">
                <span><?php echo $confirm_password_err; ?></span>
            </div>

            <div>
                <label>First Name:<sup>*</sup></label>
                <input style="margin-left:0%;" type="text" name="fname">
            </div>
            <div>
                <label>Last Name:<sup>*</sup></label>
                <input  style="margin-left:1%;"type="text" name="lname">
            </div>
            <div>
                <label>Age:<sup>*</sup></label>
                <input  style="margin-left:23%;"type="text" name="age">
            </div>
            <div>
                <label>Gender:<sup>*</sup></label>
                <input  style="margin-left:11.5%;" type="text" name="gender">
            </div>
            <div>
                <label>Location:<sup>*</sup></label>
                <input  style="margin-left:7%;" type="text" name="loc">
            </div>

           
            <div>

            <div id="registerButtons"> 

                <input type="submit" value="Submit">
                <input type="reset"  value="Reset">
            </div>
            <div id="helpDiv">Already have an account? <a href="login_mysql.php">Login here</a>.</div>
        </form>
        </section>
    </div>
    
</body>
</html>