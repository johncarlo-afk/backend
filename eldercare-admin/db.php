<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "eldercare_db";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Connection failed");
}

?>