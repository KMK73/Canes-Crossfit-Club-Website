<?php
		include 'connect.php';

		$query = "SELECT * FROM workouts";

		$result = mysqli_query($sql_link, $query);        

		$workouts = array();

		while ($row = mysqli_fetch_assoc($result)) {
 
 			$workout_data = array(
                "Workout id" => $row['workout_id'],
                "Workout Name" => $row['workout_name'], 
                "WOD Type" => $row['wod_type'], 
                "description" => $row['rep_description'],
                "Date" => $row['wod_date'] );
            $workouts[] = $workout_data;
        }
		echo json_encode($workouts);
?>