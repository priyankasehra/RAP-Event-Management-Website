<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>RAP Event PLanners </title>
    <?php include('./partials/header.php') ?>
    
    <!-- links -->
    <link rel="stylesheet" href="css/homepage-style.css">
    

    <!-- background-image-style -->
    <style>   
        .banner-area{
            width: 100%;
            height: 100vh;;
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url(images/home/rap.jpg);
            background-size: cover;
        }
    </style>
</head>


<body>

    <!-- navigation -->
    <?php include('./partials/nav.php') ?>

        
    <!-- para1 -->
    <div class="top-container">

        <!-- background-image -->
        <div class="banner-area">
            <div class="content-area">
                <div class="content">
                    <h1>RAP</h1>
                    <p>Our business is making memories</p>
                </div>
            </div>
        </div>

       <h3>We are RAP</h3>

        <p>RAP Event Planning is an award-winning, luxury event planning company for fun-loving, busy people that value creativity and 
            quality. We draw our inspiration from YOU and your story to create<br> one-of-a-kind events. We work collaboratively to ensure 
            your event is cohesive and thoughtful, and believe that even the smallest details can have a huge impact. We pride ourselves 
            on our<br> comprehensive event management so that you can have a flawless and stress-free planning experience!
         </p>
   </div>

   <hr>
    <!-- .............................................................................. -->

    <!-- event-tab-button -->
   <div class="portfolio ">
    <img class="portfolio-pic" src="images/home/PORTFOLIO.jpg" alt="portfolio-pic">
     
    <div class="portfolio-para">
   
        <h1>Effortless Elegance</h1>
  
        <p>We create bespoke events that are inspired by our clients. We work collaboratively to ensure your event is cohesive and thoughtful. 
         At RAP Event Planning, we believe that even the smallest details can have a huge impact.</p>
   
        <a class="pink-button" href="events.php"> EVENT PORTFOLIO</a>
    </div>
</div>

<hr>
<!-- .............................................................................. -->
    <!-- about-rap-members-tab-button -->
    

    <div class="founder">
        <img class="founder-pic" src="images/home/download.jfif" alt="founder-pic">
           
        <div class="founder-para">
        
            <h1>Award Winning Team</h1>
      
            <p>We are type-A creatives backed by experienced teams in our Jaipur, Manali and Goa locations. We take on a limited number of events per year to ensure each client 
              receives the highest level of service and attention. At RAP Event Planning, we’re dedicated to producing not only a spectacular event, but the foundation 
              for memories that will last a lifetime.</p>

            <a class="pink-button" href="about.php">MEET RIHA ABHISHEK AND PRIYANKA</a>
        </div>
        <br><br><br><br>
    </div>

    <!-- <div class="uniform"></div> -->
    
    <hr>
    <!-- .............................................................................. -->

    <!-- our work and office info tab button -->
    <div class="services">
        <div class="services-para">
        <img class="services-pic" src="images/home/personal-touch.PNG" alt="servies-pic">
   
        <h1>Personal touches</h1>
    
        <p>You don’t only want a beautiful event, you want it to be YOUR beautiful event. We believe that behind every event is a story. So, whether it’s a bespoke escort 
        card display or creative ways to make each guest feel included, we’re here to help you tell your story.</p>
    
        <a class="pink-button" href="services.php">OUR SERVICES</a>
        </div>
    </div>
    
    <hr>
    <!-- .............................................................................. -->   

    <!-- customer feedback tab button -->
    <div class="feedback">
        <div class="feedback-para">
        <img class="feedback-pic" src="images/home/flawless-execution.jpg" alt="feedback-pic">
    
        <h1>Flawless Execution</h1>
    
        <p>We specialize in planning and designing weddings and events in private homes and raw spaces. We pride ourselves on flawless execution with high level touches. 
        Weekend affairs, multiple days of tent installation, ferries and travel logistics are a typical day at the office.</p>
    
        <a class="pink-button" href="feedback.php">WHAT CLIENTS ARE SAYING</a>
    </div>
    </div>

    
    <!-- .............................................................................. -->


    <!-- footer -->
    <?php include('./partials/footer.php') ?>
      
</body>
</html>