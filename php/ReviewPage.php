<?php

require "SqlConnection.php";
require "SqlUtility.php";

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

$rating = filter_input(INPUT_POST, "rating", FILTER_SANITIZE_NUMBER_INT);
$review = filter_input(INPUT_POST, "review", FILTER_SANITIZE_STRING);
$reviewAct = filter_input(INPUT_POST, "reAction", FILTER_SANITIZE_STRING);
$scheduleId = filter_input(INPUT_POST, "scheduleId", FILTER_SANITIZE_NUMBER_INT);

$sql = "UPDATE movie_user_table SET rating = " . $rating . ",
 review = \"" . $review . "\" WHERE user_id = " . $user_result . " 
 AND schedule_id = " . $scheduleId;


if ($conn -> query($sql) !== true) {
    echo 500;
    return;
} else {
    echo 200;
}
?>