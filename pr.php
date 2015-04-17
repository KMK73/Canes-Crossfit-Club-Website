<?php 
session_start();
if(!isset($_SESSION["sess_user"])){
	header("location:/peak_login.php");
}
include($_SERVER['DOCUMENT_ROOT'].'/header_athlete.php');
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


<!--      start member session---------------------------------------------------->

<div class="row">
            <div class="large-6 columns" >
            <!--call the user first name from the database-->

            <h2><?=$_SESSION['first_name'];?> Personal Records</h2>
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
        <a href="create_pr.php" class="button round">Add new PR</a>
    </div>
</div>

<!--       PR DATA row---------------------------------------->
<div class="row">
<!--       PR DATA from sql---------------------------------------->    
    <?php
        include 'connect.php';   

        $query = "SELECT * FROM pr_data WHERE user_id= '".$_SESSION['user_id']."'ORDER BY pr_date DESC";
//        echo $query;
		$result = mysqli_query($sql_link, $query); ?>
    
<!--        //create div boxes for workouts of current date from mysql -->
        <?php 
        while($row = mysqli_fetch_array($result)) {

        ?>

        <div class="large-6 columns">
            <div class="panel">
                <h3><?php echo $row['exercise_name']; ?></h3>
                <p><?php echo $row['rep_description']; ?></p>
            
        <?php $integer_date = strtotime($row['pr_date']); //integer date format
		$pr_date = date("F j, Y", $integer_date);?>
                <p><?php echo $pr_date; ?></p>    
        </div>   
    </div>

            <?php

         };

         ?>
         </div>


    
    
    </body>
</html>
