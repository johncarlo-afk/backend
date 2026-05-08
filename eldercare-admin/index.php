<?php
session_start();
include 'db.php';

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM admins 
              WHERE username='$username' 
              AND password='$password'";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {

        $_SESSION['admin'] = $username;

        header("Location: dashboard.php");

    } else {
        $error = "Invalid credentials";
    }
}
?>

<!DOCTYPE html>
<html>
<head>

    <title>Admin Login</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body style="background:#F5F7FA;">

<div class="container">

    <div class="row justify-content-center align-items-center vh-100">

        <div class="col-md-4">

            <div class="card shadow p-4 border-0 rounded-4">

                <h2 class="text-center mb-4">
                    Elder Care Admin
                </h2>

                <?php if(isset($error)) { ?>
                    <div class="alert alert-danger">
                        <?php echo $error; ?>
                    </div>
                <?php } ?>

                <form method="POST">

                    <input 
                        type="text"
                        name="username"
                        class="form-control mb-3"
                        placeholder="Username"
                        required
                    >

                    <input 
                        type="password"
                        name="password"
                        class="form-control mb-3"
                        placeholder="Password"
                        required
                    >

                    <button 
                        type="submit"
                        name="login"
                        class="btn btn-primary w-100"
                    >
                        Login
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

</body>
</html>