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
            <!--call the user first name from the database-->
            <div class="small-6 columns" id="user-avatar-div">
<!--    image string to work     -->
            <img src="../userfiles/avatars/<?php echo $_SESSION['user_avatar'] ?>" alt="User Icon">
            </div>
        <div class="small-6 columns">
            <p><?=$_SESSION['first_name'];?> <?=$_SESSION['last_name'];?></p>
            <p><?=$_SESSION['user_type'];?></p>
        </div>
    </div>
</div>
        
  <!--        start of update form-->  
<div class="row">
        <div class="large-12 large-centered columns" >
<form action="update-profile-after-registration.php" method="post" enctype="multipart/form-data" id="UploadForm" autocomplete="off">
<?php
    include '../connect.php';
    $username = mysqli_real_escape_string($sql_link,$_SESSION['username']);
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($sql_link,$query);
    $row = mysqli_fetch_array($result);
?>
    <div class="row">
        <div class="large-6 columns">
            <h3>First Name</h3>
            <input type="text" class="form-control" placeholder="<?php echo $row['first_name'];?>" name="first_name" value="<?php echo $row['first_name'];?>" required>
        </div>
        <div class="large-6 large-centerd columns">
            <h3>Last Name</h3>
            <input type="text" class="form-control"  placeholder="<?php echo $row['last_name'];?>" name="last_name" value="<?php echo $row['last_name'];?>" required>
        </div>        
    </div>    
    <div class="row">
        <div class="large-6 large-centerd columns">
            <h3>Password</h3>
            <input type="password" class="form-control" placeholder="<?php echo $row['password'];?>" name="password" value="<?php echo $row['password'];?>" required>
        </div>
        <div class="large-6 large-centerd columns">
            <h3>Email</h3>
            <input type="text" class="form-control" placeholder="<?php echo $row['username'];?>" name="username" value="<?php echo $row['username'];?>" required>
        </div>
    </div> 
        <div class="row">
    <div class="large-6 large-centerd columns">
            <h3>Avatar</h3>
            <center><input name="ImageFile"  class="btn btn-primary ladda-button" data-style="zoom-in"  type="file"/></center>
            </div>  
    </div> 
                
    <div class="submit">           
        <center>
            <button class="btn btn-primary ladda-button" data-style="zoom-in" type="submit"  id="SubmitButton" value="Upload" />Save Your Profile</button>
        </center>
    </div>
</form>
    </body>
</html>