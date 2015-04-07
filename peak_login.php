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



<!-- -------------------------------------REGISTRATION FORM------------------------- -->
<div class="row">
    <div class="small-6 small-centered columns">
        <h1>User Login</h1>
        <form action="peak_login.php?attempt" method="POST">
        <input type ="text" name="username" placeholder="Username or Email"/>
        <input type ="password" name="password" placeholder="Password"/>

        <br/><input type= "submit" value = "Login"/>
        </form>
        <br>
        <p>Not a member <a href="peak_registration.php">Sign Up</a></p>
    </div>
</div>
<!--        Database call for username and password PHP ---------------------------------------------->
<?php


if ($_POST['submit']) {
    
		include 'connect.php';
    
        $username = mysqli_escape_string($sql_link, $_POST['username']);
        $password = mysqli_escape_string($sql_link, $_POST['password']);
        $hash_password = md5($password);

        $query = sprintf("SELECT * FROM users WHERE username = '%s' AND password = '%s'", $username, $hashed_password);
        echo $query;
    
        $result = mysqli_query($sql_link, $query);
		echo $result;
//if login is successful
        $rows = mysqli_num_rows($result);

				if ($rows = 0) {
					$row = mysqli_fetch_array($result, MYSQLI_NUM);
                    header ('Location: http://localhost/athlete_logged_in.php');
				}
				else {
					echo "login failed";

				};
}
		?>


</body>
</html>