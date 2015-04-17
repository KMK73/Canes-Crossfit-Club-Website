<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
?>
   <?php
		include 'connect.php';
		$query = "SELECT * FROM workouts";

		$result = mysqli_query($sql_link, $query);        
        $workouts = array();

		while ($row = mysqli_fetch_assoc($result)) {
            $workouts[] = array(
                "id" => $row['workout_id'],
                "name" => utf8_encode($row['workout_name']), 
                "Type" => $row['wod_type'], 
                "Date" => $row['wod_date'],
            "Description" => utf8_encode($row['description'])
            );
        }
        $json = json_encode($workouts);
        echo $json;
?>