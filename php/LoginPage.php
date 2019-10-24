<?php

// Related files
require "SqlConnection.php";
require "SqlUtility.php";


// Processing data from javascript
$target_dir = $_SERVER['DOCUMENT_ROOT'] . "/data/photos/";

$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);

// SQL Connection
$conn = openConnection();

// Initiating variable
$validLogin = true;


// Checking input errors
/* Check email and password error */
$sql = "SELECT username FROM user_table WHERE email=\"" . $email . "\"";
if (checkDataExists($conn, $sql)) {
    $sql2 = "SELECT password FROM user_table WHERE email=\"" . $email . "\"";
    $password_hash = executeSql($conn, $sql2);
    if (!password_verify($password, $password_hash)) {
        $validLogin = false;
    }
} else {
    $validLogin = false;
}

// Executing login
if ($validLogin) {
    $cookie_name = "login_cookie";
    $cookie_value = "I'm a weeb " . $email;

    setcookie($cookie_name, $cookie_value, time() + 3600, '/');
    $result = 200;
    
    if (isset($_COOKIE["login_cookie"])) {
        $sql = "UPDATE user_table SET token=\"" . $_COOKIE["login_cookie"] . 
        "\" WHERE email=\"" . $email . "\"";
        if ($conn -> query($sql) !== true) {
            $result = 500;
        }
    }    
} else {
    $result = 401;
}
echo ($result);

?>