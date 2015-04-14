<?php 
session_start();
if(isset($_SESSION["sess_user"])){
	header("location:/peak_login.php");
}
?>
<!--HOMEPAGE FOR ATHLETES (ATHLETES)----------------------------------------------->
<!DOCTYPE html>
<html class="no-js" lang="en">

  <head>
    <meta charset="utf-8" />
    <!-- if you remove this meta tag, the NSA will spy on you through your Xbox Kinect camera -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Peak 360 Crossfit</title>
    <link rel="stylesheet" href="stylesheets/app.css" />
    <link rel="stylesheet" href="stylesheets/app.css" />
    <script src="bower_components/modernizr/modernizr.js"></script>
  </head>

  <body>

    <!-- body content here -->

    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/foundation/js/foundation.min.js"></script>
    <script src="js/app.js"></script>

<!-- -------------------------------------NAVIGATION------------------------- -->
        
<?php include($_SERVER['DOCUMENT_ROOT'].'/header_athlete.php');?>

<!--        logo row ---------------------------------------->
    <div class="row">
        <div class="large-12 columns">
            <img src="images/ucrossfit_logo.png" alt="Gym Logo">
        </div>
    </div>
 <!--        start of ANNOUNCEMENTS row row---------------------------------------->     
    <div class="row">
        <div class="large-12 columns">
            <h1>Welcome to Canes Peak 360 Crossfit Club</h1>
    </div>
</div>
    
<div class="row">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/-G6Fcm6rqCU" frameborder="0" allowfullscreen></iframe> 
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio.</p>
    </div>
<!--        start of WOD TITLE row row---------------------------------------->
   <div class="row">
        <h2>What we are up to today: WOD<p id="date">
            <script>
            var d = new Date();
            document.getElementById("date").innerHTML = d.toDateString();
            </script>
       </h2>    
    </div>
<!--        start of WOD BOXES flexbox row---------------------------------------->
   <div class="row">    
<!--        WOD BOX 1---------------------------------------->
      <div class="large-4 small-12 columns">
           <div class="wod_box">
           <h3>STRENGTH WOD A</h3>
            <p>OTM – 10 Minutes
                Even 5 Strict Press
                Odd 10 Bent Over Row (3 second eccentric / negative)
                *same weight across all 5 sets, slight increases are acceptable</p>
               <button type="button" onclick="wod.html">LOG RESULT</button>
            </div> 
       </div>

<!--        WOD BOX 2  ------------------------------------------------->
<div class="large-4 small-12 columns">
           <h3>WOD B - Crossfit Open 13.3</h3>
            <p>12 Minutes AMRAP
                150 WallBalls (20, 14)
                90 Double Unders
                30 Muscle-ups</p>
            <button type="button" onclick="wod.html">LOG RESULT</button>
    </div> 
<!--        WOD BOX 3  ------------------------------------------------->
<div class="large-4 small-12 columns">
           <h3>ISI Exta WODS</h3>
            <p>WOD C</p>
            <p>C)
                3 Rounds for time
                20 calories Bike
                400 meter Run</p>
            <p>WOD D</p>
            <p>D)
                Accessory Strength Work
                4 Rounds
                8 GH Raises
                Rest 30 sec
                16 Heavy Russian KB Swings
                Rest 90 seconds</p>
            <button type="button" onclick="wod.html">LOG RESULT</button>
            </div> 
    </div>

    
    
    </body>
</html>
