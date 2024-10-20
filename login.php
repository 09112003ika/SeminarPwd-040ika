<?php
session_start();
include_once("koneksi.php");

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Cek data user berdasarkan email
    $result = mysqli_query($con, "SELECT * FROM users WHERE email='$email'");
    $user_data = mysqli_fetch_assoc($result);

    // Verifikasi password dan role
    if ($user_data && password_verify($password, $user_data['password'])) {
        $_SESSION['email'] = $user_data['email'];
        $_SESSION['role'] = $user_data['role'];

        if ($user_data['role'] == 'admin') {
            header("Location: manage.php");
        } else {
            header("Location: index.php");
        }
        exit();
    } else {
        echo "Email atau password salah!";
    }
}
?>

<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="login.php" method="post">
        <label>Email:</label>
        <input type="email" name="email" required><br>
        <label>Password:</label>
        <input type="password" name="password" required><br>
        <input type="submit" name="login" value="Login">
    </form>
</body>
</html>
