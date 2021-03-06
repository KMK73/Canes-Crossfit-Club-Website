<!DOCTYPE html>
<html class="no-js" lang="en">

  <head>
    <meta charset="utf-8" />
  <!-- if you remove this meta tag, the NSA will spy on you through your Xbox Kinect camera -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Canes Crossfit Club</title>
    <link rel="stylesheet" href="/stylesheets/app.css" />
      <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
    <script src="/bower_components/modernizr/modernizr.js"></script>
    <script src="/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="/js/app.js"></script>       
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="/js/jquery-cookie-master/src/jquery.cookie.js"></script>
    <link rel="stylesheet" href="/css/main.css">
  </head>

  <body>
  <!-- body content here -->
<script src="../js/foundation/foundation.topbar.js"></script>

<nav class="top-bar" data-topbar role="navigation">
  <ul class="title-area">
    <li class="name">
      <h1><a href="/athlete/member_athlete.php">Home</a></h1>
    </li>
     <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
    
      <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
  </ul>

<!--    MOBILE SECTION CLASS-->

<section class="top-bar-section">
   <!-- Left Nav Section -->
    <ul class="left">
        <li><a href="/activity.php">WOD Feed</a></li>
        <li><a href="/wod_results.php">Record a WOD</a></li>
        <li><a href="/pr.php">PR's</a></li>
        <li><a href="/leaderboard.php">Leaderboard</a></li>
    </ul>
            <!-- Right Nav Section -->
    <ul class="right">
        <li><a href="/peak_login.php"/>Login</li>
        <li><a href="/api/Logout.php"/>Logout</li>
        <li><a href="/profile/update-profile.php"><?=$_SESSION['first_name'];?> Settings</a></li>
    </ul>
  </section>
</nav> 
<!--      Call for mobile menu function-->

<script src="/bower_components/foundation/js/foundation.min.js"></script>  
<script>
$(document).ready(function() {
    $(document).foundation();
});
</script>
      
      
    </body>
</html>