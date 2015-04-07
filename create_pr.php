<?php 
session_start();
if(!isset($_SESSION["sess_user"])){
	header("location:/login_test.php");
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
            <a href="/logout.php">Logout</a>
        </div>
        </div>
    </div>


<!--        pr enter data row---------------------------------------->
<div class="row">
      <div class="small-12 small-centered columns">
<h1>Add new PR</h1>

<form action="create_pr.php" method="POST">
    <h3>Exercise Name</h3>
	   <input type="text" placeholder="Exercise" name="exercise_name"/>

    <h3>Enter Reps and Weights</h3>
        <input type="text" placeholder="Workout Description" name="rep_description"/>

    <h3>Date</h3>
    <input type="date" name="pr_date">
    
    <input type="submit" value="Create"/>
          </form> 
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
        echo $user_id;
    
        $query = sprintf("INSERT INTO pr_data (user_id, exercise_name, rep_description, pr_date) VALUES ('%s','%s', '%s', '%s')", $user_id, $exercise_name,  $rep_description, $pr_date);

        $result = mysqli_query($sql_link, $query);
        echo $query;
		?>

	<h1><?php $dateToDisplay = date("F j, Y, g:i a", $integer_date);
			echo "Entered a PR for " . $_POST['exercise_name'] . " on " . $dateToDisplay;?>
			</h1>

	<?php else:?>

	<h3>No PR Provided</h3>

	<?php endif;?>

    </body>
</html>
