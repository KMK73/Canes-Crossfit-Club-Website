<?php 
session_start();
if(!isset($_SESSION["sess_user"])){
	header("location:/peak_login.php");
}
include($_SERVER['DOCUMENT_ROOT'].'/header_athlete.php');
?>
<!--HOMEPAGE FOR ATHLETES (ATHLETES)----------------------------------------------->
<!DOCTYPE html>
<html class="no-js" lang="en">

  <body>

<!-- body content here -->


<!--        user icon image-->
    <div class="row">
        <div class="large-6 columns user-info-panel" >
            <!--call the user first name from the database-->
            <div class="small-6 columns" id="user-avatar-div">
<!--    image string to work     -->
            <img src="../userfiles/avatars/<?php echo $_SESSION['user_avatar'] ?>" alt="User Icon">
            </div>
        <div>
            <p><?=$_SESSION['first_name'];?> <?=$_SESSION['last_name'];?></p>
            <p><?=$_SESSION['user_type'];?></p>
        </div>
    </div>
      </div>
<!--        start of RESULTS AREA row---------------------------------------->
      
<!--        Database call for workouts api ---------------------------------------------->

<div class="row"> 
    <div class="small-10 small-centered medium-11 medium-centered large-12 panel clearfix columns">
             <div class="small-12 small-centered large-6 large-uncentered columns">
    <h2>Select Workout to see current Leaderboard</h2>

<!--======================   KEEP FORM SELECTED OPTION LISTED USING COOKIES -->
    <script>
        $(document).ready(function(){
            $("#selected_wod").change(function(){
                var selectedWorkout = $("#selected_wod").val();
                console.log("select "+ selectedWorkout);
                $.cookie('workout', selectedWorkout);
            });
            $("#selected_wod").val($.cookie('workout'));         
        });
    </script>
                 
    <form action ="leaderboard.php" method="POST">
        <select class="wod_name" name ="leaderboard_wod" id="selected_wod"> 
            <?php include 'connect.php';
				
            $query = "SELECT * FROM workouts";
            $result = mysqli_query($sql_link, $query);?>
            
            <?php while ($row = mysqli_fetch_assoc($result)):?>
            <option value="<?php echo $row['workout_id']?>" selected="selected"><?php echo $row['workout_name'];?></option>
            
            <?php endwhile;?>	
            
            ?>  
        </select>
        <input class="button" type="submit" name="submit" value="Get Workout Leaderboard" />
        </form>
    </div>

    

    <!--display the selected workout description--------------------------------->
<div class="row"> 
    <?php if($_POST['submit']): ?>
                <div class="small-12 small-centered large-6 large-uncentered columns">
                    <div class="panel" id="wod_results_description">
                    <div id="wod_results">
    <!--display the selected workout name--------------------------------->
                        <h3><?php echo "Workout Name:"?></h3> 
                         <p> <?php 
                    $selected_wod =$_POST['leaderboard_wod']; 

                    $query = "SELECT * FROM workouts WHERE workout_id='".$selected_wod."'";
//                echo $query;

                //get the name and description and types of the workout from the dropdown menu
                $wod_result = mysqli_query($sql_link, $query);
                
                //get the value from the row of description query

                $wod_display = mysqli_fetch_array($wod_result);
//        var_dump($wod_display);
//                    echo $wod_display['workout_name'];
                    echo $wod_display['workout_name'];
                    $wod_id = $wod_display['workout_id'];
                     $_SESSION['workout_id'] = $wod_id;
                ?>
    </p>
                        
                <h3><?php echo "Description of Workout"?></h3>  
                <p> <?php 
                    
                    $selected_description =$_POST['leaderboard_wod']; 
                    
                    $query = "SELECT description FROM workouts WHERE workout_id='".$selected_description."'";
//                echo $query;

                //get the description of the workout from the dropdown menu
                $description_result = mysqli_query($sql_link, $query);
                //get the value from the row of description query
                $description_result =       mysqli_fetch_array($description_result);
                    echo $description_result['description'];

                ?></p>
        </div>
    </div>
</div>
</div>
        
</div>
    <!--        start of LEADERBOARD row--------------------------------->
<div class="row">
    <div class="small-10 small-centered medium-11 medium-centered large-12 columns">
        <h2>LEADERBOARD</h2>
        <h4> <?php 
//    selected workout date from dropdown                 
        $wod_date_selected =$_POST['leaderboard_wod']; 
                    
        $query = "SELECT wod_date FROM workouts WHERE workout_id='".$wod_date_selected."'";


//get the workout date of the workout from the dropdown menu
    $date_result = mysqli_query($sql_link, $query);
    $date_display = mysqli_fetch_array($date_result); 

$workout_date = $date_display['wod_date']; //workout date scheduled
$integer_date = strtotime($workout_date);

//new date format for table
$wod_date = date("l F jS, Y", $integer_date); //Day, Month, Day, Year


//use workout date as h4 heading 
echo $wod_date;

                ?></h4>


<?php endif;?>  


 <!--        start of LEADERBOARD TABLE DATA flexbox row---------------------------------------->
            
            <?php
            include 'connect.php';
            $selected_val =$_POST['leaderboard_wod']; 
            //get the selected value from the drop down list

            if(isset($_POST['submit'])){
            //get the selected value from the drop down list
            $query = "SELECT wod_type FROM workouts WHERE workout_id = ".$selected_val;
                $result = mysqli_query($sql_link, $query);
                $row = mysqli_fetch_array($result);
                if ($row['wod_type'] == "timed") {
            $query = "SELECT first_name, last_name, wod_results.user_id, workout_name, wod_results.workout_id, workout_level, workout_score, wod_date FROM wod_results
JOIN users ON wod_results.user_id = users.user_id
JOIN workouts ON wod_results.workout_id = workouts.workout_id
WHERE wod_results.workout_id ='".$selected_val."' ORDER BY workout_score ASC";

                }
                else {
            $query = "SELECT first_name, last_name, wod_results.user_id, workout_name, wod_results.workout_id, workout_level, workout_score, wod_date FROM wod_results
JOIN users ON wod_results.user_id = users.user_id
JOIN workouts ON wod_results.workout_id = workouts.workout_id
WHERE wod_results.workout_id ='".$selected_val."' ORDER BY workout_score DESC";
                    
                }
                
            

    //NEED LEADERBOARD query for timed workouts to show time in desc order (need wod_results to populate time correctly) 
                

//            echo $query;
            $result = mysqli_query($sql_link, $query);

      echo "<table>
            <th>Rank</th>
            <th>Name</th>
            <th>Workout</th>
            <th>RX</th>
            <th>Score</th>
            <tr>";
$count =1; //start the ranking count
                
while($row = mysqli_fetch_array($result)){
  // define all of our variables 
 
  $first_name = $row['first_name'];
  $last_name = $row['last_name'];
  $workout_name  = $row['workout_name'];
  $workout_level = $row['workout_level'];
  $workout_score = $row['workout_score'];
 
// Now for each looped row
 
echo "<tr><td>".$count."</td><td>".$first_name."</td><td>".$workout_name."</td><td>".$workout_level."</td><td>".$workout_score."</td></tr>";
 
$count++;
} // End our while loop
echo "</table>";
}?>

    </div>
</div>  
   
    
    </body>
</html>