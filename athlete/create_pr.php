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

    <!-- body content here -->
<!--        user icon image-->
    <div class="row">
        <div class="large-6 columns user-info-panel">
            <div class="small-6 columns" >
<!--      cannot get the image string to work     

*****************************************************************

-->
                <?php echo $_SESSION['user_avatar'];?>
            <img src="userfiles/avatar/.<?php $_SESSION['user_avatar'];?>." alt="User Icon">

            </div>
            
        <div class="small-6 columns">
            <p><?=$_SESSION['first_name'];?> <?=$_SESSION['last_name'];?></p>
            <p><?=$_SESSION['user_type'];?></p>
        </div>
    </div>

<!--        pr enter data row---------------------------------------->
<div class="row">
      <div class="small-12 small-centered columns">
<h1>Add new PR</h1>

<form action="create_pr.php" method="POST">
    <h2>Exercise Name</h2>
	   <input type="text" name="exercise_name"/>

    <h2>Enter Reps and Weights</h2>
        <input textarea placeholder="Workout Description" name="rep_description"/>

    <h2>Date</h2>
    <input type="date" name="pr_date">
    
    <input type="submit" value="Create"/>
          </form> 
    </div>
</div>
        
<!--        Database call for entering a PR PHP ---------------------------------------------->
<?php

		if ($mysqli->connect_errno) {
	    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}
		?>
			
<?php if($_POST): ?>

<?php 
    include 'connect.php';

        $exercise_name = mysqli_escape_string($sql_link, $_POST['exercise_name']);
        $rep_description = mysqli_escape_string($sql_link, $_POST['rep_description']);
        $integer_date = strtotime($_POST['pr_date']); //integer date format
		$pr_date = date("Y-m-d", $integer_date);
        
        $query = sprintf("INSERT INTO pr_data (exercise_name, rep_description, pr_date) VALUES ('%s', '%s', '%s')", $exercise_name,  $rep_description, $pr_date);

        $result = mysqli_query($sql_link, $query);
//        echo $query;
		?>

	<h1><?php $dateToDisplay = date("F j, Y, g:i a", $integer_date);
			echo "Entered a PR for " . $_POST['exercise_name'] . " on " . $dateToDisplay;?>
			</h1>

	<?php else:?>

	<h3>No PR Provided</h3>

	<?php endif;?>

    </body>
</html>
