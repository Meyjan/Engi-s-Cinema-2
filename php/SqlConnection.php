<?php

function openConnection() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "engima_movie";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn -> connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function closeConnection($conn) {
    $conn -> close();
}

?>