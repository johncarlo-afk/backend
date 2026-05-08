<?php
include 'db.php';

$data = json_decode(file_get_contents("php://input"), true);

$swiper_id = $data['swiper_id'];
$swiped_id = $data['swiped_id'];
$action = $data['action'];

// Save swipe
$conn->query("INSERT INTO swipes (swiper_id, swiped_id, action)
VALUES ($swiper_id, $swiped_id, '$action')");

// Check for match
$check = $conn->query("
SELECT * FROM swipes 
WHERE swiper_id = $swiped_id 
AND swiped_id = $swiper_id 
AND action = 'like'
");

if ($check->num_rows > 0 && $action == 'like') {
    $conn->query("INSERT INTO matches (user1_id, user2_id)
    VALUES ($swiper_id, $swiped_id)");

    echo json_encode(["match" => true]);
} else {
    echo json_encode(["match" => false]);
}
?>