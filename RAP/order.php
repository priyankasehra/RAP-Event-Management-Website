<?php 
//This script will handle login
session_start();

require_once "config.php";

if($_SERVER['REQUEST_METHOD'] == "POST") {
    // Storing values entered by the user.
    $username = $_SESSION['username'];
    $budget = $_POST['amount'];
    $date_from = $_POST['booking_date_from'];
    $date_to = $_POST['booking_date_from'];
    $eventname = $_POST['chooseEvent'];
    // Getting event code using event name.
    $sql = "SELECT Event_code FROM event WHERE Event_type = ?";
    $stmt = mysqli_prepare($conn, $sql);
    $param_event = $eventname;
    mysqli_stmt_bind_param($stmt, "s", $param_event);
    if(mysqli_stmt_execute($stmt)) {
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1) {
            mysqli_stmt_bind_result($stmt, $event_code);
            if(mysqli_stmt_fetch($stmt)) {
                $eventcode = $event_code;
            }
        }
    }
    
    $guests = $_POST['guests'];
    
    $venuename = $_POST['chooseVenue'];
    // Getting venue code using venue name.
    $sql = "SELECT V_Id FROM venue WHERE V_Name = ?";
    $stmt = mysqli_prepare($conn, $sql);
    $param_venue = $venuename;
    mysqli_stmt_bind_param($stmt, "s", $param_venue);
    if(mysqli_stmt_execute($stmt)) {
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1) {
            mysqli_stmt_bind_result($stmt, $venue_code);
            if(mysqli_stmt_fetch($stmt)) {
                $venuecode = $venue_code;
            }
        }
    }
    
    // Fetching and calculating total food charges.
    $meal = $_POST['meal'];
    $N = count($meal);
    $foodcharges = 0;
    $sql = "SELECT Descp, Price FROM Menu";
    if($result = mysqli_query($conn, $sql)) {
        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_array($result)) {
                for($i=0; $i<$N; $i++) {
                    if($meal[$i] == $row['Descp']) {
                        $foodcharges = $foodcharges + $row['Price'];
                    }
                }
            }
            $foodcharges = $foodcharges * $guests;
            mysqli_free_result($result);
        }
        else {
            echo "No records in the table.";
        }
    }
    else {
        echo "Could not execute $sql." . mysqli_error($conn);
    }

    // Inserting value in the database.
    $sql = "INSERT INTO Orders(Username, Date_from, Date_to, EventCode, VenueCode, FoodCharges, Budget, Guests) VALUES ($username, $date_from, $date_to, $eventcode, $venuecode, $foodcharges, $budget, $guests)";
    if(mysqli_query($conn, $sql)) {
        echo '<p style="text-align:center;"> <font color=red>Order Placed!</font> </p>';
    }
    else {
        echo "Error" . $sql . "<br>" . mysqli_error($conn);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order | RAP Event Planners</title>

      <!-- links -->
    
      <link rel="icon" href="images/favicon.ico">
      <script difer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
      <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600&family=EB+Garamond:ital@0;1&family=Libre+Baskerville&family=Sacramento&display=swap" rel="stylesheet">
  
  
      <link rel="stylesheet" href="css/order.css">
      <link rel="stylesheet" href="css/button.css">
      
</head>
<body>
    <br><br><br>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST"> 
        <div class="budget-and-date-container">

            
            <img class="budget-pic" src="images/profile/profile1.png" alt="budget-pic">
        
        
   
                <div class="budget-and-date-container2">
                    <h4>Budget of Event</h4>
                    <label for="quantity">Amount:</label>           
                    <input type="number" id="quantity" name="amount" min="500000" max="5000000" placeholder=" In Rupees" >           


                    <div class="budget-and-date_date">
                
                        <h4>Date</h4>        
                        <div class="booking_date-from" >
                            <label for="booking-from">From:</label>                           
                            <input type="date" id="booking-from" name="booking_date_from">                          
                        </div>
          
                
                        <label for="booking-to">To:</label>                            
                        <input type="date" id="booking-to" name="booking_date_to">                           
                    </div>
                </div>
          
        
        </div>

        <div class="event-container">

            <img class="event-pic" src="images/profile/profile2.png" alt="event-pic">
    
            <div class="event-container2">
                <h4>Event to Celebrate</h4>

                <label class="lable-class" for="chooseEvent">Event</label>
                <div class="custom-select" style="width:200px;">                  
                    <select id="chooseEvent" name="chooseEvent" >
                    <option value="event1">--SELECT--</option>
                    <option value="Birthday">Birthday</option>
                    <option value="Wedding">Wedding</option>
                    <option value="Shower">Shower</option>
                    <option value="Conference">Conference</option>
                    <option value="Seminar">Seminar</option>
                    <option value="Workshop">Workshop</option>
                    <option value="Sponsorship">Sponsorship</option>
                    <option value="Trade show">Trade show</option>
                    <option value="Networking event">Networking event</option>
                    <option value="Guest speaker">Guest speaker</option>
                    </select>            
                </div>
            
                <div class="event-noOfGuest">
                    <h4>Guest to Attend Function</h4>
                    <label for="quantity">No of Guest:</label>           
                    <input type="number" id="quantity" name="guests" min="1" max="2500">           
                </div>
            </div>
        </div>

 

        <div class="venue-container">
            <a href="venue.php"><img class="venue-pic" src="images/profile/profile3.png" alt="venue-pic"></a>
    

    
            <div class="venue-container2">
                <h4>Venue for Event</h4>

                <label class="lable-class" for="chooseVenue"> Venue</label>
                <div class="custom-select" style="width:200px;">                  
                    <select id="chooseVenue" name="chooseVenue">
                    <option value="venue1">--SELECT--</option>
                    <option value="Radisson Blu Hotel">Radisson Blu Hotel</option>
                    <option value="Hammerzz Nightclub">Hammerzz Nightclub</option>
                    <option value="Nyex Beach">Nyex Beach</option>
                    <option value="Sinq Night">Sinq Night</option>
                    <option value="Royale Farmhouse">Royale Farmhouse</option>
                    <option value="Camp Himachal">Camp Himachal</option>
                    <option value="Leopard Valley">Leopard Valley</option>
                    <option value="OWL Club">OWL Club</option>
                    <option value="Shaadi Brigade">Shaadi Brigade</option>
                    <option value="NoorZa">NoorZa</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="menu-container"> 
            <a href="menu.php"><img class="menu-pic" src="images/profile/profile4.png" alt="menu-pic"></a>   
    
            <div class="menu-container2">
                <h4>Menu of Event</h4>
                <fieldset> 
                    <legend>What you would like to eat?</legend> 
                    <input type="checkbox" id="food" name="meal[]" value="Paneer Pasanda">  
                    <label for="food">Paneer Pasanda</label> <br> 
                    <input type="checkbox" id="food" name="meal[]" value="Dal Bukhara">  
                    <label for="food">Dal Bukhara</label> <br>
                    <input type="checkbox" id="food" name="meal[]" value="Zafrani Pulao"> 
                    <label for="food">Zafrani Pulao</label> <br> 
                    <input type="checkbox" id="food" name="meal[]" value="Indo-Chinese">  
                    <label for="food">Indo-Chinese</label> <br> 
                    <input type="checkbox" id="food" name="meal[]" value="Dahi Bhalle">  
                    <label for="food">Dahi Bhalle</label> <br> 
                    <input type="checkbox" id="food" name="meal[]" value="Cold Drinks"> 
                    <label for="food">Cold Drinks</label> <br>
                    <input type="checkbox" id="food" name="meal[]" value="Aloo ki tikki">  
                    <label for="food">Aloo ki tikki</label> <br> 
                    <input type="checkbox" id="food" name="meal[]" value="Litti Chokha">  
                    <label for="food">Litti Chokha</label> <br>
                    <input type="checkbox" id="food" name="meal[]" value="Chocolate Fondue"> 
                    <label for="food">Chocolate Fondue</label> <br>
                    <input type="checkbox" id="food" name="meal[]" value="Pasta Primavera">  
                    <label for="food">Pasta Primavera</label> <br>
                    <input type="checkbox" id="food" name="meal[]" value="Salad">
                    <label for="food">Salad</label>
                </fieldset> 
            </div>   
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <button type="submit">Save</button>
    </form>
<script src="./jss/button.js"></script>
<br><br><a class="pink-button" href="userprofile.php">MY PROFILE</a> <br>

</body>
</html>

