<?php

// Related files
require "SqlConnection.php";
require "SqlUtility.php";


// Processing data from javascript
$target_dir = $_SERVER['DOCUMENT_ROOT'] . "/data/photos/";
$errorList = array();

$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
$confirmpass = filter_input(INPUT_POST, "confirm_password", FILTER_SANITIZE_STRING);
$phone = filter_input(INPUT_POST, "phone", FILTER_SANITIZE_NUMBER_INT);


// SQL Connection
$conn = openConnection();


// Checking input errors
/* Check username error */
if (!preg_match("/^[A-Za-z0-9_]*$/", $username)) {
    array_push($errorList, ["username", "Username not valid. Can only contains letters, numbers, and underscores"]);
}

$sql = "SELECT * FROM user_table WHERE username=\"" . $username . "\"";
if (checkDataExists($conn, $sql)) {
    array_push($errorList, ["username", "Username already exists in the database. Insert a new one"]);
}

/* Check email error */
$sql = "SELECT * FROM user_table WHERE email=\"" . $email . "\"";
if (checkDataExists($conn, $sql)) {
    array_push($errorList, ["email", "Email already exists in the database. Insert a new one"]);
}

/* Check password error */
if (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,15}$/", $password)) {
    array_push($errorList, ["password", "Password should be alphanumeric ranging between 8 to 15."]);
}

/* Check confirm password error */
if (strcmp($password, $confirmpass)) {
    array_push($errorList, ["confirmpassword", "Password doesn't match with confirm password"]);
}

/* Check phone error */
if (!preg_match("/^[0-9]{7,9}$/", $phone)) {
    array_push($errorList, ["phone", "Phone number can only contain digits with length 7 - 9"]);
}
$sql = "SELECT * FROM user_table WHERE phone_number=\"" . $phone . "\"";
if (checkDataExists($conn, $sql)) {
    array_push($errorList, ["phone", "Phone number already exists in the database. Insert a new one"]);
}

$photo = null;
/* Check photo error */
if ($_FILES['photo']['name'] != "") {
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["photo"]["tmp_name"]);
    if ($check === false) {
        array_push($errorList, ["photo", "File is not a photo"]);
    } else if (file_exists($target_file)) {
        array_push($errorList, ["photo", "Cannot add photo with the same name. File already exists"]);
    } else if ($_FILES["photo"]["size"] > 200000) {
        array_push($errorList, ["photo", "Photo size is larger than 200kB, make smaller ones. "]);
    }
    $photo = $target_file;
} else {
    array_push($errorList, ["photo", "No photos of user. Please insert one"]);
}


/* Executing register */
if (empty($errorList)) {
    // Password hashing
    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    $sql = "INSERT INTO user_table (username, email, phone_number, 
    password, profile_pic) VALUES (\"" . 
    $username . "\", \"" . $email . "\", \"" . $phone . 
    "\", \"" . $password_hash . "\", \"" . $photo . "\")";
            
    if ($conn -> query($sql) !== true) {
        array_push($errorList, ["username", "Failure in database connection"]);
    }

    move_uploaded_file($_FILES['photo']['tmp_name'], $photo);

    // Setting cookie
    $cookie_name = "login_cookie";
    $cookie_value = "I'm a weeb " . $email;

    setcookie($cookie_name, $cookie_value, time() + 3600, '/');

    if (isset($_COOKIE["login_cookie"])) {
        $sql = "UPDATE user_table SET token=\"" . $_COOKIE["login_cookie"] . 
        "\"WHERE email=\"" . $email . "\"";
        if ($conn -> query($sql) !== true) {
            array_push($errorList, ["photo", "Failure in saving cookie in database"]);
        }
    } else {
        array_push($errorList, ["photo", "Failure in cookie creation"]);
    }
    
}

closeConnection($conn);

foreach ($errorList as $error) {
    echo $error[0] . ";" . $error[1] . ";;";
}

?>