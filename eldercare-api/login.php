<?php

include 'db.php';

$data = json_decode(file_get_contents("php://input"), true);

$email = $data['email'];
$password = $data['password'];

$sql = "SELECT * FROM users 
        WHERE email='$email' 
        AND password='$password'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

    $user = mysqli_fetch_assoc($result);

    // ✅ CHECK STATUS
    if ($user['status'] != 'Approved') {

        echo json_encode([
            "status" => "pending",
            "message" => "Account waiting for admin approval"
        ]);

        exit();
    }

    // ✅ LOGIN SUCCESS
    echo json_encode([
        "status" => "success",
        "user" => $user
    ]);

} else {

    echo json_encode([
        "status" => "error",
        "message" => "Invalid credentials"
    ]);
}
?>