<?php

require "SqlConnection.php";
require "SqlUtility.php";

$searchValue = null;

if (isset($_GET["search"])) {
    $searchValue = "%" . $_GET["search"] . "%";

    $conn = openConnection();

    $sql = "SELECT id, title, photo_link, summary, (SELECT ROUND(AVG(rating), 2) 
    FROM movie_user_table WHERE movie_user_table.movie_id = movie_table.id) 
    as rating FROM movie_table WHERE (title LIKE \"" . $searchValue . "\")";
     
    $response =  mysqli_query($conn, $sql);

    if (!empty($response)) {
        $result = array();

        while ($r = mysqli_fetch_assoc($response)) {
            $result[] = $r;
        }

        echo (json_encode($result));
    }
}

?>