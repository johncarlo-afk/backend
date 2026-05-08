<?php
session_start();
include 'db.php';

if (!isset($_SESSION['admin'])) {
    header("Location: index.php");
}

$result = mysqli_query($conn, "SELECT * FROM users");
?>

<!DOCTYPE html>
<html>
<head>

    <title>Manage Users</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body style="background:#F5F7FA;">

<nav class="navbar navbar-dark bg-dark px-4">

    <span class="navbar-brand">
        Elder Care Admin
    </span>

    <div>
        <a href="dashboard.php" class="btn btn-light">
            Dashboard
        </a>

        <a href="logout.php" class="btn btn-danger">
            Logout
        </a>
    </div>

</nav>

<div class="container mt-5">

    <div class="card shadow border-0 rounded-4 p-4">

        <h2 class="mb-4">👥 User Management</h2>

        <table class="table table-hover align-middle">

            <thead class="table-dark">

                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>

            </thead>

            <tbody>

                <?php while($user = mysqli_fetch_assoc($result)) { ?>

                <tr>

                    <td><?php echo $user['id']; ?></td>

                    <td>
                        <img 
                            src="<?php echo $user['image']; ?>" 
                            width="50"
                            height="50"
                            style="border-radius:50%; object-fit:cover;"
                        >
                    </td>

                    <td><?php echo $user['name']; ?></td>

                    <td>
                        <span class="badge bg-primary">
                            <?php echo $user['role']; ?>
                        </span>
                    </td>

                    <td><?php echo $user['email']; ?></td>

                    <td>

                        <?php if($user['status'] == 'Approved') { ?>

                            <span class="badge bg-success">
                                Approved
                            </span>

                        <?php } else { ?>

                            <span class="badge bg-warning text-dark">
                                Pending
                            </span>

                        <?php } ?>

                    </td>

                    <td>

                        <!-- APPROVE -->
                        <a 
                            href="approve_user.php?id=<?php echo $user['id']; ?>"
                            class="btn btn-success btn-sm"
                        >
                            Approve
                        </a>

                        <!-- DELETE -->
                        <a 
                            href="delete_user.php?id=<?php echo $user['id']; ?>"
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Delete this user?')"
                        >
                            Delete
                        </a>

                    </td>

                </tr>

                <?php } ?>

            </tbody>

        </table>

    </div>

</div>

</body>
</html>