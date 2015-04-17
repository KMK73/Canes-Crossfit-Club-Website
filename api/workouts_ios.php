<?php
		include 'connect.php';

		$query = "SELECT * FROM workouts order by workout_id desc";

		$result = mysqli_query($sql_link, $query);        

		$workout_data = array();

		while ($row = mysqli_fetch_assoc($result)) {
            
            $id = $row['workout_id'];
            $name = $row['workout_name'];
            $type = $row['wod_type'];
            $description = $row['description'];
            $date = $row['wod_date'];
            
            
 			$workout_data[] = array(
                "id" => $id,
                "Name" => $name, 
                "Type" => $type,
                "description" => $description,
                "Date" => $date);
        }

		echo json_encode($workout_data);
?>

<!--
$data = array();
while ($row = mysql_fetch_array($result)) {     
    $id = $row['id'];
    $title = $row['title'];
    $content = $row['content'];

    $data[] = array("id" => $id,
        "title" => $title,
        "success" => true
    );
}
echo json_encode($data);-->
