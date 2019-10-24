<?php

// Related files
require "SqlConnection.php";
require "SqlUtility.php";

// Get schedule ID
if (isset($_GET["id"])) {
    $scheduleId = $_GET["id"];
} else {
    echo -500;
    return;
}


$conn = openConnection();
$sql = "SELECT movie_table.title FROM movie_table join 
movie_schedule_table on (movie_table.id = movie_schedule_table.movie_id) 
WHERE movie_schedule_table.schedule_id = " . $scheduleId;
$response =  mysqli_query($conn, $sql);

echo(mysqli_fetch_assoc($response)["title"]);

?>