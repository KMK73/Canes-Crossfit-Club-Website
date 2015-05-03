<?php
include 'connect.php';

if(!empty($_POST['username']) && !empty($_POST['password'])) {
	$username =$_POST['username'];
	$password =$_POST['password'];

//    //connect to database in mysql
//	$con = new mysqli("localhost", "peak_360", "admin", "peak_360") or die(mysqli_error());

    $query = "SELECT * FROM users WHERE username='".$username."' AND password='".md5($password)."'";
//     $query = "SELECT * FROM users WHERE username='".$username."' AND password='".$password."'";   

    $result = mysqli_query($sql_link, $query);

    //get a row value of only 1 to know the user is in the database 
	$numrows = mysqli_num_rows($result);
    //get the array keys to make the first name, last name, and type variables
    $row = mysqli_fetch_array($result);
//    $user_type = $row['user_type'];
    
    $user_info = array();
    
    if($numrows!= 0) {
        $user_info['response'] = 'success';
        $user_info['username'] = $username;
        $user_info['first_name'] = $row['first_name'];
        $user_info['last_name'] = $row['last_name'];
        $user_info['user_type'] = $row['user_type'];
        $user_info['user_id'] = $row['user_id'];       
    }
    else if ($numrows = null) {
	       $user_info['response'] = "All fields are required!";
    }     
    else  {
        $user_info['response'] = "Invalid username or password!";   
    }
    
    echo json_encode($user_info);
}   
else {
    echo "Invalid Login";  //if it doesnt login at all  
}


?>