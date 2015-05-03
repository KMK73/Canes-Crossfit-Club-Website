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
      <div class="small-12 small-centered large-8 large-centered columns">
<h1>Create New Workout</h1>

<form action="create_workout.php" method="POST">
    <h2>Workout Name</h2>
	   <input type="text" name="workout_name"/>

    <h2>Type</h2>

        <select name="wod_type">
			  <option value="timed">Timed</option>
			  <option value="not_timed">Not Timed</option>
                <option value="weight">Weight</option>
			  <option value="reps">As Many Reps as Possible</option>
			  <option value="rounds">As Many Rounds as Possible</option>
        </select>

    <h2>Description</h2>
<textarea placeholder="Description" name="wod_description"></textarea>
    <h2>Date</h2>
    <input type="date" name="wod_date">
    
    <center><input class="button" type="submit" value="Submit Workout"/></center>
          </form> 
    </div>
</div>
        
<!--        Database call for username and password PHP ---------------------------------------------->
<?php

		if ($mysqli->connect_errno) {
	    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}
		?>
			
<?php if($_POST): ?>

<?php 
    include 'connect.php';

//convert line breaks in texts using this function
//$textToStore = nl2br(htmlentities($inputText, ENT_QUOTES, 'UTF-8'));

        $workout_name = mysqli_escape_string($sql_link, $_POST['workout_name']);
        $wod_type = mysqli_escape_string($sql_link, $_POST['wod_type']);
        $description =$_POST['wod_description'];
//convert line breaks in texts using this function
        $description = nl2br(htmlentities($description, ENT_QUOTES, 'UTF-8'));

//convert date into proper format
        $integer_date = strtotime($_POST['wod_date']); //integer date format
		$wod_date = date("Y-m-d", $integer_date);
        
        $query = sprintf("INSERT INTO workouts (workout_name, wod_type, description, wod_date) VALUES ('%s', '%s', '%s', '%s')", $workout_name, $wod_type, $description, $wod_date);

        $result = mysqli_query($sql_link, $query);
//        echo $query;
		?>

	<h1><div class="large-6 large-centered columns"><?php $dateToDisplay = date("F j, Y, g:i a", $integer_date);
			echo "Entered a workout for " . $_POST['name'] . " for " . $dateToDisplay;?>
			</h1></div>


	<?php else:?>

	<h3>No WOD Provided</h3>

	<?php endif;?>

    </body>
</html>
