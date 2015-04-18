<?php 
session_start();
if(!isset($_SESSION["sess_user"])){
	header("location:/peak_login.php");
}
include($_SERVER['DOCUMENT_ROOT'].'/header_athlete.php');
?>
<!DOCTYPE html>
<html class="no-js" lang="en">

  <body>
<!--      start member session---------------------------------------------------->

<div class="row">
        <div class="large-6 columns user-info-panel">
            <!--call the user first name from the database-->
            <div class="small-6 columns" >
            <img src="/images/canes_crossfit_avatar_black.png" alt="User Icon"></div>
        <div class="small-6 columns">
            <p><?=$_SESSION['first_name'];?> <?=$_SESSION['last_name'];?></p>
            <p><?=$_SESSION['user_type'];?></p>
        </div>
    </div>
</div>
      
      
      
<!--new PR button-->
<div class="row">
    <div class="large-6 columns">
        <h3>Activity Feed</h3>
        <a href="wod_results.php" class="button round">Go Log more Workouts!</a>
    </div>
</div>

<!--      Feed DATA row---------------------------------------->
<div class="row">
<!--       Feed DATA from sql---------------------------------------->    
    <?php
        include 'connect.php';   

// WANT TO DISPLAY THE WORKOUT NAME, WORKOUT DESCRIPTION, LEVEL AND SCORE OF THE USERS RECENT WOD RESULTS 

//SELECT *
//FROM wod_results
//JOIN workouts ON workouts.workout_id = wod_results.workout_id 
//WHERE user_id = 39
    
        $query = "SELECT * FROM wod_results 
        JOIN workouts ON workouts.workout_id = wod_results.workout_id  
        WHERE user_id= '".$_SESSION['user_id']."'ORDER BY wod_date DESC";
//        echo $query;
		$result = mysqli_query($sql_link, $query); ?>
    
<!--        //create div boxes for workouts of current date from mysql -->
        <?php 
        while($row = mysqli_fetch_array($result)) {

        ?>

        <div class="large-6 columns">
            <div class="panel">
                <h3>Workout Name: <?php echo $row['workout_name']; ?></h3>
                <p><?php echo $row['description']; ?></p>
                <h4>Your Score: <?php echo $row['wod_score']; ?></h4>
                <p><?php echo $row['wod_level']; ?></p> 
                
        <?php $integer_date = strtotime($row['wod_date']); //integer date format
		$wod_date = date("F j, Y", $integer_date);?>
                <p><?php echo $wod_date; ?></p>    
        </div>   
    </div>

            <?php };?>
</div>


    
    
    </body>
</html>
