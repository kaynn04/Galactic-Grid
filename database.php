<?php

$hostName = "localhost";
$dbUser = "id21873365_login_register";
$dbPassword = "1aA!1234";
$dbName = "id21873365_login_register";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Something went wrong;");
}

?>