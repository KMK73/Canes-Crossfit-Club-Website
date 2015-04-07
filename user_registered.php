<?php
		if ($mysqli->connect_errno) {
	    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}
		?>
			
		<?php if($_POST): ?>

<?php 
		include 'connect.php';

				$first_name = mysqli_escape_string($sql_link, $_POST['first']);
				$last_name = mysqli_escape_string($sql_link, $_POST['last']);
				$username = mysqli_escape_string($sql_link, $_POST['username']);
				$password = mysqli_escape_string($sql_link, $_POST['password']);
                $hash_password = md5($password);
				$user_type = mysqli_escape_string($sql_link, $_POST['user_type']);


				$query = sprintf("INSERT INTO users (first_name, last_name, username, password, user_type) VALUES ('%s', '%s', '%s', '%s', '%s')", 
				$first_name, $last_name, $username, $hash_password, $user_type);

				$result = mysqli_query($sql_link, $query);
				echo $query;
		?>

    <?php else:?>

	<h1>No User Provided</h1>

	<?php endif;?>

