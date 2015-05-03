<?php
		include 'connect.php';

		$query = "SELECT * FROM pr_data";

		$result = mysqli_query($sql_link, $query);        

		$prs = array();

		while ($row = mysqli_fetch_assoc($result)) {
 
 			$pr_data = array("PR id" => $row['pr_id'],"User ID" => $row['user_id'], "Exercise Name" => $row['exercise_name'], "description" => $row['rep_description'],"Date" => $row['pr_date'] );
            $prs[] = $pr_data;
        }
		echo json_encode($prs);
?>