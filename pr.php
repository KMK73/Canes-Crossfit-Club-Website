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
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/foundation/js/foundation.min.js"></script>
    <script src="js/app.js"></script>

    
    </head>

  <body>

    <!-- body content here -->

<!-- -------------------------------------NAVIGATION------------------------- -->
          
<?php include 'header_athlete.php';?>

      <!--        start of icon image row row---------------------------------------->
<!--        user icon image-->
    <div class="row">
        <div class="small-2 columns">
            <img src="images/kmk-logo.png" alt="User Icon"></div>
        <div class="small-10 columns" >
            <p>Kelsey Kjeldsen</p>
            <p>Peak 360 Crossfit</p>
        </div>
        </div>
    </div>
<!--        start of icon image flexbox row---------------------------------------->
<div class="row">
<h1>YOUR PR's</h1>
<!--        start of icon image flexbox row---------------------------------------->
<div class="row">
    <div class="large-6 columns" style = "border: 1px solid black">
      <div class="row collapse">
        <div class="small-10 columns">
          <input type="text" placeholder="Search">
        </div>
            <div class="small-2 columns">
                <a href="#" class="button postfix">Search</a>
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
  <div class="large-6 columns">
<!--       PR DATA from sql---------------------------------------->    
    <?php
	   include 'connect.php';

		$dancer_id = $_GET['id'];

		$query = "SELECT * FROM food JOIN dancer_food ON dancer_food.food_id = food.id WHERE dancer_food.dancer_id = " . $dancer_id;

		$result = mysqli_query($sql_link, $query);

		$food = array();

//		foreach($result as $row) {
		while ($row = mysqli_fetch_assoc($result)) {
			$new_food = array("food" => $row['name'], "id" => $row['food_id']);
			$food[] = $new_food;
			}

			echo json_encode($food);
		?>

    
    </div>  
</div>

    
    
    
    
    
    
    </body>
</html>
