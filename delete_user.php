<?php
session_start();
include("db.php");

if(!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM users WHERE id='$id'");

echo "<script>alert('User Deleted Successfully'); window.location='dashboard.php';</script>";
?>