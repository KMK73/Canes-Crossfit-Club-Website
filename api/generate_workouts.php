<?php 
    error_reporting(E_ALL);
    include 'connect.php';

    
    
    //score is random
    
    //workout level is 1 or 2

    //get user list
    
    $user_query = "SELECT user_id FROM users";
    
    $result = mysqli_query($sql_link, $user_query);
    
    $users = array();
    
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row['user_id'];
    }
var_dump($result);
    
    //get workout ids
    
    $workouts = array();
    
    $workout_query = "SELECT workout_id FROM workouts";
    $result = mysqli_query($sql_link, $workout_query);
    var_dump($result);
    while ($row = mysqli_fetch_assoc($result)) {
        $workouts[] = $row['workout_id'];
    }
  
    $number_of_results = 25;
    
    for ($i = 0; $i < $number_of_results; $i++) {
        echo "Creating Record<br>";
        $selected_user = rand(0, sizeof($users));
        $selected_workout = rand(0, sizeof($workouts));
        $workout_score = rand(2,400);
        $workout_level = "'RX'";
        $query = sprintf("INSERT INTO wod_results (workout_id, user_id, workout_score, workout_level) VALUES (%d, %d, %d, %s)", $workouts[$selected_workout], $users[$selected_user], $workout_score, $workout_level);
        echo $query;
        mysqli_query($sql_link, $query);
    }

?>