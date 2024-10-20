<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilihan Masuk</title>
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
            text-align: center;
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-bottom: 20px;
        }
        a {
            display: inline-block;
            margin: 10px 0;
            padding: 10px 20px;
            text-decoration: none;
            color: white;
            background-color: #DEB887;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        a:hover {
            background-color: #A52A2A;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Silakan Pilih:</h2>
        <a href="registrasi_peserta.php">Peserta Seminar</a><br>
        <a href="login_admin.php">Admin</a>
    </div>
</body>
</html>
