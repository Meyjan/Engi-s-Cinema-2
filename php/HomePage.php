<?php

// Related files
require "SqlConnection.php";
require "SqlUtility.php";

// Get movie for today's date
$conn = openConnection();
$sql = "SELECT id, title, photo_link FROM movie_table join 
movie_schedule_table on (movie_table.id = movie_schedule_table.movie_id) 
WHERE DATE(date) = CURRENT_DATE()";
$response =  mysqli_query($conn, $sql);



if (empty($response)) {
    echo ("No movies at the moment");
} else {
    $response = mysqli_fetch_all($response);
    foreach ($response as $value) {
        $movie_id = $value[0];
        $movie_title = $value[1];
        $movie_photo = $value[2];

        // Count movie rating
        $sql2 = "SELECT AVG(rating) FROM movie_user_table WHERE 
        movie_id = " . $movie_id;
        $rating =  mysqli_query($conn, $sql2);
        $movie_rating = mysqli_fetch_all($rating)[0][0];

        // Add these for echo response
        echo($movie_title . ";");
        echo($movie_photo . ";");
        echo(round($movie_rating, 2) . ";;");
    }
}

closeConnection($conn);

?>