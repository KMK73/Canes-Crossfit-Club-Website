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
<!--        start of RESULTS AREA row---------------------------------------->
      
<!--        Database call for workouts api ---------------------------------------------->

<div class="row">    
    <h2>Log your results for</h2>
        <select class="wod_name" name ="daily_wod">
                
            <?php include 'connect.php';
				
            $query = "SELECT * FROM workouts WHERE wod_date = CURDATE()";
            $result = mysqli_query($sql_link, $query);?>

            <?php while ($row = mysqli_fetch_assoc($result)):?>
            <option value="<?php echo $row['id']?>"><?php echo $row['workout_name'];?></option>
            <?php $selectOption = $_POST['daily_wod'];?>
            
            <?php endwhile;?>	
            
            <?php
                $option = isset($_POST['daily_wod']) ? $_POST['daily_wod'] : false;
                    
                if($option) {
                    echo htmlentities($_POST['daily_wod'], ENT_QUOTES, "UTF-8");
                } else {
                    echo "task option is required";
                exit; 
                }
            ?>  
        </select>
    
    <div class="small-12 small-centered columns">
            <div id="wod_display" >
                <h3>Description of Workout</h3>
 <!--display the selected workout description--------------------------------->               

    <!--display the selected workout description--------------------------------->
            <script>   
            var selectValue = document.getElementById('daily_wod').text(); 
            var selectOption = $("#daily_wod option[value=" + selectValue + "]").text(); 
                
            </script>
                
        </div>
    </div>
    
    <h3>What was your score for this workout?</h3>
            <form>
                <input type="radio">Total Time<input type="time" name="total_time"></br>
                <input type="radio" name="not_timed">Not Timed</br>
                <input type="radio">Rounds Completed<input type="number" name="rounds"></br>
                <input type="radio">Reps Completed<input type="number" name="reps">
            </form>

            <h3>How did you perform this workout?</h3>
                <form>
                    <input type="radio" name="scaled">Scaled
                    <input type="radio" name="rx">RX
                </form>

            <h3>When did you perform this workout?</h3>
                <select>
                    <option>6:15am</option>
                    <option>9:00am</option>            
                    <option>4:00pm</option>
                    <option>5:00pm</option>
                    <option>6:00pm</option>
                    <option>7:00pm</option>
                    <option>8:00pm</option>
                </select>
            <p><input type="submit" value="Submit"></p>
    </div>
    
    
    
    
    </body>
</html>
