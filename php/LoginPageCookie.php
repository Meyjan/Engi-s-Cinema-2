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
$conn = openConnection();
$sql = "SELECT * FROM user_table WHERE token=\"" . $cookie . "\"";
$result = 0;
if (checkDataExists($conn, $sql)) {
    $result = 200;
} else {
    $result = 401;
}
echo ($result);

?>