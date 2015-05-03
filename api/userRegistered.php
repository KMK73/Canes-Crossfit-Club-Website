<?php
require("connect.php");
require("MySQLDatabaseObject.php");

$first_name = htmlentities($_POST["first_name"]);
$last_name = htmlentities($_POST["last_name"]);
$username = htmlentities($_POST["username"]);
$password = htmlentities($_POST["password"]);

//$first_name = mysqli_escape_string($sql_link, $_POST['first_name']);
//$last_name = mysqli_escape_string($sql_link, $_POST['last_name']);
//$username = mysqli_escape_string($sql_link, $_POST['username']);
//$password = mysqli_escape_string($sql_link, $_POST['password']);

$returnValue = array();

if(empty($username) || empty($password))
{
$returnValue["status"] = "error";
$returnValue["message"] = "Missing required field";
echo json_encode($returnValue);
return;
}

$dao = new MySQLDatabaseObject();
$dao->openConnection();
$userDetails = $dao->getUserDetails($username);

if(!empty($userDetails))
{
$returnValue["status"] = "error";
$returnValue["message"] = "User already exists";
echo json_encode($returnValue);
return;
}

$secure_password = md5($password); // I do this, so that user password cannot be read even by me

$result = $dao->registerUser($email,$secure_password);

if($result)
{
$returnValue["status"] = "Success";
$returnValue["message"] = "User is registered";
echo json_encode($returnValue);
return;
}

$dao->closeConnection();

?>