<?php
session_start();
include_once("koneksi.php");

// Cek apakah admin sudah login
if (!isset($_SESSION['email']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_query($con, "UPDATE registration SET is_deleted = 1 WHERE id='$id'");
    header("Location: manage_registration.php");
}
?>
