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
      <div class="small-12 small-centered large-6 large-centered columns">
<h1>Add new PR</h1>

<form action="create_pr.php" method="POST">
    <h3>Exercise Name</h3>
	   <input type="text" placeholder="Exercise" name="exercise_name"/>

    <h3>Enter Reps and Weights</h3>
        <input type="text" placeholder="Workout Description" name="rep_description"/>

    <h3>Date</h3>

        <input type="date" name="pr_date"><br>

    </div>    
</div>
        <div class="row">
                  <div class="small-12 small-centered large-6 large-centered columns">
            <input class="button" type="submit" value="Create"/>
            </div> 
        </div>
    </form> 


        
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

	<h1><?php $dateToDisplay = date("F j, Y, g:i a", $integer_date);
			echo "Entered a PR for " . $_POST['exercise_name'];?>
			</h1>
<?php
echo '<script type="text/javascript">
alert(\'Changes Successfully Made\');
 window.location.href = "http://canespeak360crossfit.com/pr.php";
</script>';
exit; 
 ?>


	<?php endif;?>

    </body>
</html>
