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

<?php

if($_POST) {
	$username   = $_POST['username'];
	$password   = $_POST['password'];

	if($username && $password) {
			
            /* check connection */
			if (mysqli_connect_errno()) {
				error_log("Connect failed: " . mysqli_connect_error());
				echo '{"success":0,"error_message":"' . mysqli_connect_error() . '"}';
			} else {
				if ($stmt = $mysqli->prepare("SELECT username FROM users WHERE username = ? and password = ?")) {

					$password = md5($password);

					/* bind parameters for markers */
					$stmt->bind_param("ss", $username, $password);

					/* execute query */
					$stmt->execute();

					/* bind result variables */
					$stmt->bind_result($id);

					/* fetch value */
					$stmt->fetch();

					/* close statement */
					$stmt->close();
				}

				/* close connection */
				$mysqli->close();

				if ($id) {
					error_log("User $username: password match.");
					echo '{"success":1}';
				} else {
					error_log("User $username: password doesn't match.");
					echo '{"success":0,"error_message":"Invalid Username/Password"}';
				}
			}
	} else {
		echo '{"success":0,"error_message":"Invalid Username/Password."}';
	}
}else {
	echo '{"success":0,"error_message":"Invalid Data."}';
}
?>
