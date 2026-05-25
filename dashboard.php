<?php
session_start();
include("db.php");

if(!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$users = mysqli_query($conn, "SELECT * FROM users");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background:#f5f5f5;">

<div class="container mt-5">

    <div class="card p-4 shadow">

        <h2>Welcome, <?php echo $_SESSION['name']; ?> 🎉</h2>
        <p>Role: <?php echo $_SESSION['role']; ?></p>

        <a href="add_user.php" class="btn btn-success mb-3">Add User</a>
        <a href="profile.php" class="btn btn-primary mb-3">Profile</a>
        <a href="logout.php" class="btn btn-danger mb-3">Logout</a>

        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>

            <?php while($row = mysqli_fetch_assoc($users)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['role']; ?></td>
                <td>
                    <a href="edit_user.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="delete_user.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
            <?php } ?>

        </table>

    </div>

</div>

</body>
</html>