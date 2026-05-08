<?php
session_start();
include 'db.php';

if (!isset($_SESSION['admin'])) {
    header("Location: index.php");
}

/* TOTAL USERS */
$totalUsers = mysqli_num_rows(
    mysqli_query($conn, "SELECT * FROM users")
);

/* SENIORS */
$totalSeniors = mysqli_num_rows(
    mysqli_query($conn,
    "SELECT * FROM users WHERE role='Senior'")
);

/* CAREGIVERS */
$totalCaregivers = mysqli_num_rows(
    mysqli_query($conn,
    "SELECT * FROM users WHERE role='Caregiver'")
);

/* VOLUNTEERS */
$totalVolunteers = mysqli_num_rows(
    mysqli_query($conn,
    "SELECT * FROM users WHERE role='Volunteer'")
);

/* APPROVED */
$totalApproved = mysqli_num_rows(
    mysqli_query($conn,
    "SELECT * FROM users WHERE status='Approved'")
);

/* PENDING */
$totalPending = mysqli_num_rows(
    mysqli_query($conn,
    "SELECT * FROM users WHERE status='Pending'")
);
?>

<!DOCTYPE html>
<html>
<head>

    <title>Admin Dashboard</title>

    <meta charset="UTF-8">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body style="background:#F5F7FA;">

<!-- NAVBAR -->
<nav class="navbar navbar-dark bg-dark px-4">

    <span class="navbar-brand fw-bold">
        Elder Care Admin
    </span>

    <div>

        <a href="users.php" class="btn btn-light me-2">
            Manage Users
        </a>

        <a href="logout.php" class="btn btn-danger">
            Logout
        </a>

    </div>

</nav>

<!-- MAIN CONTENT -->
<div class="container mt-5">

    <h1 class="mb-4 fw-bold">
        Dashboard Overview 📊
    </h1>

    <div class="row g-4">

        <!-- TOTAL USERS -->
        <div class="col-md-4">
            <div class="card shadow border-0 rounded-4 p-4">

                <h5>Total Users</h5>

                <h1 class="fw-bold text-primary">
                    <?php echo $totalUsers; ?>
                </h1>

            </div>
        </div>

        <!-- SENIORS -->
        <div class="col-md-4">
            <div class="card shadow border-0 rounded-4 p-4">

                <h5>Seniors</h5>

                <h1 class="fw-bold text-success">
                    <?php echo $totalSeniors; ?>
                </h1>

            </div>
        </div>

        <!-- CAREGIVERS -->
        <div class="col-md-4">
            <div class="card shadow border-0 rounded-4 p-4">

                <h5>Caregivers</h5>

                <h1 class="fw-bold text-danger">
                    <?php echo $totalCaregivers; ?>
                </h1>

            </div>
        </div>

        <!-- VOLUNTEERS -->
        <div class="col-md-4">
            <div class="card shadow border-0 rounded-4 p-4">

                <h5>Volunteers</h5>

                <h1 class="fw-bold text-warning">
                    <?php echo $totalVolunteers; ?>
                </h1>

            </div>
        </div>

        <!-- APPROVED -->
        <div class="col-md-4">
            <div class="card shadow border-0 rounded-4 p-4">

                <h5>Approved Users</h5>

                <h1 class="fw-bold text-success">
                    <?php echo $totalApproved; ?>
                </h1>

            </div>
        </div>

        <!-- PENDING -->
        <div class="col-md-4">
            <div class="card shadow border-0 rounded-4 p-4">

                <h5>Pending Users</h5>

                <h1 class="fw-bold text-secondary">
                    <?php echo $totalPending; ?>
                </h1>

            </div>
        </div>

    </div>

</div>

</body>
</html>