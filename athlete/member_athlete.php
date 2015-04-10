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
        <div class="large-12 columns" >
            <!--call the user first name from the database-->

            <h2>Welcome, <?=$_SESSION['first_name'];?>! </h2>
            <div class="small-2 columns" >
            <img src="/images/kmk-logo.png" alt="User Icon"></div>
        <div class="small-10 columns">
            <p><?=$_SESSION['first_name'];?> <?=$_SESSION['last_name'];?></p>
            <p><?=$_SESSION['user_type'];?></p>
        <p><a href="/api/Logout.php">Logout</p>
        </div>
        </div>
    </div>

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
               <a href="/wod_results.php" class="button" >LOG RESULT</a>
            </div> 
       </div>

<!--        WOD BOX 2  ------------------------------------------------->
<div class="small-4 columns">
           <h3>WOD B - Crossfit Open 13.3</h3>
            <p>12 Minutes AMRAP
                150 WallBalls (20, 14)
                90 Double Unders
                30 Muscle-ups</p>
               <a href="/wod_results.php" class="button" >LOG RESULT</a>
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
               <a href="/wod_results.php" class="button" >LOG RESULT</a>
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
      </div>
 <!--        start of LEADERBOARD TABLE DATA flexbox row---------------------------------------->   
<div class="row">    
    <h2>Select Workout to see current Leaderboard</h2>
    <form action ="/athlete/member_athlete.php" method="POST">
            <?php include '../connect.php';
				
            $query = "SELECT * FROM workouts WHERE wod_date = CURDATE()";
            $result = mysqli_query($sql_link, $query);
            echo $query;
var_dump($result);
        ?>

        <select class="wod_name" name ="leaderboard_wod"> 
            
            <?php while ($row = mysqli_fetch_assoc($result)):?>
            <option value="<?php echo $row['workout_id']?>"><?php echo $row['workout_name'];?></option>
            <?php endwhile;?>	
            
            ?>  
        </select>
        <input class="button" type="submit" name="submit" value="Get Workout Leaderboard" />
    </form>
    <div class="small-12 small-centered columns">
            <div id="wod_display" >
                <h3>Description of Workout</h3>
 <!--display the selected workout description--------------------------------->               

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
<!--        start of LEADERBOARD row---------------------------------------->
<div class="row">
    <div class="large-12 columns">
        <h2>LEADERBOARD<p id="date_leaderboard"></p>
            <script>
            var d = new Date();
            document.getElementById("date_leaderboard").innerHTML = d.toDateString();
            </script>
       </h2>

 <!--        start of LEADERBOARD TABLE DATA flexbox row---------------------------------------->
            
            <?php
            include 'connect.php';
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
