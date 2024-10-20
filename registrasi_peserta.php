<?php
session_start();
include_once("koneksi.php");

if (isset($_POST['register'])) {
    $email = $_POST['email'];
    $nama = $_POST['nama'];
    $institusi = $_POST['institusi'];
    $country = $_POST['country'];
    $address = $_POST['address'];

    // Cek apakah email sudah terdaftar
    $check_email = mysqli_query($con, "SELECT * FROM registration WHERE email='$email'");
    if (mysqli_num_rows($check_email) > 0) {
        $error_message = "Email sudah terdaftar!";
    } else {
        // Menambahkan data peserta baru
        $insert = mysqli_query($con, "INSERT INTO registration(email, nama, institusi, country, address, is_deleted) 
                                      VALUES('$email', '$nama', '$institusi', '$country', '$address', 0)");
        if ($insert) {
            // Redirect ke index.php setelah registrasi berhasil
            header("Location: index.php");
            exit();
        } else {
            $error_message = "Gagal menambahkan peserta.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Peserta Seminar</title>
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
            background: rgba(255, 255, 255, 0.8); 
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
            border-radius: 50px;
            cursor: pointer;
            width: 48%; /* Ukuran lebar tombol */
        }
        input[type="submit"]:hover {
            background: #A52A2A;
        }
        .cancel-button {
            display: inline-block;
            background: #DEB887;
            color: white;
            padding: 10px;
            border-radius: 50px;
            text-align: center;
            text-decoration: none;
            width: 48%; /* Ukuran lebar tombol */
            transition: background 0.3s;
        }
        .cancel-button:hover {
            background: #A52A2A;
        }
        .button-group {
            display: flex;
            justify-content: space-between; /* Memisahkan tombol */
            margin-top: 10px; /* Menambahkan jarak atas */
        }
        .message {
            margin: 10px 0;
            padding: 10px;
            background-color: #e0ffe0;
            color: #3c763d;
            border: 1px solid #d6e9c6;
            border-radius: 4px;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Registrasi Peserta Seminar</h2> 
        <?php if (isset($success_message)) { ?>
            <div class="message"><?php echo $success_message; ?></div>
        <?php } ?>
        
        <?php if (isset($error_message)) { ?>
            <div class="message error"><?php echo $error_message; ?></div>
        <?php } ?>

        <form action="registrasi_peserta.php" method="post">
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
            <div class="button-group">
                <input type="submit" name="register" value="Daftar">
                <a href="index.php" class="cancel-button">Batal</a>
            </div>
        </form>
    </div>

</body>
</html>
