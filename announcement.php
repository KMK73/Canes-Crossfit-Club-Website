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
          
<?php include 'header_coach.php';?>

<!--        start of icon image flexbox row---------------------------------------->
<div class="row">
      <div class="small-12 small-centered columns">

    <h1>Create Club Announcement</h1>

          <form action="announcement.php" method="POST">
    
        <h2>Announcement Name</h2>
        <input type="text" name="announcement_name"/>

        <h2>Video or Image Link</h2>
        <input type="text" placeholder="Place video link here" name="link"/>

        <h2>Announcement Description</h2>
        <input type="text" placeholder="Announcement Description" name="description"/>

        </br><input class="button" type="submit" value="Create"/>
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

        $announcement_name = mysqli_escape_string($sql_link, $_POST['announcement_name']);
        $link = mysqli_escape_string($sql_link, $_POST['link']);
        $description = mysqli_escape_string($sql_link, $_POST['description']);
        
        $query = sprintf("INSERT INTO announcements (announcement_name, link, description) VALUES ('%s', '%s', '%s')", $announcement_name, $link, $description);

        $result = mysqli_query($sql_link, $query);
//        echo $query;

		?>

	<?php else:?>
    <div class="row">
	<h3>No Announcement Provided</h3>
    </div>
	<?php endif;?>

    </body>
</html>
