<?php

// Related files
require "SqlConnection.php";
require "SqlUtility.php";

$scheduleId = -1;

// Get schedule ID
if (isset($_GET["id"])) {
    $scheduleId = $_GET["id"];
} else {
    echo -500;
    return;
}

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

// Delete review
$sql = "UPDATE movie_user_table SET rating = NULL, review = NULL WHERE 
schedule_id = " . $scheduleId . " AND user_id = " . $user_result;

echo($sql);

if ($conn -> query($sql) !== true) {
    echo 500;
    return;
} else {
    echo 200;
}

?>