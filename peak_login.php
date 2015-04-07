<?php
ob_start();
if(isset($_POST["submit"])){

if(!empty($_POST['username']) && !empty($_POST['password'])) {
	$username =$_POST['username'];
	$password =$_POST['password'];

    //connect to database in mysql
	$con = new mysqli("localhost", "peak_360", "admin", "peak_360") or die(mysqli_error());

    $query = "SELECT * FROM users WHERE username='".$username."' AND password='".md5($password)."'";
	
    $result = mysqli_query($con, $query);
//    echo $query;
    var_dump($result);
    
	$numrows=mysqli_num_rows($result);
	
    if($numrows!=0) {
session_start();
	   $_SESSION['sess_user']=$username;

        /* Redirect browser */
        header("Location: athlete/member_athlete.php");     
    }
    else {
        echo "Invalid username or password!";   
    }

    } else {
	   echo "All fields are required!";
    }
}
ob_end_flush();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Peak 360 Crossfit</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<!--         <link rel="stylesheet" href="css/normalize.min.css"> -->
        <link rel="stylesheet" href="css/main.css">

<!--         // <script src="js/vendor/modernizr-2.6.2.min.js"></script> -->

    </head>
    <body>
        <script src="js/main.js"></script>

<!-- -------------------------------------NAVIGATION------------------------- -->
<?php include 'header_athlete.php' ;?>

<div class="row">

<p><a href="/peak_registration.php">Register</a> | <a href="/login_test.php">Login</a></p>
<h3>Login Form</h3>
<form action="/peak_login.php" method="POST">
Username: <input type="text" name="username"><br />
Password: <input type="password" name="password"><br />	
<input type="submit" value="Login" name="submit" />
</form>
   </div> 
        
</body>
</html>