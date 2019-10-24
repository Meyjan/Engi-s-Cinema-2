<?php

require "SqlConnection.php";
require "SqlUtility.php";

$conn = openConnection();
$sql = "SELECT , time, seat_count FROM movie_schedule_table WHERE DATE(date) 
>= CURRENT_DATE() AND TIME(time) >= CURRENT_TIME()";
$response = mysqli_query($conn, $sql);

if (empty($response)) {
    echo ("No schedule for this movie");
} else {
    $response = mysqli_fetch_all($response);
    foreach ($response as $value) {
        $schedule_date = $value[0];
        $schedule_time = $value[1];
        $seat_count = $value[2];

        echo($schedule_date . ";");
        echo($schedule_time . ";");
        echo($seat_count . ";");
    }
}

closeConnection($conn);
?>