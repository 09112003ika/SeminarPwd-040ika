<?php
include_once("koneksi.php");

if (isset($_POST['Submit'])) {
    $email = $_POST['email'];
    $nama = $_POST['nama'];
    $institusi = $_POST['institusi'];
    $country = $_POST['country'];
    $address = $_POST['address'];

    // Mengecek apakah email sudah ada
    $check_email = mysqli_query($con, "SELECT * FROM registration WHERE email='$email' AND is_deleted = 0");
    if (mysqli_num_rows($check_email) > 0) {
        echo "Email sudah terdaftar. <a href='register.php'>Coba lagi</a>";
    } else {
        $result = mysqli_query($con, "INSERT INTO registration(email, nama, institusi, country, address) VALUES('$email', '$nama', '$institusi', '$country', '$address')");
        echo "Data berhasil disimpan. <a href='index.php'>Lihat Data</a>";
    }
    exit();
}
?>

<html>
<head>
    <title>Registrasi Seminar</title>
</head>
<body>
    <h2>Form Registrasi</h2>
    <form action="register.php" method="post">
        <label>Email:</label>
        <input type="email" name="email" required><br>
        <label>Nama:</label>
        <input type="text" name="nama" required><br>
        <label>Institusi:</label>
        <input type="text" name="institusi" required><br>
        <label>Country:</label>
        <input type="text" name="country" required><br>
        <label>Address:</label>
        <textarea name="address" required></textarea><br>
        <input type="submit" name="Submit" value="Daftar">
    </form>
</body>
</html>
