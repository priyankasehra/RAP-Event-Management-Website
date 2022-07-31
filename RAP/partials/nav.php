<div class="nav-main"> 
    <div class="nav1">
            <a href="home-page.php">HOME</a>
            <a href="services.php">SERVICES</a> 
            <div class="lets-go-dropdown">
                <span class="lets-go-icon">LET's GO! <i class="fa fa-caret-down"></i></span>
                <div class="lets-go-dropdown-content">                   
                        <a href="events.php">EVENTS</a><br>
                        <a href="venue.php">VENUE</a><br>
                        <a href="menu.php">MENU</a>             
                </div>
              </div>        
        </div>

    <img class="logo" src="images/logo-transparent.png" alt="logo-pic">
    <div class="nav2">
        <a href="contact.php">CONTACT</a>  
        <a href="about.php">ABOUT</a>
        <?php
        //This script will handle login
        session_start();

        require_once "./config.php";
        // check if the user is already logged in
        if(isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            $sql = "SELECT FName FROM Registration WHERE user_id = ?";
            $stmt = mysqli_prepare($conn, $sql);
            $param_username = $username;
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            if(mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1) {
                    mysqli_stmt_bind_result($stmt, $name);
                    if(mysqli_stmt_fetch($stmt)) {
                        $fname = strtoupper($name);
                        echo "<a href='userprofile.php'>$fname</a>";
                    }
                }
            }
        }
        else {
            echo '<a href="login/login.php">LOGIN</a>';
        }
        ?>
    </div>
</div> 