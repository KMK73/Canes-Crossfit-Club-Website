<?php 
session_start();
if(!isset($_SESSION["sess_user"])){
	header("location:/peak_login.php");
}
include($_SERVER['DOCUMENT_ROOT'].'/header_athlete.php');
?>
<!DOCTYPE html>
<html class="no-js" lang="en">

  <body>

    <!-- body content here -->

<!--        user icon image-->
    <div class="row">
        <div class="large-6 columns user-info-panel">
            <div class="small-6 columns" >
<!--      cannot get the image string to work     

*****************************************************************

-->
                <?php echo $_SESSION['user_avatar'];?>
            <img src="userfiles/avatar/.<?php $_SESSION['user_avatar'];?>." alt="User Icon">

            </div>
            
        <div class="small-6 columns">
            <p><?=$_SESSION['first_name'];?> <?=$_SESSION['last_name'];?></p>
            <p><?=$_SESSION['user_type'];?></p>
        </div>
    </div>


<!--        start of RESULTS AREA row---------------------------------------->
      
<!--        Database call for workouts api ---------------------------------------------->

<div class="row"> 
    <div class="large-12 columns">
    <h2>Log your results for</h2>
    <form action ="wod_results.php" method="POST">
        <select class="wod_name" name ="wod_results">
                
            <?php include 'connect.php';

            $query = "SELECT * FROM workouts WHERE wod_date = CURDATE()";
            $result = mysqli_query($sql_link, $query);  ?>
            
            <?php while ($row = mysqli_fetch_assoc($result)):?>
            <option value="<?php echo $row['workout_id']?>"><?php echo $row['workout_name'];?></option>
            <?php endwhile;?>	
            
            ?>  
        </select>
        <input class="button" type="submit" name="wod_name" value="Log this Workout" />
        </div>
    </div>

    <!--display the selected workout description--------------------------------->
    <div class="row">
		      <?php if($_POST['wod_name']): ?>
                <div class="small-12 small-centered columns">
                    <div class="panel">
                    <div id="wod_results">
                <h3><?php echo "Description of Workout"?></h3>            

        <p> <?php 
                    $selected_wod =$_POST['wod_results']; 

                    $query = "SELECT * FROM workouts WHERE workout_id='".$selected_wod."'";
//                echo $query;

                //get the name and description and types of the workout from the dropdown menu
                $wod_result = mysqli_query($sql_link, $query);
                
                //get the value from the row of description query

                $wod_display = mysqli_fetch_array($wod_result);
//        var_dump($wod_display);
//                    echo $wod_display['workout_name'];
                    echo $wod_display['description'];
                    $wod_id = $wod_display['workout_id'];
                     $_SESSION['workout_id'] = $wod_id;
                ?>
    </p>
            </div>
    </div>
</div>
</div>

<div class="row">
            <div class="large-6 columns">
    <h3>What was your score for this workout?</h3>
<!--            <form name="wod_result_form" action ="wod_results.php" method="POST">-->
                <input type="text" name="workout_score">
</div>
    <div class="large-6 columns">
            <h3>How did you perform this workout?</h3>
                <input type = "radio" name="workout_level" value= "RX">RX
                <input type = "radio" name="workout_level" value= "Scaled" > Scaled
            </div>
    <div class="large-12 columns">
            <p><input class="button" type="submit" name="submit" value="Submit"></p>
        </form>
    </div>   
</div>
           	<?php endif;?>         

    
<!--      ENTERING WORKOUT RESULTS INTO DATABASE BASED ON USER-->
			
<?php if($_POST['submit']): ?>

<?php 
    include 'connect.php';


        $workout_id = mysqli_escape_string($sql_link, $_SESSION['workout_id']);
        $user_id = mysqli_escape_string($sql_link, $_SESSION['user_id']);
        $workout_score = mysqli_escape_string($sql_link, $_POST['workout_score']);
        $workout_level = mysqli_escape_string($sql_link, $_POST['workout_level']);
        
        $query = sprintf("INSERT INTO wod_results (workout_id, user_id, workout_score, workout_level) VALUES ('%s', '%s', '%s','%s')", $workout_id,  $user_id, $workout_score, $workout_level);
        
        $result = mysqli_query($sql_link, $query);

		?>
<?php
echo '<script type="text/javascript">
alert(\'Successfully Logged Workout\');
 window.location.href = "http://canespeak360crossfit.com/wod_results.php";
</script>';
exit; 
 ?>

	<?php endif;?>
   
    
    
    </body>
</html>