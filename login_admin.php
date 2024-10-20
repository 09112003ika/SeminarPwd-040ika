<?php
session_start();
include_once("koneksi.php");

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Cek apakah admin dengan email ini ada di database
    $result = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND role='admin'");
    $user_data = mysqli_fetch_assoc($result);

    // Verifikasi password
    if ($user_data && password_verify($password, $user_data['password'])) {
        $_SESSION['email'] = $user_data['email'];
        $_SESSION['role'] = $user_data['role'];

        header("Location: manage_registration.php");
        exit();
    } else {
        $error_message = "Email atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
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
        width: 320px;
}
        .container {
            background: #F5F5DC;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            background: rgba(255, 255, 255, 0.8); 
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3); 
            width: 350px; 
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
        input[type="password"] {
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
            width: 50%;
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
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login Admin</h2>
        
        <?php if (isset($error_message)) { ?>
            <div class="message error"><?php echo $error_message; ?></div>
        <?php } ?>

        <form action="login_admin.php" method="post">
            <label>Email:</label>
            <input type="email" name="email" required>
            <label>Password:</label>
            <input type="password" name="password" required>
            <input type="submit" name="login" value="Login">
        </form>

        <p>Jika Anda belum memiliki akun admin, silakan <a href="register_admin.php">registrasi di sini</a>.</p>
    </div>
</body>
</html>
