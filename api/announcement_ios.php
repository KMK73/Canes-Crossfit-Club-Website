<?php
    include 'connect.php';

    $query = "select * from announcements";
//    echo $query;
    $result = mysqli_query($sql_link, $query);
//    var_dump($result);

    $announcement_array = array();

    while ($row = mysqli_fetch_assoc($result)) {
            
//        $link = mysqli_escape_string($sql_link, $row['link']);
//        echo $link;
//        
        $announcement_array[] = array("id" => $row['announcement_id'], "Title" => $row['announcement_name'], "Link" => $row['/"link/"'], "Description" => $row['description']);
    }
                                     
    echo json_encode($announcement_array);
                                     
?>

