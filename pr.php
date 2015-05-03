<?php 
session_start();
if(!isset($_SESSION["sess_user"])){
	header("location:/peak_login.php");
}
include($_SERVER['DOCUMENT_ROOT'].'/header_athlete.php');
?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<!--      start member session---------------------------------------------------->

<!--        user icon image-->
    <div class="row">
        <div class="large-6 columns user-info-panel">
            <div class="small-6 columns" id="user-avatar-div" >
<!--    image string to work     -->
            <img src="../userfiles/avatars/<?php echo $_SESSION['user_avatar'] ?>" alt="User Icon">
            </div>
            
        <div>
            <p><?=$_SESSION['first_name'];?> <?=$_SESSION['last_name'];?></p>
            <p><?=$_SESSION['user_type'];?></p>
        </div>
    </div>
</div>
    
<!--new PR button-->
<div class="row">    
    <div class="small-10 small-centered medium-11 medium-centered large-12 columns">
    <h2><?=$_SESSION['first_name'];?> Personal Records</h2>
        <a href="create_pr.php" class="button">Add new PR</a>
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

        <div class="small-10 small-centered medium-11 medium-centered large-6 large-uncentered columns" data-equalizer>
            <div class="panel" data-equalizer-watch>
            <?php $integer_date = strtotime($row['pr_date']); //integer date format
		$pr_date = date("F j, Y", $integer_date);?>
                <p id="pr_date"><?php echo $pr_date; ?></p>
                
        <h2><?php echo $row['exercise_name']; ?></h2>
        <p id="pr_description"><?php echo $row['rep_description']; ?></p>        
    
    </div>   
</div> <?php 
    }; ?> </div>

    </body>
</html>
