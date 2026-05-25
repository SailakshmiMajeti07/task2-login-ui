<?php
session_start();
include("db.php");

if(!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM users WHERE id='$id'");
$user = mysqli_fetch_assoc($result);

if(isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    mysqli_query($conn, "UPDATE users SET 
        name='$name',
        email='$email',
        role='$role'
        WHERE id='$id'");

    echo "<script>alert('User Updated Successfully'); window.location='dashboard.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background:#f5f5f5;">
<div class="container mt-5">

    <div class="card p-4 shadow">
        <h2>Edit User</h2>

        <form method="POST">

            <input type="text" name="name"
                value="<?php echo $user['name']; ?>"
                class="form-control mb-3" required>

            <input type="email" name="email"
                value="<?php echo $user['email']; ?>"
                class="form-control mb-3" required>

            <select name="role" class="form-control mb-3">
                <option <?php if($user['role']=="User") echo "selected"; ?>>User</option>
                <option <?php if($user['role']=="Admin") echo "selected"; ?>>Admin</option>
            </select>

            <button type="submit" name="update" class="btn btn-warning">
                Update User
            </button>

        </form>

    </div>

</div>
</body>
</html>