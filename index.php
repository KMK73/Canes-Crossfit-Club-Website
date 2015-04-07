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
        
<?php include 'header_athlete.php';?>


<!--        start of ANNOUNCEMENTS row row---------------------------------------->

    <div class="row">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/-G6Fcm6rqCU" frameborder="0" allowfullscreen></iframe> 
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio.</p>
    </div>
    
<!--        start of WOD TITLE row row---------------------------------------->
   <div class="row">
        <h2>WOD<p id="date"></p>
            <script>
            var d = new Date();
            document.getElementById("date").innerHTML = d.toDateString();
            </script>
       </h2>    
    </div>
<!--        start of WOD BOXES flexbox row---------------------------------------->
   <div class="row">    
<!--        WOD BOX 1---------------------------------------->
      <div class="small-4 columns">
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
<div class="small-4 columns">
           <h3>WOD B - Crossfit Open 13.3</h3>
            <p>12 Minutes AMRAP
                150 WallBalls (20, 14)
                90 Double Unders
                30 Muscle-ups</p>
            <button type="button" onclick="wod.html">LOG RESULT</button>
    </div> 
<!--        WOD BOX 3  ------------------------------------------------->
<div class="small-4 columns">
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

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    </body>
</html>
