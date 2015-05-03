<?php
		include 'connect.php';

		$query = "SELECT * FROM workouts";

		$result = mysqli_query($sql_link, $query);        

		$workouts = array();

		while ($row = mysqli_fetch_assoc($result)) {
 
 			$workout = array("name" => $row['workout_name'], "description" => $row['description']);
			$workouts[] = $workout;
		}
		echo json_encode($workouts);
?>