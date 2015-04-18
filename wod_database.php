<?php 
session_start();
if(!isset($_SESSION["sess_user"])){
	header("location:/peak_login.php");
}
include($_SERVER['DOCUMENT_ROOT'].'/header_coach.php');
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
  <body>

    <!-- body content here -->

<!--        start of icon image flexbox row---------------------------------------->
<div class="row">
    <div class="small-11 large-4 columns">
<h1>Wod Database</h1>

<!--new workout button-->
    <form action="/create_workout.php">
        <input class="button" type="submit" value="Add New Workout">
    </form> 
</div>


<!--       SEARCH FEATURE FOR PHASE 2---------------------------------------->
<!--
        <div class="small-11 large-8 columns">
search bar and filter 
            <div class="small-12 large-8 columns">
            <input type="search" id="database_search" placeholder="Search">
            <h3>Type</h3><select> 
                    <option>Timed</option>
                    <option>Not Timed</option>
                    <option>Rounds</option>
                    <option>Reps</option>
            </select>
            </div>
      </div>
-->
</div>
    <!--        start of LEADERBOARD row---------------------------------------->
<div class="row">
    <div class="large-12 columns">
        <h2>Workout Schedule for the Week<p id="date_scheduler"></p>
            <script>
            var d = new Date();
            document.getElementById("date_scheduler").innerHTML = d.toDateString();
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
$integer_date = strtotime($workout_date);

//new date format for table
$wod_date = date("l F jS, Y", $integer_date); //Day, Month, Day, Year
 
// Now for each looped row
// <td>".$day."</td>
echo "<tr><td>".$workout_name."</td><td>".$workout_description."</td><td>".$wod_date."</td></tr>";
 
}// End our while loop
echo "</table>";
?>

    </div>
</div>  

        
    </body>
</html>
