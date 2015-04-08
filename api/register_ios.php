<?php
include 'connect.php';
include 'MySQLDatabaseObject.php';

$first = $_POST['first_name'];
$last = $_POST['last_name'];
$username = $_POST['username'];
$password = $_POST['password'];
$password = md5($passwod); //secure password hashing
$confirm_password = $_POST['c_password'];

$query = sprintf("INSERT INTO users (first_name, last_name, username, password) VALUES ('%s','%s','%s','%s')", $first, $last, $username, $password);

$result = mysqli_query($sql_link, $query);

echo json_encode($result);

?>
