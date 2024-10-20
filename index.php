<?php
session_start();
include_once("koneksi.php");

// Cek apakah pengguna sudah login atau belum
if (!isset($_SESSION['email'])) {
    header("Location: cover.php"); // Arahkan ke halaman login jika belum login
    exit();
}

// Mengambil semua data peserta yang tidak dihapus
$result = mysqli_query($con, "SELECT * FROM registration WHERE is_deleted = 0");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Peserta Seminar</title>
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
            flex-direction: column; 
            height: 100vh; 
            text-align: center; 
        }
        h2 {
            color: #333;
        }
        a {
            color: #D2691E;
            text-decoration: none;
            margin-bottom: 20px;
            display: block;
            width: 200px;
            padding: 10px;
            margin: 20px auto; 
            background-color: #DEB887;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            text-align: center;
        }

        a:hover {
            text-decoration: underline;
            background-color: #A52A2A; 
            color: white; 
        }

        .container {
            width: 80%; 
            max-width: 900px; 
            background: rgba(255, 255, 255, 0.9); 
            padding: 20px; 
            border-radius: 8px; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
            margin-top: 20px; 
        }
        table {
            width: 100%; 
            border-collapse: collapse;
            margin-top: 20px;
            background: #fff;
            border-radius: 8px; 
            overflow: hidden; 
        }
        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #D2691E;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container"> 
    <h2>Daftar Peserta Seminar</h2>
    
   
        <table>
            <tr>
                <th>Email</th>
                <th>Nama</th>
                <th>Institusi</th>
                <th>Negara</th>
                <th>Alamat</th>
            </tr>
            <?php if ($_SESSION['role'] == 'admin') { ?>
            <a href="cover.php">Registrasi</a>
            <?php } ?>
            <?php
            while ($data = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($data['email']) . "</td>";
                echo "<td>" . htmlspecialchars($data['nama']) . "</td>";
                echo "<td>" . htmlspecialchars($data['institusi']) . "</td>";
                echo "<td>" . htmlspecialchars($data['country']) . "</td>";
                echo "<td>" . htmlspecialchars($data['address']) . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div> 
</body>
</html>
