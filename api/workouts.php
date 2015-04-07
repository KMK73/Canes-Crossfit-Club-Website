<?php
		include 'connect.php';

		$query = "SELECT * FROM workouts";

		$result = mysqli_query($sql_link, $query);        

		$workouts = array();

		while ($row = mysqli_fetch_assoc($result)) {
 
 			$workout = array("id" => $row['workout_id'], "name" => $row['workout_name'], "description" => $row['description'],"workout" => $row['wod_type'], "date" => $row['wod_date'] );
			$workouts[] = $workout;
		}
		echo json_encode($workouts);
?>