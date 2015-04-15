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
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/foundation/js/foundation.min.js"></script>
    <script src="js/app.js"></script>
    
    </head>

  <body>

    <!-- body content here -->

<!-- -------------------------------------NAVIGATION------------------------- -->
          
<?php include 'header_coach.php';?>

<!--        start of icon image flexbox row---------------------------------------->
<div class="row">
<h1>Wod Scheduler</h1>

<!--new workout button-->
    <form action="/create_workout.php">
        <input class="button" type="submit" value="Add New Workout">
    </form> 


<!--       WORKOUT TABLE DATA flexbox row---------------------------------------->
<div class="small-12 small-centered columns">
<!--search bar and filter -->
    <div class="small-12 small-centered columns">
    <input type="search" id="database_search" placeholder="Search">
    <h3>Type</h3><select> 
            <option>Timed</option>
            <option>Not Timed</option>
            <option>Rounds</option>
            <option>Reps</option>
        </select>
    </div>
        


    </div>
</div>      
        
        
    </body>
</html>
