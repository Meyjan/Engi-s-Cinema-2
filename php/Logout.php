<?php

$response = 200;

if (isset($_COOKIE["login_cookie"])) {
    setcookie("login_cookie", "", time() - 3600, '/');
} else {
    $response = 500;
}

echo ($response);

?>