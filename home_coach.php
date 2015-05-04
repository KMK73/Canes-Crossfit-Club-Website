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


<!--        logo row ---------------------------------------->
<div class="row">
    <div class="large-12 large-centered columns">
            <h1 id="home-h1" class="text-center">Coaches Admin Panel</h1>
    </div>    
    <div class="small-8 small-centered large-6 large-centered columns" id="homepage-logo">
            <center><img src="images/ucrossfit_logo.png" alt="Gym Logo"></center>
        </div>        
</div>
      
      
      <!--        COACH OPTION BUTTONS ---------------------------------------->

<!--
<div class="row">
    <div class="small-12 small-centered medium-11 medium-centered large-6 large-uncentered columns" >
        <form action="/wod_database.php">
            <input class="button" type="submit" value="Wod Database">
        </form>    
    </div>
    
    <div class="small-12 small-centered medium-11 medium-centered large-6 large-uncentered columns" >
        <form action="/announcement.php">
            <input class="button" type="submit" value="Club Announcements">
        </form>  
    </div>
</div>
-->

      
 <!--        start of ANNOUNCEMENTS row---------------------------------------->     
    <div class="row">
<!--DATABASE CONNECTION AND club announcement -->
        <?php
        include 'connect.php';   
        $query ="select * from announcements order by announcement_id desc limit 1";
        $result = mysqli_query($sql_link, $query);

    //create div boxes for workouts of current date from mysql 
        while($row = mysqli_fetch_array($result)) {

        ?>
        <div class="row">
    <div class="small-12 small-centered medium-11 medium-centered large-12 large-centered panel clearfix columns">
        <h2 id=homepage-announcement>CANES Crossfit Club Announcement</h2>
        <div class="large-6 columns">
                <h3><?php echo $row['announcement_name']; ?></h3>
                    <p><?php echo $row['description']; ?></p>
            </div>          
               <div class="large-6 columns">
<!--                    //insert iframe info here --> 
<div class="flex-video">   
    <iframe width="560" height="315" src="<?php echo $row['link'];?>"frameborder="0" allowfullscreen></iframe></div>              
    <?php }; ?>
    </div>
 </div>
    </div>

    

    
    </body>
</html>
