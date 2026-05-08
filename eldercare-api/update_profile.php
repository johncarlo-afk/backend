<?php
include 'db.php';

$data = json_decode(file_get_contents("php://input"), true);

$id = $data['id'];
$name = $data['name'];
$role = $data['role'];
$image = $data['image'];
$bio = $data['bio'];
$age = $data['age'];
$location = $data['location'];

$sql = "UPDATE users SET 
        name='$name',
        role='$role',
        image='$image',
        bio='$bio',
        age='$age',
        location='$location'
        WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error"]);
}
?>