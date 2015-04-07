<?php
include 'connect.php';
include 'MySQLDatabaseObject.php';

$username = $_POST['username'];
$password = $_POST['password'];
$securePassword = md5($password); //secure password hashing

$returnValue = array();

if(empty($email) || empty($password))
{
$returnValue["status"] = "error";
$returnValue["message"] = "Missing required field";
echo json_encode($returnValue);
return;
}

$query = sprintf("SELECT id,username FROM users WHERE  (username, password) VALUES ('%s','%s')", $username, $password);

$result = mysqli_query($sql_link, $query);

echo json_encode($result);
?>


<!--from blog post------------------------>
<?php


$dao = new MySQLDao();
$dao->openConnection(); //$sql_link
$userDetails = getUserDetailsWithPassword($email,$secure_password);

//from dao file----------------------------------------- 
public function getUserDetailsWithPassword($username, $userPassword)
{
$returnValue = array();
$result = "select id,username from users where username='" . $username . "' and password='" .$password . "'";

//$result = $this->conn->query($sql);
if ($result != null && (mysqli_num_rows($result) >= 1)) {
$row = $result->fetch_array(MYSQLI_ASSOC);
if (!empty($row)) {
$returnValue = $row;
}
}
return $returnValue;
}




if(!empty($userDetails))
{
$returnValue["status"] = "Success";
$returnValue["message"] = "User is registered";
echo json_encode($returnValue);
} else {

$returnValue["status"] = "error";
$returnValue["message"] = "User is not found";
echo json_encode($returnValue);
}

$dao->closeConnection();

?>