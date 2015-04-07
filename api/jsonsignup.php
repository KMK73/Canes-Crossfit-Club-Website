<?php
/* --------------------------- */
/*  Author : Dipin Krishna     */
/*  Website: dipinkrishna.com  */
/* --------------------------- */
include 'connect.php';

header('Content-type: application/json');
if($_POST) {
    
    $first = $_POST['first_name'];
    $last = $_POST['last_name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
	$c_password = $_POST['c_password'];
//    $password = md5($passwod); //secure password hashing

//$query = sprintf("INSERT INTO users (first_name, last_name, username, password) VALUES ('%s','%s','%s','%s')", $first, $last, $username, $password);
//
//$result = mysqli_query($sql_link, $query);
//
//echo json_encode($result);

	if($_POST['username']) {
		if ( $password == $c_password ) {

			$db_name     = 'peak_360';
			$db_user     = 'peak_360';
			$db_password = 'admin';
			$server_url  = 'localhost';

            $mysqli = new mysqli("localhost", "peak_360", "admin", "peak_360");

			/* check connection */
			if (mysqli_connect_errno()) {
				error_log("Connect failed: " . mysqli_connect_error());
				echo '{"success":0,"error_message":"' . mysqli_connect_error() . '"}';
			} else {
				

                $query = mysqli->prepare("INSERT INTO users (first_name, last_name, username, password) VALUES (?, ?, ?, ?)"
                $password = md5($password);
                $result = mysqli_query($sql_link, $query);
                
				$query->bind_param('ssss', $first, $last, $username, $password);

				/* execute prepared statement */
				$query->execute();

				if ($query->error) {error_log("Error: " . $stmt->error); }

				$success = $query->affected_rows;

				/* close statement and connection */
				$query->close();

				/* close connection */
				$mysqli->close();
				error_log("Success: $success");

				if ($success > 0) {
					error_log("User '$username' created.");
					echo '{"success":1}';
				} else {
					echo '{"success":0,"error_message":"Username Exist."}';
				}
			}
		} else {
			echo '{"success":0,"error_message":"Passwords does not match."}';
		}
	} else {
		echo '{"success":0,"error_message":"Invalid Username."}';
	}
}else {
	echo '{"success":0,"error_message":"Invalid Data."}';
}
?>
