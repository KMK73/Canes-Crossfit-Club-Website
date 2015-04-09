<?php 
session_start();
if(!isset($_SESSION["sess_user"])){
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
            <a href="/api/Logout.php">Logout</a>
        </div>
        </div>
    </div>
<!--        start of RESULTS AREA row---------------------------------------->
      
<!--        Database call for workouts api ---------------------------------------------->

<div class="row">    
    <h2>Leaderboard for</h2>
    <form action ="leaderboard.php" method="POST">
        <select class="wod_name" name ="leaderboard_wod"> 
            <?php include 'connect.php';
				
            $query = "SELECT * FROM workouts";
            $result = mysqli_query($sql_link, $query);?>

            <?php while ($row = mysqli_fetch_assoc($result)):?>
            <option value="<?php echo $row['id']?>"><?php echo $row['workout_name'];?></option>
            
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
            <script>   
            var selectValue = document.getElementById('daily_wod').text(); 
            var selectOption = $("#daily_wod option[value=" + selectValue + "]").text(); 
                
            </script>
                
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

                echo $selected_val;

            if(isset($_POST['submit'])){
            //get the selected value from the drop down list

                echo $selected_val;
                
            $query = "SELECT first_name, last_name, wod_results.user_id, workout_name, wod_results.workout_id, workout_level, workout_score FROM wod_results
JOIN users ON wod_results.user_id = users.user_id
JOIN workouts ON wod_results.workout_id = workouts.workout_id
WHERE wod_results.workout_id ='".$selected_val."' ORDER BY workout_score DESC";

            echo $query;
            $result = mysqli_query($sql_link, $query);

      echo "<table>
            <th>Name</th>
            <th>Workout</th>
            <th>RX</th>
            <th>Score</th>
            <tr>";

while($row = mysql_fetch_array($result)){
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