<?php
    include 'connect.php';
    $workout_id = $_GET['workout'];
    $query = "SELECT first_name, last_name, wod_results.user_id, workout_name, wod_results.workout_id, workout_level, workout_score FROM wod_results
JOIN users ON wod_results.user_id = users.user_id
JOIN workouts ON wod_results.workout_id = workouts.workout_id
WHERE wod_results.workout_id = ".$workout_id."
ORDER BY workout_score DESC";

    $result = mysqli_query($sql_link, $query);
    
    $leaderboards = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $leaderboard_array[] = array("athlete" => $row['first_name'] . " " . $row['last_name'], "workout" => $row['workout_name'], "level" => $row['workout_level'], "score" => $row['workout_score']);
    $leaderboards[] = $leaderboard_array;
    }
                                     
    echo json_encode($leaderboards);
                                     
?>

