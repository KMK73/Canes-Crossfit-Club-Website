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


<!--        start of RESULTS AREA row---------------------------------------->
      
<!--        Database call for workouts api ---------------------------------------------->

<div class="row">    
    <h2>Log your results for</h2>
    <form action ="wod_results.php" method="POST">
        <select class="wod_name" name ="wod_results">
                
            <?php include 'connect.php';
				
            $query = "SELECT * FROM workouts WHERE wod_date = CURDATE()";
            $result = mysqli_query($sql_link, $query);  ?>
            
            <?php while ($row = mysqli_fetch_assoc($result)):?>
            <option value="<?php echo $row['workout_id']?>"><?php echo $row['workout_name'];?></option>
            <?php endwhile;?>	
            
            ?>  
        </select>
        <input class="button" type="submit" name="submit" value="Log this Workout" />
    </form>
    
    <div class="small-12 small-centered columns">
            <div id="wod_results" >
                <h3>Description of Workout</h3>            

    <!--display the selected workout description--------------------------------->
                <p> <?php 
                if(isset($_POST['submit'])){
                    
                    $selected_wod =$_POST['wod_results']; 
                    
                    $query = "SELECT * FROM workouts WHERE workout_id='".$selected_wod."'";
//                echo $query;

                //get the descriptions and types of the workout from the dropdown menu
                $wod_result = mysqli_query($sql_link, $query);
                
                //get the value from the row of description query

                $wod_result = mysqli_fetch_array($wod_result);
        //var_dump($wod_result);
                    echo $wod_result['workout_name'];
                    echo $wod_result['description'];
                    echo $wod_result['wod_type'];
                }
                ?>
    
    </p>
                
        </div>
    </div>
    
    <h3>What was your score for this workout?</h3>
            <form name="wod_result_form" action ="wod_results.php" method="POST">
                <h4>Workout Score</h4>
                <input type="text" name="workout_score">

            <h3>How did you perform this workout?</h3>
                <h4>Level</h4>
                <input type = "radio" name="workout_level" value= "RX">RX
                <input type = "radio" name="workout_level" value= "Scaled" > Scaled

            <p><input class="button" type="submit" value="Submit"></p>
        </form>
    </div>
 
<!--      ENTERING WORKOUT RESULTS INTO DATABASE BASED ON USER-->
 <?php

		if ($mysqli->connect_errno) {
	    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}
		?>
			
<?php if($_POST['wod_result_form']): ?>

<?php 
    include 'connect.php';

        $workout_id = mysqli_escape_string($sql_link, $wod_result['workout_id']);
        $user_id = mysqli_escape_string($sql_link, $_SESSION['user_id']);
        $workout_score = mysqli_escape_string($sql_link, $_POST['workout_score']);
        $workout_level = mysqli_escape_string($sql_link, $_POST['workout_level']);
        
        $query = sprintf("INSERT INTO wod_results (workout_id, user_id, workout_score, workout_level) VALUES ('%s', '%s', '%s','%s')", $workout_id,  $user_id, $workout_score, $workout_level);
        echo $query;
        $result = mysqli_query($sql_link, $query);
        echo $result;
		?>

	<?php else:?>

	<h3>No PR Provided</h3>

	<?php endif;?>
   
    
    
    </body>
</html>
