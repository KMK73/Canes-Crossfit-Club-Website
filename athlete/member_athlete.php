<?php 
session_start();
if(!isset($_SESSION["sess_user"])){
	header("location:/peak_login.php");
}
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

<!-- -------------------------------------NAVIGATION------------------------- -->
          
<?php include($_SERVER['DOCUMENT_ROOT'].'/header_athlete.php');?>
<!--      start member session---------------------------------------------------->


<!--        user icon image-->
<div class="row">
        <div class="large-6 columns" >
            <!--call the user first name from the database-->

            <h2>Welcome, <?=$_SESSION['first_name'];?>! </h2>
            <div class="small-4 columns" >
            <img src="/images/kmk-logo.png" alt="User Icon"></div>
        <div class="small-8 columns">
            <p><?=$_SESSION['first_name'];?> <?=$_SESSION['last_name'];?></p>
            <p><?=$_SESSION['user_type'];?></p>
        <p><a href="/api/Logout.php"/>Logout</p>
        </div>
    </div>


<!--        start of ANNOUNCEMENTS ---------------------------------------->

        <iframe width="560" height="315" src="https://www.youtube.com/embed/-G6Fcm6rqCU" frameborder="0" allowfullscreen></iframe> 
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio.</p>
</div>
    
<!--        start of WOD TITLE row row---------------------------------------->
   <div class="row">
        <h2>WOD<h2 id="date"></h2>
            <script>
            var d = new Date();
            document.getElementById("date").innerHTML = d.toDateString();
            </script>
       </h2>    
    </div>
<!--        start of WOD BOXES for daily workouts row---------------------------------------->
   <div class="row">    
<!--DATABASE CONNECTION AND DAILY WORKOUT NAME AND DESCRIPTION -->
        <?php
        include '../connect.php';   
        $query ="SELECT * FROM workouts WHERE wod_date = CURDATE()";
        $result = mysqli_query($sql_link, $query);

    //create div boxes for workouts of current date from mysql 
        while($row = mysqli_fetch_array($result)) {

        ?>

        <div class="large-6 columns">
                <h3><?php echo $row['workout_name']; ?></h3>
                <p><?php echo $row['description']; ?></p>
                <a href="/wod_results.php" class="button" />LOG RESULT</a>     
       </div>

            <?php

         };

         ?>
         </div>


 <!--        start of LEADERBOARD submit form ---------------------------------------->   
<div class="row">    
    <h2>Select Workout to see current Leaderboard</h2>
    <form action ="/athlete/member_athlete.php" method="POST">
            <?php         
            include '../connect.php'; 
				
            $query = "SELECT * FROM workouts WHERE wod_date = CURDATE()";
            $result = mysqli_query($sql_link, $query);
//            echo $query;

        ?>

        <select class="wod_name" name ="leaderboard_wod"> 
            
            <?php while ($row = mysqli_fetch_assoc($result)):?>
            <option value="<?php echo $row['workout_id']?>"><?php echo $row['workout_name'];?></option>
            <?php endwhile;?>	
            
            ?>  
        </select>
        <input class="button" type="submit" name="submit" value="Get Workout Leaderboard" />
<!--        need an anchor tag for leaderboard----------------------->
    </form>
    <div class="small-12 small-centered columns">
            <div id="wod_display" >
                <h3>Description of Workout</h3>

    <!--display the selected workout description--------------------------------->
                <p> <?php 
                if(isset($_POST['submit'])){
                    
                    $selected_description =$_POST['leaderboard_wod']; 
                    
                    $query = "SELECT description FROM workouts WHERE workout_id='".$selected_description."'";
//                echo $query;

                //get the description of the workout from the dropdown menu
                $description_result = mysqli_query($sql_link, $query);
                //get the value from the row of description query
                $description_result = mysqli_fetch_array($description_result);
                echo $description_result['description'];
                }
                ?>
    
    </p>
                
        </div>
    </div>
</div>
<!--        start of LEADERBOARD heading---------------------------------------->
<div class="row">
        <h2>LEADERBOARD<p id="date_leaderboard"></p>
            <script>
            var d = new Date();
            document.getElementById("date_leaderboard").innerHTML = d.toDateString();
            </script>
       </h2>
</div>

 <!--        start of LEADERBOARD database call--------------------------------------->
       <div class="row">   
           <div class="small-8 small-centered large-6 large-centered columns">
            <?php
                include '../connect.php'; 
            $selected_val =$_POST['leaderboard_wod']; 
            //get the selected value from the drop down list

            if(isset($_POST['submit'])){
            //get the selected value from the drop down list
                
            $query = "SELECT first_name, last_name, wod_results.user_id, workout_name, wod_results.workout_id, workout_level, workout_score FROM wod_results
JOIN users ON wod_results.user_id = users.user_id
JOIN workouts ON wod_results.workout_id = workouts.workout_id
WHERE wod_results.workout_id ='".$selected_val."' ORDER BY workout_score DESC";

//            echo $query;
            $result = mysqli_query($sql_link, $query);

      echo "<table>
            <th>Name</th>
            <th>Workout</th>
            <th>RX</th>
            <th>Score</th>
            <tr>";

while($row = mysqli_fetch_array($result)){
  // define all of our variables 
 
  $first_name = $row['first_name'];
  $last_name = $row['last_name'];
  $workout_name  = $row['workout_name'];
  $workout_level = $row['workout_level'];
  $workout_score = $row['workout_score'];
 
// Now for each looped row
 
echo "<tr><td>".$first_name."</td><td>".$workout_name."</td><td>".$workout_level."</td><td>".$workout_score."</td></tr>";
 
} // End our while loop
echo "</table>";
}?>

    </div>
</div>
    
    
    
    </body>
</html>
