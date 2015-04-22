<?php
    session_start();
    $temp= $_SESSION['user_id'];


    ini_set("display_errors",1);

    if(isset($_POST)){
        require '../connect.php';
        $Destination = '../userfiles/avatars';
        if(!isset($_FILES['ImageFile']) || !is_uploaded_file($_FILES['ImageFile']['tmp_name'])){
            $NewImageName= 'default.png';
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
        $hash_password = md5($user_password);
        $sql3="UPDATE users SET first_name='$user_firstname',last_name='$user_lastname',username='$user_email',password='$hash_password',user_avatar='$NewImageName' WHERE user_id = '$temp'";
        
//        var_dump($_SESSION);
//        var_dump($sql3);
        $user_id = $_SESSION['user_id'];
        
        $user_query = "SELECT * FROM users WHERE user_id = '$user_id'";
//        echo $user_query;
        $result = mysqli_query($sql_link,$user_query);
//        var_dump($result);

        if( mysqli_num_rows($result) > 0) {
            mysqli_query($sql_link,$sql3)or die(mysqli_error($sql_link));
    /*
        if ($_SESSION['user_type'] == "Athlete") {
  
            header("Location: /athlete/member_athlete.php");     
        } 
        else {
            //redirect for the coaches page
            header("Location: /home_coach.php");        
        };
*/
    ?>

<!DOCTYPE html>
<html class="no-js" lang="en">
    <?php include($_SERVER['DOCUMENT_ROOT'].'/header_login.php');?>
<!-------- body content here -->
<!--        logo row ---------------------------------------->
    <div class="row">
        <div class="small-8 small-centered large-6 large-centered columns">
            <img src="/images/ucrossfit_logo.png" alt="Gym Logo">
        </div>
    </div>
 <!--       SUCCESSFUL UPDATE----------------------------------------> 
    <div class="row">
        <div class="large-12 columns">
            <h1>Successfully updated your profile information</h1>
            <button type="button" class="button"><a href="../athlete/member_athlete.php">Return to Homepage</button></a>
    </div>
        
        <?php }
        else{ ?>
<!--        logo row ---------------------------------------->
    <div class="row">
        <div class="small-8 small-centered large-6 large-centered columns">
            <img src="/images/ucrossfit_logo.png" alt="Gym Logo">
        </div>
    </div>
    <div class="row">
        <div class="large-12 columns">
            <h1>Sorry we failed to update your profile.</h1>
    </div>
        <?php }  
    }    
?>
    </body>
</html>