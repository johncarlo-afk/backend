<?php

include 'db.php';

// GET JSON DATA
$data = json_decode(
    file_get_contents("php://input"),
    true
);

// STORE VALUES
$name = $data['name'];
$age = $data['age'];
$bio = $data['bio'];
$location = $data['location'];
$email = $data['email'];
$password = $data['password'];
$role = $data['role'];

// INSERT USER
$sql = "INSERT INTO users
(
    name,
    age,
    bio,
    location,
    email,
    password,
    role
)

VALUES

(
    '$name',
    '$age',
    '$bio',
    '$location',
    '$email',
    '$password',
    '$role'
)";

// EXECUTE QUERY
if(mysqli_query($conn, $sql)) {

    echo json_encode([
        "status" => "success"
    ]);

} else {

    echo json_encode([
        "status" => "error",
        "message" => mysqli_error($conn)
    ]);
}
?>