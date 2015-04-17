<?php
    session_start();
    $temp= $_SESSION['username'];
    ini_set("display_errors",1);
    if(isset($_POST)){
        require '../connect.php';
        session_start();
        $Destination = '../userfiles/avatars';
        if(!isset($_FILES['ImageFile']) || !is_uploaded_file($_FILES['ImageFile']['tmp_name'])){
            $NewImageName= 'default.jpg';
            move_uploaded_file($_FILES['ImageFile']['tmp_name'], "$Destination/$NewImageName");
        }
        else{
            $RandomNum = rand(0, 9999999999);
            $ImageName = str_replace(' ','-',strtolower($_FILES['ImageFile']['name']));
            $ImageType = $_FILES['ImageFile']['type'];
            $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
            $ImageExt = str_replace('.','',$ImageExt);
            $ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
            $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
            move_uploaded_file($_FILES['ImageFile']['tmp_name'], "$Destination/$NewImageName");
        }
        $user_firstname=$_REQUEST['first_name'];
        $user_lastname=$_REQUEST['last_name'];
        $user_email=$_REQUEST['username'];
        $user_password=$_REQUEST['password'];
        $sql3="UPDATE users SET first_name='$user_firstname',last_name='$user_lastname',username='$user_email',password='$user_password',user_avatar='$NewImageName' WHERE username = '$temp'";
        
        $user_username = $_SESSION['username'];
        
        $sql4="INSERT INTO users (first_name,last_name,username, password, user_avatar) VALUES ('$user_firstname','$user_lastname','$user_email','$user_password','$NewImageName') WHERE user_username = $temp";
        
        $result = mysqli_query($sql_link,"SELECT * FROM users WHERE user_id = '$user_username'");
        
        if( mysqli_num_rows($result) > 0) {
            mysqli_query($sql_link,$sql3)or die(mysqli_error($sql_link));
            echo '<script type="text/javascript">
alert(\'Success!\');
 window.location.href = "http://canespeak360crossfit.com/athlete/member_athlete.php";
</script>';
exit; 
        }
        else{
            mysqli_query($sql_link,$sql3)or die(mysqli_error($sql_link));

echo '<script type="text/javascript">
alert(\'Failed Update\');
 window.location.href = "http://canespeak360crossfit.com/profile/update-profile-after-registration.php";
</script>';
exit; 
        }  
    }    
?>