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
<?php include 'header_coach.php';?>

<!--        start of icon image flexbox row---------------------------------------->
<!--        user icon image-->
    <div class="flexbox">
        <div class="flexitem"><img src="images/peak_logo.png" alt="Gym Logo">
        </div>
    </div>

<!--        COACH OPTION BUTTONS ---------------------------------------->

<div class="flexbox">
    <form action="wod_database.php">
        <input type="submit" value="Wod Database">
    </form>    

    <form action="wod_scheduler.php">
        <input type="submit" value="Wod Scheduler">
    </form>
    
    <form action="manage_users.php">
        <input type="submit" value="Manage Users">
    </form>  
</div>
    

    
    
    
    
    
    
    
    </body>
</html>
