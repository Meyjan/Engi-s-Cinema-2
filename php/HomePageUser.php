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

if ($cookie != -999) {
    $conn = openConnection();
    $sql = "SELECT username FROM user_table WHERE token=\"" . $cookie . "\"";
    $result = executeSql($conn, $sql);
}

echo ($result);

?>