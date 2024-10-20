<?php
session_start();
include_once("koneksi.php");

// Cek apakah admin sudah login
if (!isset($_SESSION['email']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

if (isset($_POST['add'])) {
    $email = $_POST['email'];
    $nama = $_POST['nama'];
    $institusi = $_POST['institusi'];
    $country = $_POST['country'];
    $address = $_POST['address'];

    // Cek apakah email sudah terdaftar
    $check_email = mysqli_query($con, "SELECT * FROM registration WHERE email='$email'");
    if (mysqli_num_rows($check_email) > 0) {
        echo "<script>alert('Email sudah terdaftar!');</script>";
    } else {
        // Menambahkan data peserta baru
        $insert = mysqli_query($con, "INSERT INTO registration(email, nama, institusi, country, address, is_deleted) 
                                      VALUES('$email', '$nama', '$institusi', '$country', '$address', 0)");
        if ($insert) {
            echo "<script>alert('Peserta berhasil ditambahkan.'); window.location.href='manage_registration.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan peserta.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Peserta</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('bg.jpg.avif'); 
            background-size: cover; 
            background-position: center; 
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; 
        }
        form {
        background: rgba(255, 255, 255, 0.8); 
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3); 
        width: 355px;
        }
        .container {
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1);
            width: 400px; 
            display: flex;
            flex-direction: column; 
            align-items: center;
        }
        h2 {
            color: #333;
            text-align: center;
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input[type="email"],
        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #D2691E;
            border-radius: 20px;
        }

        input[type="submit"] {
            background: #DEB887;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 20px; 
            cursor: pointer;
            width: 50%;
            transition: background 0.3s;
        }

input[type="submit"]:hover {
    background: #A52A2A;
}

    </style>
</head>
<body>
    <div class="container">
        <h2>Tambah Peserta Baru</h2>
        <form action="tambah.php" method="post">
            <label>Email:</label>
            <input type="email" name="email" required>
            <label>Nama:</label>
            <input type="text" name="nama" required>
            <label>Institusi:</label>
            <input type="text" name="institusi" required>
            <label>Negara:</label>
            <input type="text" name="country" required>
            <label>Alamat:</label>
            <textarea name="address" required></textarea>
            <input type="submit" name="add" value="Tambah Peserta">
        </form>
    </div>
</body>
</html>
