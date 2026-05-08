<?php

// CONNECT DATABASE
include 'db.php';

// GET JSON DATA
$data = json_decode(file_get_contents("php://input"), true);

// GET VALUES
$senior_id = $data['senior_id'];
$partner_id = $data['partner_id'];
$meeting_date = $data['meeting_date'];
$meeting_time = $data['meeting_time'];
$meeting_location = $data['meeting_location'];
$notes = $data['notes'];

// INSERT SCHEDULE
$sql = "INSERT INTO schedules (

senior_id,
partner_id,
meeting_date,
meeting_time,
meeting_location,
notes

)

VALUES (

'$senior_id',
'$partner_id',
'$meeting_date',
'$meeting_time',
'$meeting_location',
'$notes'

)";

// CHECK QUERY
if(mysqli_query($conn, $sql)) {

    echo json_encode([
        "status" => "success"
    ]);

} else {

    echo json_encode([
        "status" => "error"
    ]);
}

?>