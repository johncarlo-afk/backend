<?php

include 'db.php';

$user_id = $_POST['user_id'];

if(isset($_FILES['image'])) {

    $image = $_FILES['image']['name'];

    $tmp_name = $_FILES['image']['tmp_name'];

    // UNIQUE FILE NAME
    $new_name = time() . "_" . $image;

    // SAVE LOCATION
    $path = "uploads/" . $new_name;

    move_uploaded_file($tmp_name, $path);

    // FULL IMAGE URL
    $image_url = "http://192.168.0.216/eldercare-api/" . $path;

    // SAVE TO DATABASE
    mysqli_query($conn,
    "UPDATE users SET image='$image_url'
     WHERE id='$user_id'");

    echo json_encode([
        "status" => "success",
        "image" => $image_url
    ]);

} else {

    echo json_encode([
        "status" => "error"
    ]);
}
?>