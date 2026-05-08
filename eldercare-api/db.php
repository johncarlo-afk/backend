<?php
$conn = new mysqli("localhost", "root", "", "eldercare_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>