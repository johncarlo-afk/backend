<?php
include 'db.php';

$id = $_GET['id'];

mysqli_query($conn,
"UPDATE users SET status='Approved' WHERE id='$id'");

header("Location: users.php");
?>