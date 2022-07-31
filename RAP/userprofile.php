<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile | RAP Event Planners</title>


    <!-- links -->
    
    <link rel="icon" href="images/favicon.ico">
    <script difer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600&family=EB+Garamond:ital@0;1&family=Libre+Baskerville&family=Sacramento&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="css/userprofile.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/button.css">
    <link rel="stylesheet" href="css/logo1.css">
    <link rel="stylesheet" href="css/chat-box.css">


     <!-- background-image-style -->
     <style>   
        .myprofile-main-pic{
            width: 100%;
            height: 60vh;;
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)) ,url(images/profile/profile-main1.jfif);
            background-size: cover;
            margin: 4% auto 2% auto;
        }
        </style>
</head>
<body>
    <!-- navigation -->
    
    <div class="nav-main"> 
        <div class="nav1">
            <a href="home-page.php">HOME</a>
            <a href="services.php">SERVICES</a> 
            <div class="lets-go-dropdown">
                <span class="lets-go-icon">LET's GO! <i class="fa fa-caret-down"></i></span>
                <div class="lets-go-dropdown-content">                   
                        <a href="events.php">EVENTS</a><br>
                        <a href="venue.php">VENUE</a><br>
                        <a href="menu.php">MENUE</a>             
                </div>
              </div>        
        </div>


        <img class="logo" src="images/logo-transparent.png" alt="logo-pic">
        <div class="nav2">
            <a href="contact.php">CONTACT</a>  
            <a href="about.php">ABOUT</a>              
            <div class="myprofile-dropdown">
                <span class="profile-icon"><i class="fas fa-user-circle"></i></span>
                <div class="myprofile-dropdown-content">
                <a href="userprofile.php"><i class="far fa-user icon-color"></i> My Profile</a><br>
                <a href="review.php"><i class="far fa-edit icon-color"></i> Write a Review</a><br>
                <a><i class="fas fa-cog icon-color"></i> Profile Settings</a><br>
                <a><i class="far fa-question-circle icon-color"></i> Help</a><br>
                <a href="login/logout.php"><i class="fas fa-sign-out-alt icon-color"></i> Logout</a>
                </div>
              </div>
        </div>
        </div> 
<!-- .................................................... -->

         <!-- main background pic -->
        <div class="myprofile-main-pic">
            <div class="content-area">
                <div class="content">
                    <h1>RAP</h1>
                    <p class="p1">Our business is making memories</p>
                    <p class="p2">Hello..!</p>
                </div>
            </div>
        </div>
  
         <div class="avatar-name">
            <img src="images/profile/profile-logo.png" alt="avatar">                
            <?php
            //This script will handle login
            session_start();

            require_once "./config.php";
            // check if the user is already logged in
            if(isset($_SESSION['username'])) {
                $username = $_SESSION['username'];
                $sql = "SELECT FName, LName, Address, City, State, mobile_No, Email_id FROM Registration WHERE User_Id = ?";
                $stmt = mysqli_prepare($conn, $sql);
                $param_username = $username;
                mysqli_stmt_bind_param($stmt, "s", $param_username);
                if(mysqli_stmt_execute($stmt)) {
                    mysqli_stmt_store_result($stmt);
                    if(mysqli_stmt_num_rows($stmt) == 1) {
                        mysqli_stmt_bind_result($stmt, $fname, $lname, $address, $city, $state, $mobno, $eid);
                        if(mysqli_stmt_fetch($stmt)) {
                            echo "<p class='avatar-para'>Name: $fname $lname <br>Email: $eid <br>Mobile: $mobno <br>Address: $address, $city, $state</p>";
                        }
                    }
                }
            }

            ?>
        </div>
   
         <a class="pink-button two-button-spacing" href="order.php"><i class="fas fa-shopping-cart"></i>
         </a>
         <a class="pink-button" href="my-order.php">MY ORDERS</a> <br><br><br>

      <!-- .............................................................................. -->

      <button class="open-button" onclick="openForm()"> <i class="far fa-comments "></i>  Chat</button>
      <div class="chat-popup" id="myForm">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form-container" method="POST">

            <h1>Chat</h1>

            <label class="label-align" for="msg"><b>Message</b></label>
            <textarea placeholder="Type message.." name="msg" required></textarea>
            <button type="submit" class="btn">Send</button>
            <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
        </form>
    </div>

    <script src="./jss/chat-box.js"></script>

 <!-- .............................................................................. -->
        

             <!-- footer -->
             <p class="moto">"Our business is making memories"</p>

             <div class="footer-container">
         
                  <!-- company-name -->
                  <div class="footer-name">
                     <p><span class="first-letter">R</span>iha</p>
                     <p><span class="first-letter">A</span>bhishek</p>
                     <p><span class="first-letter">P</span>riyanka</p>
                 </div>
         
             
                 <p class="footer-para">Top event planner and luxury design studio with offices in Goa, Jaipur and Manali. RAP Event Planners serving Goa, Jaipur, Udaipur, Jaisalmer, Manali, Shimla and beyond.</p>
                 
                  <!-- social-handles -->
                 <div class="footer-link-social">
                     <a  href=""><i class="fab fa-instagram"></i></a>             
                     <a  href=""><i class="fab fa-facebook-f"></i></a>       
                     <a  href=""><i class="fab fa-pinterest"></i></a>  
                 </div>
         
                 <div class="footer-link">
                     <a  class="single" href="login/login.php"><i>Clients Login</i></a>   
                     <a href=""><i>Credits</i></a>     
                     <a class="single" href=""><i>Privacy Policy</i></a>
                 </div>
         
                 <div class="footer">
                     <p>©2020-2021 RAP Event Planning™ LLC, All rights reserved</p>
                 </div>
         
             </div>  
         
         <!-- .............................................................................. -->
         


</body>
</html>

<?php
//This script will handle login
//session_start();

require_once "config.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $msg = $_POST['msg'];
    $id = $_SESSION['id'];
    $sql = "INSERT INTO Message (EmailAddress, Message) VALUES ('$id', '$msg')";
    if (mysqli_query($conn, $sql)) {
        echo "Chat sent!";
    } 
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }   
}

?>
