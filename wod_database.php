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
<h1>Wod Database</h1>

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
    <!--        start of LEADERBOARD row---------------------------------------->
<div class="row">
    <div class="large-12 columns">
        <h2>Workout Schedule for the Week<p id="date_scheduler"></p>
            <script>
            var d = new Date();
            document.getElementById("date_leaderboard").innerHTML = d.toDateString();
            </script>
       </h2>

 <!--        start of LEADERBOARD TABLE DATA flexbox row---------------------------------------->
            
            <?php
            include 'connect.php';

            $query = "SELECT * FROM workouts
            WHERE wod_date 
            BETWEEN DATE(NOW()) AND
            DATE(NOW() + INTERVAL (6 - WEEKDAY(NOW())) DAY)
            ORDER BY wod_date";

            $result = mysqli_query($sql_link, $query);
            $row = mysqli_fetch_array($result);      

      

    //NEED LEADERBOARD query for timed workouts to show time in desc order (need wod_results to populate time correctly) 
                

//            echo $query;
            $result = mysqli_query($sql_link, $query);

      echo "<table>
            <th>Workout Name</th>
            <th>Workout Description</th>
            <th>Date Scheduled</th>
            <tr>";

while($row = mysqli_fetch_array($result)){
  // define all of our variables 
    //$day[weekday]; //day of the week
  $workout_name  = $row['workout_name']; //workout name
  $workout_description = $row['description']; //workout description
  $workout_date = $row['wod_date']; //workout date scheduled
 
// Now for each looped row
// <td>".$day."</td>
echo "<tr><td>".$workout_name."</td><td>".$workout_description."</td><td>".$workout_date."</td></tr>";
 
}// End our while loop
echo "</table>";
?>

    </div>
</div>  

        
    </body>
</html>
