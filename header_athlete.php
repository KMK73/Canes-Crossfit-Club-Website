<?php 
session_start();
if(!isset($_SESSION["sess_user"])){
	header("location:/peak_login.php");
}?>
<!DOCTYPE html>
<html class="no-js" lang="en">

  <head>
    <meta charset="utf-8" />
  <!-- if you remove this meta tag, the NSA will spy on you through your Xbox Kinect camera -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Peak 360 Crossfit</title>
    <link rel="stylesheet" href="/stylesheets/app.css" />
    <link rel="stylesheet" href="/stylesheets/app.css" />
    <script src="bower_components/modernizr/modernizr.js"></script>
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/foundation/js/foundation.min.js"></script>
    <script src="js/app.js"></script>       
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

  </head>

  <body>
  <!-- body content here -->

<nav class="top-bar" data-topbar role="navigation">
  <ul class="title-area">
    <li class="name">
      <h1><a href="athlete/member_athlete.php">Home</a></h1>
    </li>
     <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
    
      <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
  </ul>

<section class="top-bar-section">
    <!-- Right Nav Section -->
    <ul class="right">
        <li><a href="/peak_login.php"/>Login</li>
        <li><a href="/api/Logout.php"/>Logout</li>
        <li><a href="/account.html"><?=$_SESSION['first_name'];?> Settings</a></li>
    </ul>
   <!-- Left Nav Section -->
    <ul class="left">
        <li><a href="/wod_results.php">WOD Results</a></li>
        <li><a href="/pr.php">PR's</a></li>
        <li><a href="/leaderboard.php">Leaderboard</a></li>
    </ul>
  </section>
</nav>

    </body>
</html>