<?php
session_start();
include("db.php");

if(!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

if(isset($_POST['add'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $sql = "INSERT INTO users(name,email,password,role)
            VALUES('$name','$email','$password','$role')";

    if(mysqli_query($conn, $sql)) {
        echo "<script>alert('User Added Successfully');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background:#f5f5f5;">
<div class="container mt-5">

    <div class="card p-4 shadow">
        <h2>Add New User</h2>

        <form method="POST">

            <input type="text" name="name" class="form-control mb-3" placeholder="Name" required>

            <input type="email" name="email" class="form-control mb-3" placeholder="Email" required>

            <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>

            <select name="role" class="form-control mb-3">
                <option>User</option>
                <option>Admin</option>
            </select>

            <button type="submit" name="add" class="btn btn-success">Add User</button>

        </form>

        <br>
        <a href="dashboard.php">Back to Dashboard</a>

    </div>

</div>
</body>
</html>