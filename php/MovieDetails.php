<?php

require "SqlConnection.php";
require "SqlUtility.php";

$idValue = null;


if (isset($_GET["id"])) {
    $idValue = $_GET["id"];

    $conn = openConnection();
    $sql = "SELECT title, photo_link, summary, genre, length, release_date
            FROM movie_table
            WHERE id =" . $idValue;
    $response = mysqli_query($conn, $sql);
    $response = mysqli_fetch_assoc($response);

    if (!empty($response)) {
        echo (json_encode($response));
    }
}

?>