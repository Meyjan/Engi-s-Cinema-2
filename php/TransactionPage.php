<?php

// Related files
require "SqlConnection.php";
require "SqlUtility.php";

// Check browser's cookie
$cookie = "-999";
if (isset($_COOKIE["login_cookie"])) {
    $cookie = $_COOKIE["login_cookie"];
}
 
// Check the cookie in the database
$result = "-999";

$conn = openConnection();
$sql = "SELECT photo_link, title, date, time, review, temp.id FROM movie_table 
            INNER JOIN (SELECT movie_schedule_table.movie_id, date, time, review, 
            movie_schedule_table.schedule_id AS id from movie_user_table INNER JOIN 
            movie_schedule_table ON movie_schedule_table.schedule_id = 
            movie_user_table.schedule_id WHERE user_id = (SELECT id FROM user_table 
            WHERE token = \"" . $_COOKIE["login_cookie"] . "\")) AS temp 
            ON temp.movie_id = movie_table.id ORDER BY date DESC, time DESC";
$response =  mysqli_query($conn, $sql);

$list = array();

while ($r = mysqli_fetch_assoc($response)) {
    $list[] = $r;
}

$jsonlist = json_encode($list);

echo $jsonlist;

closeConnection($conn);

?>