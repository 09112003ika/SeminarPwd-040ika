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
            height: 100vh; 
        }
        h2 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #007BFF;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        a {
            color: #007BFF;
            text-decoration: none;
            padding: 5px 10px;
            border: 1px solid #007BFF;
            border-radius: 5px;
            transition: background-color 0.3s;
            
        }
        a:hover {
            background-color: #007BFF;
            color: white;
        }
        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Data Peserta Seminar</h2>
        <table>
            <tr>
                <th>Email</th>
                <th>Nama</th>
                <th>Institusi</th>
                <th>Negara</th>
                <th>Alamat</th>
                <th>Edit</th>
            </tr>
            <tr>
                <td><?php echo htmlspecialchars($user_data['email']); ?></td>
                <td><?php echo htmlspecialchars($user_data['nama']); ?></td>
                <td><?php echo htmlspecialchars($user_data['institusi']); ?></td>
                <td><?php echo htmlspecialchars($user_data['country']); ?></td>
                <td><?php echo htmlspecialchars($user_data['address']); ?></td>
                <td><a href="edit.php?id=<?php echo $user_data['id']; ?>">Edit</a></td>
            </tr>
        </table>
    </div>
</body>
</html>
