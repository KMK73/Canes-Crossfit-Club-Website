<?php 
session_start();
if(!isset($_SESSION["sess_user"])){
	header("location:/peak_login.php");
}
include($_SERVER['DOCUMENT_ROOT'].'/header_athlete.php');
?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<!--      start member session---------------------------------------------------->


<!--        user icon image-->
    <div class="row">
        <div class="large-6 columns user-info-panel">
            <!--call the user first name from the database-->

            <h2>Welcome, <?=$_SESSION['first_name'];?>! </h2>
            <div class="small-6 columns" id="user-avatar-div">
<!--      cannot get the image string to work     

*****************************************************************

-->
                <?php echo $_SESSION['user_avatar'];?>
            <img src="userfiles/avatar/.<?php $_SESSION['user_avatar'];?>." alt="User Icon">

            </div>
            
        <div>
            <p><?=$_SESSION['first_name'];?> <?=$_SESSION['last_name'];?></p>
            <p><?=$_SESSION['user_type'];?></p>
        </div>
    </div>
 </div>
    
<!--        start of ANNOUNCEMENTS row---------------------------------------->     
    <div class="row">
<!--DATABASE CONNECTION AND club announcement -->
        <?php
        include '../connect.php';   
        $query ="select * from announcements order by announcement_id desc limit 1";
        $result = mysqli_query($sql_link, $query);

    //create div boxes for workouts of current date from mysql 
        while($row = mysqli_fetch_array($result)) {

        ?>
        <div class="row">
    <div class="small-12 small-centered medium-11 medium-centered large-12 large-centered panel clearfix columns">
        <h2 id=homepage-announcement>CANES Crossfit Club Announcement</h2>
        <div class="large-6 columns">
                <h3><?php echo $row['announcement_name']; ?></h3>
                    <p><?php echo $row['description']; ?></p>
            </div>          
               <div class="large-6 columns">
<!--                    //insert iframe info here --> 
<div class="flex-video">   
    <iframe width="560" height="315" src="<?php echo $row['link'];?>"frameborder="0" allowfullscreen></iframe></div>              
    <?php }; ?>
    </div>
 </div>
    </div>
<!--        start of WOD TITLE row---------------------------------------->
<div class="row">
           <div class="small-12 small-centered medium-11 medium-centered large-12 large-centered panel columns">
        <h2>CANES Crossfit Club WOD<h2 id="date"></h2>
            <script>
            var d = new Date();
            document.getElementById("date").innerHTML = d.toDateString();
            </script>
       </h2> 
       </div>
</div>
<!--        start of WOD BOXES for daily workouts row---------------------------------------->
   <div class="row"> 
<!--DATABASE CONNECTION AND DAILY WORKOUT NAME AND DESCRIPTION -->
        <?php
        include '../connect.php';   
        $query ="SELECT * FROM workouts ORDER BY workout_id DESC LIMIT 1";
        $result = mysqli_query($sql_link, $query);

    //create div boxes for workouts of current date from mysql 
        while($row = mysqli_fetch_array($result)) {

        ?>
                <div class="small-12 small-centered medium-11 medium-centered large-5 large-uncentered panel columns" data-equalizer-watch="box" id="wod_box">
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
    <div class="small-12 small-centered medium-11 large-12 panel clearfix columns">
    <h2>Select Workout to see current Leaderboard</h2>
    <form action ="/member/member-athlete.php#leaderboard" method="POST">
            <?php         
            include '../connect.php'; 
				//select last submitted workout from database
            $query = "SELECT * FROM workouts ORDER BY workout_id DESC LIMIT 1";
            $result = mysqli_query($sql_link, $query);
            echo $query;

        ?>

        <select class="wod_name" name ="leaderboard_wod"> 
            
            <?php while ($row = mysqli_fetch_assoc($result)):?>
            <option value="<?php echo $row['workout_id']?>"><?php echo $row['workout_name'];?></option>
            <?php endwhile;?>	
            
            ?>  
        </select>

                <input class="button" type="submit" name="submit" value="Get Workout Leaderboard"/>
<!--        need an anchor tag for leaderboard----------------------->
    </form>
        
<!--display the selected workout description--------------------------------->
<div class="row"> 
    <?php if($_POST['submit']): ?>
                <div class="small-12 small-centered large-6 large-uncentered columns">
    <div class="panel" id="wod_results_description">
        <div id="wod_results">
    <!--display the selected workout name--------------------------------->
     <!--        anchor link for get workout leaderboard-->
       <a name="leaderboard"></a><h3><?php echo "Description of Workout"?></h3> 
            
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
<!--    ending row div-->
</div>

 
   <!--        start of LEADERBOARD row--------------------------------->
<div class="row">
    <div class="small-12 small-centered medium-11 medium-centered large-12 large-centered panel columns">
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


  <!--        start of LEADERBOARD database call--------------------------------------->
       <div class="row">   
           <div class="small-12 small-centered medium-12 medium-centered large-12 large-centered columns">
            <?php
                include '../connect.php'; 
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
    </div>
</div>   
    
    </body>
</html>
