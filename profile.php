<?php
session_start();
include("db.php");

if(!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$id = $_SESSION['user_id'];

if(isset($_POST['upload'])) {

    $filename = $_FILES['profile_pic']['name'];
    $tempname = $_FILES['profile_pic']['tmp_name'];

    move_uploaded_file($tempname, "uploads/".$filename);

    mysqli_query($conn, "UPDATE users SET profile_pic='$filename' WHERE id='$id'");

    echo "<script>alert('Profile Picture Uploaded');</script>";
}

$result = mysqli_query($conn, "SELECT * FROM users WHERE id='$id'");
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background:#f5f5f5;">

<div class="container mt-5">

    <div class="card p-4 shadow text-center">

        <h2>My Profile</h2>

        <?php if($user['profile_pic']) { ?>
            <img src="uploads/<?php echo $user['profile_pic']; ?>"
                 width="150"
                 height="150"
                 style="border-radius:50%;">
        <?php } ?>

        <form method="POST" enctype="multipart/form-data" class="mt-4">

            <input type="file" name="profile_pic" class="form-control mb-3" required>

            <button type="submit" name="upload" class="btn btn-primary">
                Upload Picture
            </button>

        </form>

        <br>

        <a href="dashboard.php" class="btn btn-success">
            Back to Dashboard
        </a>

    </div>

</div>

</body>
</html>