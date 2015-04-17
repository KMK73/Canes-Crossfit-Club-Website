<?php 
session_start();
if(!isset($_SESSION["sess_user"])){
	header("location:/peak_login.php");
}
include($_SERVER['DOCUMENT_ROOT'].'/header_coach.php');
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
  <body>

<!-- body content here -->


<!--        start of icon image flexbox row---------------------------------------->
<!--        user icon image-->
    <div class="row">
        <div class="small-6 large-centered columns">
            <img src="images/ucrossfit_logo.png" alt="Gym Logo">
        </div>
        <div class="large-12 columns">
            <h2>Welcome, <?=$_SESSION['first_name'];?>! </h2>
            </div>
        </div>


<!--        COACH OPTION BUTTONS ---------------------------------------->

<div class="row">
    <div class="small-6 large-6 columns" >
        <form action="/wod_database.php">
            <input class="button" type="submit" value="Wod Database">
        </form>    
    </div>
    
    <div class="small-6 large-6 columns" >
        <form action="/announcement.php">
            <input class="button" type="submit" value="Club Announcements">
        </form>  
    </div>
</div>

    

    
    </body>
</html>
