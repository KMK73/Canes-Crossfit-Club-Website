<?php 
include($_SERVER['DOCUMENT_ROOT'].'/header_login.php');
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


<!-- -------------------------------------REGISTRATION FORM------------------------- -->
<body>
    
<div class="row">
    <div class="small-6 small-centered columns">
	<h1>User Registration</h1>

    <form action ="peak_registration.php" method="POST">
        <h3>First Name</h3>
        <input type ="text" name="first"/>
        <h3>Last Name</h3>
        <input type= "text" name= "last"/>

        <h3>Email (Username)</h3>
        <input type= "text" name= "username"/>

        <h3>Password</h3>
        <input type= "password" name= "password"/>

        <h3>User Type</h3>
        <input type = "radio" name="user_type" value= "Athlete">Athlete
        <input type = "radio" name="user_type" value= "Coach" > Coach

        <br/><input class="button" type= "submit" value = "Register"/>
	</form>
    </div> 
</div>
<?php
		if ($mysqli->connect_errno) {
	    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}
		?>
			
		<?php if($_POST): ?>

<?php 
		include 'connect.php';

				$first_name = mysqli_escape_string($sql_link, $_POST['first']);
				$last_name = mysqli_escape_string($sql_link, $_POST['last']);
				$username = mysqli_escape_string($sql_link, $_POST['username']);
				$password = mysqli_escape_string($sql_link, $_POST['password']);
                $hash_password = md5($password);
				$user_type = mysqli_escape_string($sql_link, $_POST['user_type']);


        $query =sprintf("SELECT * FROM users WHERE username LIKE '%%%s%%'" , $username);
//	echo $query;
        $result = mysqli_query($sql_link, $query);
        
        $numrows = mysqli_num_rows($result);
  
	       if($numrows==0) {
               //make a new user
				$insert_query = sprintf("INSERT INTO users (first_name, last_name, username, password, user_type) VALUES ('%s', '%s', '%s', '%s', '%s')", 
				$first_name, $last_name, $username, $hash_password, $user_type);
            
               $result = mysqli_query($sql_link, $insert_query);
               echo json_encode($result);
    
               if($result){
	           echo "Account Successfully Created";
                } else {
                echo "Failure!";
                }

                } else {
                echo "That username already exists! Please try again with another.";
                }
?>
	<?php endif;?>
    
</body>
</html>