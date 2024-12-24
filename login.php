<?php
session_start();
include "db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_user = mysqli_real_escape_string($conn, $_POST['nama_user']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Query ke tabel user
    $query = "SELECT * FROM user WHERE nama_user = '$nama_user'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        // Verifikasi password
        if (password_verify($password, $row['password'])) {
            // Simpan informasi pengguna ke sesi
            $_SESSION['id'] = $row['id'];
            $_SESSION['nama_user'] = $row['nama_user'];
            $_SESSION['nama_kucing'] = $row['nama_kucing'];

            // Redirect ke home
            header('Location: home.php');
            exit;
        } else {
            $error = "Password salah.";
        }
    } else {
        $error = "Nama pengguna tidak ditemukan.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .login-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .login-header {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-container">
            <h2 class="login-header">Login</h2>
            <?php if (!empty($error)) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="nama_user" class="form-label">Nama Pengguna</label>
                    <input type="text" id="nama_user" name="nama_user" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
            <div class="mt-3 text-center">
                <p>Belum punya akun? <a href="daftar.php">Daftar di sini</a></p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
