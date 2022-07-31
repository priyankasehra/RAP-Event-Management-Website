<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders | RAP Event PLanners</title>


     <!-- links -->

     <link rel="icon" href="images/favicon.ico">
     <script difer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
     <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600&family=EB+Garamond:ital@0;1&family=Libre+Baskerville&family=Sacramento&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="css/userprofile.css">
     <link rel="stylesheet" href="css/footer.css">
     <link rel="stylesheet" href="css/button.css">
     <link rel="stylesheet" href="css/logo1.css">
     <link rel="stylesheet" href="css/chat-box.css">
     <link rel="stylesheet" href="css/my-order.css">
     <link rel="stylesheet" href="css/button.css">


      <!-- background-image-style -->
      <style>
         .myprofile-main-pic{
             width: 100%;
             height: 60vh;;
             background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)) ,url(images/profile/profile-main2.jpg);
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
         <!-- main background pic -->
         <div class="myprofile-main-pic">
            <div class="content-area">
                <div class="content">
                    <h1>RAP</h1>
                    <p class="p1">Our business is making memories</p>
                </div>
            </div>
         </div>

</head>
<body>
    <div class="order-container">
       <img class="order-pic" src="images/profile/profile5.png" alt="Order-pic"> 


        <?php
        //This script will handle login
        session_start();

        require_once "config.php";
        // check if the user is already logged in
        if(isset($_SESSION['username'])) {
            $id = $_SESSION['id'];
            $sql = "SELECT Order_No, ODate, Budget, EDate, NEvent, Guests, Venue FROM my_orders WHERE Email_Id = ?";
            $stmt = mysqli_prepare($conn, $sql);
            $param_id = $id;
            mysqli_stmt_bind_param($stmt, "s", $param_id);
            if(mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1) {
                    mysqli_stmt_bind_result($stmt, $order_no, $odate, $budget, $edate, $event, $guests, $venue);
                    if(mysqli_stmt_fetch($stmt)) {
                        echo "<h2>Order Details</h2>";
                        echo "<p> Order No : $order_no <br>Email : $id <br>Date : $odate <br> _________________________________________________________</p>";
                        echo "<table class='order-descp'>
                        <tr>
                        <td>Budget :</td>
                        <td>$budget</td>
                    </tr>
                    <tr>
                        <td> Celebration Date :  </td>
                        <td>$edate</td>
                    </tr>
                    <tr>
                        <td>Event :</td>
                        <td>$event</td>
                    </tr>
                    <tr>
                        <td>Guest Invited:</td>
                        <td>$guests</td>
                    </tr>
                    <tr>
                        <td>Venue :</td>
                        <td>$venue</td>
                    </tr>
                </table>";
                    }
                }
            }
        }
        ?>

    </div>

    <div class="bill-container">
    <img  class="bill-pic" src="images/profile/profile6.png" alt="Bill-pic">

    <?php
        //This script will handle login
      //  session_start();

        require_once "config.php";
        // check if the user is already logged in
        if(isset($_SESSION['username'])) {
            $id = $_SESSION['id'];
            $sql = "SELECT Bill_No, Order_No, Bill_Date, V_Charges, F_Charges, Total, Tax, Final FROM Bill WHERE Email_Id = ?";
            $stmt = mysqli_prepare($conn, $sql);
            $param_id = $id;
            mysqli_stmt_bind_param($stmt, "s", $param_id);
            if(mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) != 0) {
                    mysqli_stmt_bind_result($stmt, $billno, $orderno, $billdate, $vcharges, $fcharges, $total, $tax, $final);
                    if(mysqli_stmt_fetch($stmt)) {
                        echo "<h2>Bill</h2>";
                        echo "<p> Bill No : $billno <br>Order No : $orderno <br>Email : $id <br>Date : $billdate <br> _________________________________________________________</p>";
                        echo "<table class='bill-descp'>
                        <tr>
                            <td>Venue Charges :</td>
                            <td>$vcharges</td>
                        </tr>
                        <tr>
                            <td> Food Charges :  </td>
                            <td>$fcharges</td>
                        </tr>
                        <tr>
                            <td>Valet Charges :</td>
                            <td>Free</td>
                        </tr>
                      </table>
                        <br><br>

                        <table class='total-amount'>
                        <tr>
                            <td>Total:</td>
                            <td>$total</td>
                        </tr>
                        <tr>
                            <td>Tax :</td>
                            <td>$tax</td>
                        </tr>
                        <tr>
                            <td>Final Amount:</td>
                            <td>$final</td>
                        </tr>
                    </table>";
                    }
                }
            }
        }
        ?>

    </div>



    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <img src="" alt="">
    </picture>
   <a class="pink-button" href="userprofile.php">MY PROFILE</a>
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
