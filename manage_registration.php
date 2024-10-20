<?php
session_start();
include_once("koneksi.php");

// Cek apakah admin sudah login
if (!isset($_SESSION['email']) || $_SESSION['role'] != 'admin') {
    header("Location: login_admin.php");
    exit();
}

// Menampilkan semua data peserta yang belum dihapus
$result = mysqli_query($con, "SELECT * FROM registration WHERE is_deleted = 0");

if (isset($_GET['delete'])) {
    $id = $_GET['id'];
    mysqli_query($con, "UPDATE registration SET is_deleted = 1 WHERE id = $id");
    header("Location: manage_registration.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Registrasi Peserta</title>
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
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #FFEBCD;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        h2 {
            color: #D2691E;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #D2691E;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .action-links a {
            margin: 0 5px;
            color: #007bff;
            text-decoration: none;
        }
        .action-links a:hover {
            text-decoration: underline;
        }
        .btn-tambah {
            display: block;
            width: 200px;
            padding: 10px;
            margin: 20px auto; 
            background-color: #DEB887;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
        }
        .btn-tambah:hover {
            background-color: #A52A2A;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Daftar Peserta</h2>
        <table>
            <tr>
                <th>Email</th>
                <th>Nama</th>
                <th>Institusi</th>
                <th>Negara</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
            <?php
            while ($data = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($data['email']) . "</td>";
                echo "<td>" . htmlspecialchars($data['nama']) . "</td>";
                echo "<td>" . htmlspecialchars($data['institusi']) . "</td>";
                echo "<td>" . htmlspecialchars($data['country']) . "</td>";
                echo "<td>" . htmlspecialchars($data['address']) . "</td>";
                echo "<td class='action-links'>
                        <a href='edit.php?id=" . $data['id'] . "'>Edit</a> | 
                        <a href='manage_registration.php?delete&id=" . $data['id'] . "' onclick=\"return confirm('Apakah Anda yakin ingin menghapus peserta ini?');\">Hapus</a>
                      </td>";
                echo "</tr>";
            }
            ?>
        </table>

        <a href="tambah.php" class="btn-tambah">Tambah Peserta Baru</a>
    </div>
</body>
</html>
