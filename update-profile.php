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

<form action="profile/update-profile-after-registration.php" method="post" enctype="multipart/form-data" id="UploadForm" autocomplete="off">
<?php
    include 'connect.php';
    $username = mysqli_real_escape_string($sql_link,$_REQUEST['username']);
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($sql_link,$query);
    $row = mysqli_fetch_array($result);
?>
    <div class="row">
        <div class="large-6 columns">
            <label for="">First Name</label>
            <input type="text" class="form-control" placeholder="<?php echo $row['first_name'];?>" name="first_name" value="<?php echo $row['first_name'];?>" required>
        </div>
        <div class="large-6 columns">
            <label for="">Last Name</label>
            <input type="text" class="form-control"  placeholder="<?php echo $row['last_name'];?>" name="last_name" value="<?php echo $row['last_name'];?>" required>
        </div>        
    </div>    
    <div class="row">
        <div class="large-6 columns">
            <label for="">Password</label>
            <input type="password" class="form-control" placeholder="<?php echo $row['password'];?>" name="password" value="<?php echo $row['password'];?>" required>
        </div>
        <div class="large-6 columns">
            <label for="">Email</label>
            <input type="text" class="form-control" placeholder="<?php echo $row['username'];?>" name="username" value="<?php echo $row['username'];?>" required>
        </div>
    </div> 
        <div class="row">
    <div class="large-6 columns">
            <label for="">Avatar</label>
            <center><input name="ImageFile"  class="btn btn-primary ladda-button" data-style="zoom-in"  type="file"/></center>
            </div>  
    </div> 
<?php
    $user_username =  $_POST['username'];
?>     
    <hr>                 
    <div class="submit">           
        <center>
            <button class="btn btn-primary ladda-button" data-style="zoom-in" type="submit"  id="SubmitButton" value="Upload" />Save Your Profile</button>
        </center>
    </div>
</form>
    </body>
</html>