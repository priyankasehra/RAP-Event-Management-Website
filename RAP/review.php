<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback | RAP Event planners</title>

    <!-- links -->
    
    <link rel="icon" href="images/favicon.ico">
    <script difer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600&family=EB+Garamond:ital@0;1&family=Libre+Baskerville&family=Sacramento&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="css/review.css">
    <link rel="stylesheet" href="css/button.css">
    

</head>
<body>
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="feedback-form-container" method="POST">

        <h1>Your Feedback</h1> <br> <br>
        <textarea placeholder="Write a review.." id="msg" name="msg" required></textarea> <br> <br>
        <input type="submit" value="Submit"> <br><br>
        <a class="pink-button" href="userprofile.php">MY PROFILE</a>
    </form>
</body>
</html>


<?php
//This script will handle login
session_start();

require_once "config.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $msg = $_POST['msg'];
    $id = $_SESSION['id'];
    $sql = "INSERT INTO Feedback (Email_Id, Message) VALUES ('$id', '$msg')";
    if (mysqli_query($conn, $sql)) {
        echo "Review recorded";
    } 
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }   
}

?>
