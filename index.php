<?php
session_start();
include("db.php");

if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        if(password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['role'] = $user['role'];

            echo "<script>alert('Login Successful'); window.location='dashboard.php';</script>";
        } else {
            echo "<script>alert('Wrong Password');</script>";
        }
    } else {
        echo "<script>alert('User not found');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container d-flex justify-content-center align-items-center vh-100">

        <div class="card p-4 shadow login-box">

            <h2 class="text-center mb-4">Login</h2>

            <form method="POST">

                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class="fa-solid fa-envelope"></i>
                    </span>

                    <input type="email"
                        class="form-control"
                        name="email"
                        placeholder="Email"
                        required>
                </div>

                <div class="input-group mb-3">

                    <span class="input-group-text">
                        <i class="fa-solid fa-lock"></i>
                    </span>

                    <input type="password"
                        class="form-control"
                        id="password"
                        name="password"
                        placeholder="Password"
                        required>

                    <span class="input-group-text" onclick="togglePassword()">
                        <i class="fa-solid fa-eye"></i>
                    </span>

                </div>

                <button class="btn btn-success w-100" name="login">
                    Login
                </button>

            </form>

            <p class="text-center mt-3">
                Don't have an account?
                <a href="register.php">Register</a>
            </p>

        </div>

    </div>

    <script src="script.js"></script>

</body>
</html>