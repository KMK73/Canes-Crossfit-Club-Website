<?php
    session_start();
    $temp= $_SESSION['user_id'];
    echo $temp;

    ini_set("display_errors",1);
    var_dump($_REQUEST);
    if(isset($_POST)){
        require '../connect.php';
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
        
        $sql3="UPDATE users SET first_name='$user_firstname',last_name='$user_lastname',username='$user_email',password='$user_password',user_avatar='$NewImageName' WHERE user_id = '$temp'";
        
        var_dump($_SESSION);
        var_dump($sql3);
        $user_id = $_SESSION['user_id'];
        
        $user_query = "SELECT * FROM users WHERE user_id = '$user_id'";
        echo $user_query;
        $result = mysqli_query($sql_link,$user_query);
        var_dump($result);
        echo "Number of Rows Found: " .mysqli_num_rows($result);
        if( mysqli_num_rows($result) > 0) {
            mysqli_query($sql_link,$sql3)or die(mysqli_error($sql_link));
            echo "Found a user to update";
//            echo '<script type="text/javascript">
//alert(\'Success!\');
// window.location.href = "http://canespeak360crossfit.com/athlete/member_athlete.php";
//</script>';
//exit; 
        }
        else{
            echo "Didn't find user!";
//echo '<script type="text/javascript">
//alert(\'Failed Update\');
// window.location.href = "http://canespeak360crossfit.com/profile/update-profile-after-registration.php";
//</script>';
//exit; 
        }  
    }    
?>