<?php 
include($_SERVER['DOCUMENT_ROOT'].'/header_login.php');
?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<!-- body content here -->
<body>
<!-- -------------------------------------REGISTRATION FORM------------------------- -->
    
<div class="row">
    <div class="large-8 large-centered columns">
	    <div class="large-8 large-centered columns">
        <h1>User Registration</h1>
        </div>
    <form action ="peak_registration.php" method="POST">
           <div class="large-6 columns">
               <h3>First Name</h3>
        <input type ="text" name="first"/>
        <h3>Last Name</h3>
        <input type= "text" name= "last"/>

        <h3>Email (Username)</h3>
        <input type= "text" name= "username"/>
        </div>
        <div class="large-6 columns">
        <h3>Password</h3>
        <input type= "password" name= "password"/>

        <h3>User Type</h3>
        <input type = "radio" name="user_type" value= "Athlete">Athlete
        <input type = "radio" name="user_type" value= "Coach" > Coach
        </div>
</div>
</div>
    <div class="row">
	    <div class="small-2 large-centered columns">
            <center>
            <input class="button" type= "submit" value = "Register"/>               </center>
        </div>
    </div>
    </form>
<?php
error_reporting(E_ALL);
ini_set('display_errors',0);
ini_set('log_errors',1);

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
            $Destination = '/userfiles/avatars';    
            $NewImageName= 'default.png';
            move_uploaded_file($_FILES['ImageFile']['tmp_name'], "$Destination/$NewImageName");;


        $query =sprintf("SELECT * FROM users WHERE username LIKE '%%%s%%'" , $username);
//	echo $query;
        $result = mysqli_query($sql_link, $query)or die(mysql_error());
//        var_dump($result);

        $numrows = mysqli_num_rows($result);

	       if($numrows==0) {
               //make a new user
				$insert_query = sprintf("INSERT INTO users (first_name, last_name, username, password, user_type, user_avatar) VALUES ('%s', '%s', '%s', '%s', '%s','%s')", 
				$first_name, $last_name, $username, $hash_password, $user_type, $NewImageName);
//            echo $insert_query;
               
               $result = mysqli_query($sql_link, $insert_query);
//               var_dump($result);
//               echo mysqli_error($sql_link);
//               echo mysqli_error($result);               
//               
//               echo json_encode($result);
    
            if($result){?>
    <!--   REGISTER SUCCESSFUL -->
    <div class="row">
        <div class="large-6 large-centered columns">
            <div data-alert class="alert-box success radius">
                Successful Registration
    <a href="/peak_login.php" class="close">x</a>
</div>
               <?php } else { ?>
<!--    failed to register-->
    <div class="row">
        <div class="large-6 large-centered columns">
            <div data-alert class="alert-box warning radius">
                Sorry you failed to register, please try again.
    <a href="" class="close">x</a>
</div>
      <?php          }
                } else {?>
                <!--    USERNAME OR PASSWORD ALREADY EXISTS-->
    <div class="row">
        <div class="large-6 large-centered columns">
            <div data-alert class="alert-box warning radius">
                Sorry that username or password already exists. Please try again.
    <a href="" class="close">x</a>
</div>
               <? }
?>
	<?php endif;?>
    
</body>
</html>