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

<!--        start of icon image flexbox row---------------------------------------->
<div class="row">
<h1>YOUR PR's</h1>
</div>
<!--        start of icon image flexbox row---------------------------------------->
<div class="row">
    <div class="large-6 columns">
      <div class="row collapse">
        <div class="small-10 columns">
          <input type="text" placeholder="Search">
        </div>
            <div class="small-2 columns">
                <a href="#" class="button postfix">Search</a>
            </div>
        </div>
</div>
</div>

<!--new PR button-->
<div class="row">
    <div class="large-12 columns">
        <a href="create_pr.php" class="button round">Add new PR</a>
    </div>
</div>

<!--       PR DATA row---------------------------------------->
<div class="row">
<!--       PR DATA from sql---------------------------------------->    
    <?php
        include 'connect.php';   

        $query = "SELECT * FROM pr_data WHERE user_id= '".$_SESSION['user_id']."'ORDER BY pr_date DESC";
        echo $query;
		$result = mysqli_query($sql_link, $query);

	//	$food = array();

//		foreach($result as $row) {
//		while ($row = mysqli_fetch_assoc($result)) {
//			$new_food = array("food" => $row['name'], "id" => $row['food_id']);
//			$food[] = $new_food;
//			}
//
//			echo json_encode($food);
		//?>
<!--        //create div boxes for workouts of current date from mysql -->
        <?php 
        while($row = mysqli_fetch_array($result)) {

        ?>

        <div class="large-6 columns" style="border-style: solid">
                <h3><?php echo $row['exercise_name']; ?></h3>
                <p><?php echo $row['rep_description']; ?></p>
            
        <?php $integer_date = strtotime($row['pr_date']); //integer date format
		$pr_date = date("F j, Y", $integer_date);?>
                <p><?php echo $pr_date; ?></p>    
       </div>

            <?php

         };

         ?>
         </div>


    
    
    </body>
</html>
