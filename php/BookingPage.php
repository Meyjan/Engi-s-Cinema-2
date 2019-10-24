<?php

// Related files
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
$result = "-999";

$conn = openConnection();
$sql = "SELECT id FROM user_table WHERE token = \"" . $cookie . "\"";

$user_result = executeSql($conn, $sql)[0];

$schedule_result = $_GET["id"];

$sql = "SELECT seat_number FROM movie_user_table WHERE (user_id = " . $user_result . " AND schedule_id = " . $schedule_result . ")";
$user_seat = mysqli_query($conn, $sql);
$user_seat = mysqli_fetch_assoc($user_seat);

if (!$user_seat) {
    $user_seat = -1;
} else {
    $user_seat = $user_seat["seat_number"];
}

echo($user_seat);
echo(";");

$sql = "SELECT seat_number FROM movie_user_table WHERE schedule_id = " . $schedule_result;
$response = mysqli_query($conn, $sql);

$all_seat = array();
if (!empty($response)) {
    while ($r = mysqli_fetch_assoc($response)) {
        $all_seat[] = $r;
    }
}

echo(json_encode($all_seat));
echo(";");

$sql = "SELECT harga, date, time FROM movie_schedule_table WHERE schedule_id = " . $schedule_result;
$response = mysqli_query($conn, $sql);
$response = mysqli_fetch_assoc($response);

echo($response["harga"]);
echo(";");
echo($response["date"] . " " . $response["time"]);
echo(";");

$sql = "SELECT title FROM movie_table WHERE id = (SELECT movie_id FROM movie_schedule_table WHERE schedule_id = " . $schedule_result . ")";
$response = mysqli_query($conn, $sql);
$response = mysqli_fetch_assoc($response);
echo($response["title"]);

?>