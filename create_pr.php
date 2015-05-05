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


<!--        pr enter data row---------------------------------------->
<div class="row">
<div class="row small-10 small-centered large-8 large-centered columns">
      <div class="small-10 small-centered large-8 large-centered columns">
          <center><h1 id="pr_h1">Add new PR</h1></center>

<form action="create_pr.php" method="POST" name="pr_form">
    <h3>Exercise Name</h3>
	   <input type="text" placeholder="Exercise" name="exercise_name"/>

    <h3>Enter Reps and Weights</h3>
        <input type="text" placeholder="Workout Description" name="rep_description"/>

    <h3>Date</h3>

        <input type="date" name="pr_date"><br>
        <div class="row">
                  <div class="small-10 small-centered large-8 large-centered columns">
            <center><input class="button" type="submit" value="Create"/></center>
            </div> 
        </div>
    </form> 

</div>
      </div>
</div>
        
<!--        Database call for username and password PHP ---------------------------------------------->
			
<?php if($_POST): ?>

<?php 
    include 'connect.php';

        $exercise_name = mysqli_escape_string($sql_link, $_POST['exercise_name']);
        $rep_description = mysqli_escape_string($sql_link, $_POST['rep_description']);
        $integer_date = strtotime($_POST['pr_date']); //integer date format
		$pr_date = date("Y-m-d", $integer_date);
    // to insert the pr to the right user
        $user_id = $_SESSION['user_id'];

    
        $query = sprintf("INSERT INTO pr_data (user_id, exercise_name, rep_description, pr_date) VALUES ('%s','%s', '%s', '%s')", $user_id, $exercise_name,  $rep_description, $pr_date);

        $result = mysqli_query($sql_link, $query);
//        echo $query;
		?>
    <div class="row small-10 small-centered large-8 large-centered columns">
        <center><h1><?php $dateToDisplay = date("F j, Y, g:i a", $integer_date);
                echo "Entered a PR for " . $_POST['exercise_name'];?>
        </h1></center>
    </div>

<?php
echo '<div class="row">
        <div class="large-6 large-centered columns">
            <div data-alert class="alert-box success radius">
                Successful PR Submission
    <a href="/create_pr.php" class="close">x</a>
</div>';

'<script>
$(document).ready(function() {
    $("#pr_form").submit(function(e) {
        $("#pr_form").hide();
    });
})</script>';
exit; 
 ?>


	<?php endif;?>

    </body>
</html>
