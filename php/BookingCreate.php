<?php

// Related files
require "SqlConnection.php";
require "SqlUtility.php";

// Get data from form

$scheduleId = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);
$seat = filter_input(INPUT_POST, "seat", FILTER_SANITIZE_NUMBER_INT);
$exist = filter_input(INPUT_POST, "exist", FILTER_VALIDATE_BOOLEAN);

// Check browser's cookie
$cookie = "-999";
if (isset($_COOKIE["login_cookie"])) {
    $cookie = $_COOKIE["login_cookie"];
} else {
    echo -500;
    return;
}
 
// Check the cookie in the database
$conn = openConnection();
$sql = "SELECT id FROM user_table WHERE token = \"" . $cookie . "\"";
$user_result = executeSql($conn, $sql)[0];

// Get movie id
$sql = "SELECT movie_id FROM movie_schedule_table WHERE schedule_id = "
 . $scheduleId;
$movie_result = executeSql($conn, $sql)[0];

// Added data sql
if (!$exist) {
    $sql = "INSERT INTO movie_user_table VALUES (" . $user_result . ", "
     . $movie_result . ", " . $scheduleId . ", NULL, NULL, " . $seat . ")";
} else {
    $sql = "UPDATE movie_user_table SET seat_number = " . $seat . 
    " WHERE schedule_id = " . $scheduleId . " AND user_id = " . $user_result;
}

echo($sql);
if ($conn -> query($sql) !== true) {
    echo ("\nFailed database request");
    return 400;
} else {
    echo ("\nSuccess database request");
}

?>