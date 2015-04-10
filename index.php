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
<!--        start of LEADERBOARD flexbox row---------------------------------------->
<div class="row">
    <div class="large-12 columns">
        <h2>LEADERBOARD<p id="date_leaderboard"></p>
            <script>
            var d = new Date();
            document.getElementById("date_leaderboard").innerHTML = d.toDateString();
            </script>
       </h2>

 <!--        start of LEADERBOARD TABLE DATA flexbox row---------------------------------------->   


        <table class="leaderboard" id="table1" role="grid">
            <th>Name</th>
            <th>Workout</th>
            <th>RX</th>
            <th>Score</th>
            <tr>
                <td>Kelsey Kjeldsen</td>
                <td>WOD B Crossfit Open 15.3</td>
                <td>RX</td>
                <td>131</td>            
            </tr>
            <tr>
                <td>Kelsey Kjeldsen</td>
                <td>WOD B Crossfit Open 15.3</td>
                <td>RX</td>
                <td>131</td>            
            </tr>
            <tr>
                <td>Kelsey Kjeldsen</td>
                <td>WOD B Crossfit Open 15.3</td>
                <td>RX</td>
                <td>131</td>            
            </tr>
            <tr>
                <td>Kelsey Kjeldsen</td>
                <td>WOD B Crossfit Open 15.3</td>
                <td>RX</td>
                <td>131</td>            
            </tr>
        </table>
    </div>
<script language="javascript" type="text/javascript">  
    var table1Filters = {  
        col_0: "select",  
        col_4: "none",  
        btn: true  
    }  
    var tf03 = setFilterGrid("table1",2,table1Filters);  
</script> 

  </div>  

    
    
    </body>
</html>
