<?php
include "db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_user = mysqli_real_escape_string($conn, $_POST['nama_user']);
    $nama_kucing = mysqli_real_escape_string($conn, $_POST['nama_kucing']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO user (nama_user, nama_kucing, alamat, password) VALUES ('$nama_user', '$nama_kucing', '$alamat', '$password')";
    if (mysqli_query($conn, $query)) {
        echo "<p style='color:white;'>Pendaftaran berhasil, silahkan Login</p>";
    } else {
        echo "<p style='color:red;'>Pendaftaran gagal: " . mysqli_error($conn) . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg,rgb(110, 155, 238),rgb(4, 14, 36));
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        div {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            border: none;
            background:rgb(63, 102, 209);
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }
        button:hover {
            background:rgb(101, 152, 246);
        }
        p {
            text-align: center;
            margin-top: 20px;
        }
        p a {
            color:rgb(21, 32, 177);
            text-decoration: none;
            font-weight: bold;
        }
        p a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <h2>Daftar</h2>
        <div>
            <label for="nama_user">Nama Pengguna:</label>
            <input type="text" id="nama_user" name="nama_user" required>
        </div>
        <div>
            <label for="nama_kucing">Nama Kucing:</label>
            <input type="text" id="nama_kucing" name="nama_kucing" required>
        </div>
        <div>
            <label for="alamat">Alamat:</label>
            <input type="text" id="alamat" name="alamat" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Daftar</button>
        <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
    </form>
</body>
</html>
