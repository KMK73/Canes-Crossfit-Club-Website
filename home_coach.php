<?php 
session_start();
if(!isset($_SESSION["sess_user"])){
	header("location:/peak_login.php");
}
include($_SERVER['DOCUMENT_ROOT'].'/header_coach.php');
?>
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


<!--        start of icon image flexbox row---------------------------------------->
<!--        user icon image-->
    <div class="row">
        <div class="small-6 large-centered columns">
            <img src="images/ucrossfit_logo.png" alt="Gym Logo">
        </div>
        <div class="large-12 columns">
            <h2>Welcome, <?=$_SESSION['first_name'];?>! </h2>
            </div>
        </div>


<!--        COACH OPTION BUTTONS ---------------------------------------->

<div class="row">
    <div class="small-6 large-6 columns" >
        <form action="/wod_database.php">
            <input class="button" type="submit" value="Wod Database">
        </form>    
    </div>
    
    <div class="small-6 large-6 columns" >
        <form action="/announcement.php">
            <input class="button" type="submit" value="Club Announcements">
        </form>  
    </div>
</div>

    

    
    </body>
</html>
