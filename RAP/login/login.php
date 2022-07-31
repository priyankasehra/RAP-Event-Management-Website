<!DOCTYPE html>
<html>
    <head>
        <title>RAP Event Planning | Login</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="../images/favicon.ico">
        <script difer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600&family=EB+Garamond:ital@0;1&family=Libre+Baskerville&family=Sacramento&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="../css/login.css">
    </head>
    <body>
        <form class="login-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="login-form__logo-container">
                <img class="login-form__logo" src="../images/logo.png" alt="Logo">
            </div>
            <div class="login-form__content">
                <div class="login-form__header">Login to your account</div>
                <input class="login-form__input" type="text" name="username" placeholder="Username">
                <input class="login-form__input" type="password" name="password" placeholder="Password">
                <button class="login-form__button" type="submit">Login</button>
                <div class="login-form__links">
                    <a class="login-form__link" href="./">Forgot your password?</a>
                </div>
            </div>
        </form>
    </body>
</html>





<?php
//This script will handle login
session_start();

// check if the user is already logged in
if(isset($_SESSION['username']))
{
    echo '<p style="text-align:center;"> <font color=red>You are already logged in.</font> </p>';
}
require_once "../config.php";

$username = $password = "";
$err = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if(empty(trim($_POST['username'])) || empty(trim($_POST['password']))) {
        $err = "Please enter username and password.";
        echo '<p style="text-align:center;"> <font color=red>Please enter username and password.</font> </p>';
    }
    else {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
    }
    if(empty($err)) {
        $sql = "SELECT emailaddress, user_id, password FROM login WHERE user_id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        $param_username = $username;
        mysqli_stmt_bind_param($stmt, "s", $param_username);
        
    
    
        // Try to execute this statement
        if(mysqli_stmt_execute($stmt)){
            mysqli_stmt_store_result($stmt);
            if(mysqli_stmt_num_rows($stmt) == 1) {
                mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                if(mysqli_stmt_fetch($stmt)) {
                    if($password == $hashed_password) {
                        
                        // this means the password is corrct. Allow user to login
                        echo '<p style="text-align:center;"> <font color=red>Successfully logged in</font> </p>';
                        /*session_start();*/
                        $_SESSION["username"] = $username;
                        $_SESSION["id"] = $id;
                        $_SESSION["loggedin"] = true;
                        
                        header("location: ../userprofile.php");
                            
                    }
                    else {
                        echo '<p style="text-align:center;"> <font color=red>Enter correct password</font> </p>';
                    }
                }
                else {
                    echo '<p style="text-align:center;"> <font color=red>Could not fetch results</font> </p>';
                }
            }
        }
    }    
}
?>
