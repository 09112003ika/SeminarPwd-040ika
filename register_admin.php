<?php
session_start();
include_once("koneksi.php");

if (isset($_POST['register'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $admin_code = $_POST['admin_code']; 

    if ($password !== $confirm_password) {
        $error_message = "Konfirmasi password tidak cocok!";
    } else {
        // Meng-hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Cek apakah email sudah terdaftar
        $check_email = mysqli_query($con, "SELECT * FROM users WHERE email='$email'");
        if (mysqli_num_rows($check_email) > 0) {
            $error_message = "Email sudah terdaftar!";
        } else {
            // Menambahkan admin baru
            $insert = mysqli_query($con, "INSERT INTO users(email, password, role) VALUES('$email', '$hashed_password', 'admin')");
            if ($insert) {
                // Redirect ke halaman login setelah berhasil registrasi
                header("Location: login_admin.php");
                exit();
            } else {
                $error_message = "Gagal membuat akun admin.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Admin</title>
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
            background: #F5F5DC;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1);
            width: 300px; 
            display: flex;
            flex-direction: column; 
            align-items: center;
            box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            background: rgba(255, 255, 255, 0.8); 
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3); 
            width: 400px; 
        }
        form {
        background: rgba(255, 255, 255, 0.8); 
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3); 
        width: 355px;
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
        input[type="password"],
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #D2691E;
            border-radius: 20px;
            align-items: center;
            justify-content: center;
        }
        input[type="submit"] {
            background: #DEB887;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 50px;
            cursor: pointer;
            width: 45%;
            
        }
        input[type="submit"]:hover {
            background: #A52A2A;
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
            background-color: #DEB887;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Registrasi Admin</h2>
        
        <?php if (isset($error_message)) { ?>
            <div class="message error"><?php echo $error_message; ?></div>
        <?php } ?>

        <form action="register_admin.php" method="post">
            <label>Email:</label>
            <input type="email" name="email" required>
            <label>Password:</label>
            <input type="password" name="password" required>
            <label>Konfirmasi Password:</label>
            <input type="password" name="confirm_password" required>
            <label>Kode Admin:</label>
            <input type="text" name="admin_code" required> 
            <input type="submit" name="register" value="Registrasi">
        </form>
    </div>
</body>
</html>
