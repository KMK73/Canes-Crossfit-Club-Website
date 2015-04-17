<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

ob_start();


if(isset($_POST["submit"])){
if(!empty($_POST['username']) && !empty($_POST['password'])) {
	$username =$_POST['username'];
	$password =$_POST['password'];
    //connect to database in mysql
	$con = new mysqli("localhost", "peak_360", "admin", "peak_360") or die(mysqli_error());
    
    $query = "SELECT * FROM users WHERE username='".$username."' AND password='".md5($password)."'";
    echo $query;
    $result = mysqli_query($con, $query);
    echo mysqli_error($sql_link);
//    echo $query;
    var_dump($result);
    
    //get a row value of only 1 to know the user is in the database 
	$numrows=mysqli_num_rows($result);
    //get the array keys to make the first name, last name, and type variables
    $row = mysqli_fetch_array($result);
    $user_type = $row['user_type'];
    if($numrows!= 0) {
        session_start();
        //creating a login variable for logout function
        $_SESSION['sess_user'] = $username;
        //creating session variables for user displayed info
        $_SESSION['first_name'] = $row['first_name'];
        $_SESSION['last_name'] = $row['last_name'];
        $_SESSION['user_type'] = $row['user_type'];
        $_SESSION['user_id'] = $row['user_id'];       
    }
    else if ($numrows = null) {
	   echo "All fields are required!";
    }     
    else  {
        echo "Invalid username or password!";   
    }
    if ($row['user_type'] == "Athlete") {
  
            /* Redirect browser */
            header("Location: /athlete/member_athlete.php");     
        } 
        else {
            //redirect for the coaches page
            header("Location: /home_coach.php");        
        }
}
}
ob_end_flush();
?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/header_login.php');?>
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


<div class="row">
    <div class="small-8 small-centered large-6 large-centered columns">      
        <img src="images/ucrossfit_logo.png" alt="Gym Logo">
      </div>
</div>
        
<div class="row">
    <div class="small-8 small-centered large-6 large-centered columns">
    <h3>Login Form</h3>
        <form action="/peak_login.php" method="POST">
        Username: <input type="text" name="username"><br />
        Password: <input type="password" name="password"><br />	
        <input class="button" type="submit" value="Login" name="submit" />
        </form>
   </div> 
        </div>

<div class="row">
        <div class="small-8 small-centered large-6 large-centered columns">
            <p>Not a member? <a href="/peak_registration.php">Register</a></p>     
        </div>
    </div>
            
    </body>
</html>