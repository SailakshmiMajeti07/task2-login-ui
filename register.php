<?php
include("db.php");

if(isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = "User";

    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

    if(mysqli_num_rows($check) > 0) {
        echo "<script>alert('Email already exists');</script>";
    } else {
        $sql = "INSERT INTO users(name, email, password, role) VALUES('$name','$email','$password','$role')";

        if(mysqli_query($conn, $sql)) {
            echo "<script>alert('Registration Successful'); window.location='index.php';</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container d-flex justify-content-center align-items-center vh-100">

        <div class="card p-4 shadow login-box">

            <h2 class="text-center mb-4">Register</h2>

            <form method="POST">

                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class="fa-solid fa-user"></i>
                    </span>

                    <input type="text"
                        class="form-control"
                        name="name"
                        placeholder="Full Name"
                        required>
                </div>

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

                <button class="btn btn-primary w-100" name="register">
                    Register
                </button>

            </form>

            <p class="text-center mt-3">
                Already have an account?
                <a href="index.php">Login</a>
            </p>

        </div>

    </div>

    <script src="script.js"></script>

</body>
</html>