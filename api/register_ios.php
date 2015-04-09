<?php
include 'connect.php';
include 'MySQLDatabaseObject.php';
//connect to database in mysql
$sql_link = new mysqli("localhost", "peak_360", "admin", "peak_360") or die(mysqli_error());

$first = $_POST['first_name'];
$last = $_POST['last_name'];
$username = $_POST['username'];
$password = $_POST['password'];
$password = md5($passwod); //secure password hashing
$confirm_password = $_POST['c_password'];
$user_type = $_POST['user_type'];

$query = sprintf("INSERT INTO users (first_name, last_name, username, password, user_type) VALUES ('%s','%s','%s','%s','%s')", $first, $last, $username, $password, $user_type);

$result = mysqli_query($sql_link, $query);

echo json_encode($result);

?>
