<?php
session_start();
include_once("koneksi.php");

// Cek apakah admin sudah login
if (!isset($_SESSION['email']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

$id = $_GET['id']; // Ambil ID dari URL
$result = mysqli_query($con, "SELECT * FROM registration WHERE id='$id'");
$user_data = mysqli_fetch_array($result);

if (isset($_POST['update'])) {
    $email = $_POST['email'];
    $nama = $_POST['nama'];
    $institusi = $_POST['institusi'];
    $country = $_POST['country'];
    $address = $_POST['address'];

    // Update data peserta
    $update = mysqli_query($con, "UPDATE registration SET email='$email', nama='$nama', institusi='$institusi', country='$country', address='$address' WHERE id='$id'");
    if ($update) {
        echo "Data berhasil diperbarui. <a href='manage_registration.php'>Kembali ke Daftar Peserta</a>";
        exit();
    } else {
        echo "Gagal memperbarui data.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Peserta</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Membuat tinggi halaman 100% dari viewport */
        }
        .container {
            background-color: #F5F5DC;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.5);
            width: 400px;
        }
        h2 {
            color: #333;
            text-align: center;
        }
        label {
            margin-top: 10px;
            display: block;
        }
        input[type="email"],
        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px 0;
            border: 1px solid #ddd;
            border-radius: 3px;
        }
        input[type="submit"] {
            background-color: #DEB887;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 50px;
            cursor: pointer;
            width: 50%;
        }
        input[type="submit"]:hover {
            background-color: #A52A2A;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Data Peserta</h2>
        <form action="edit.php?id=<?php echo $id; ?>" method="post">
            <label>Email:</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($user_data['email']); ?>" required>
            
            <label>Nama:</label>
            <input type="text" name="nama" value="<?php echo htmlspecialchars($user_data['nama']); ?>" required>
            
            <label>Institusi:</label>
            <input type="text" name="institusi" value="<?php echo htmlspecialchars($user_data['institusi']); ?>" required>
            
            <label>Negara:</label>
            <input type="text" name="country" value="<?php echo htmlspecialchars($user_data['country']); ?>" required>
            
            <label>Alamat:</label>
            <textarea name="address" required><?php echo htmlspecialchars($user_data['address']); ?></textarea>
            
            <input type="submit" name="update" value="Update">
        </form>
    </div>
</body>
</html>
