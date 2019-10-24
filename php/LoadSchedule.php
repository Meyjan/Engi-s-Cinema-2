<?php

require "SqlConnection.php";
require "SqlUtility.php";

$idValue = null;

if (isset($_GET["id"])) {
    $idValue = $_GET["id"];

    $conn = openConnection();
    $sql = "SELECT schedule_id, date, time, (30 - COUNT(seat_number)) AS seat_count
            FROM movie_schedule_table JOIN movie_user_table USING (schedule_id)
            WHERE movie_schedule_table.movie_id = " . $idValue . " 
            GROUP BY schedule_id ORDER BY date";
    $response = mysqli_query($conn, $sql);

    $result = array();

    while ($r = mysqli_fetch_assoc($response)) {
        $result[] = $r;
    }

    $sql = "SELECT schedule_id, date, time, 30 AS seat_count
            FROM movie_schedule_table
            WHERE movie_schedule_table.movie_id = " . $idValue . " 
            AND movie_schedule_table.schedule_id NOT IN 
            (SELECT schedule_id FROM movie_user_table)
            GROUP BY schedule_id ORDER BY date";
    $response = mysqli_query($conn, $sql);

    while ($r = mysqli_fetch_assoc($response)) {
        $result[] = $r;
    }

    echo (json_encode($result));
}
?>