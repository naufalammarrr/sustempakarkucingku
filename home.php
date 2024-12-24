<?php 

include 'header.php'; // Header dengan Bootstrap 
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit;
}

$nama_user = $_SESSION['nama_user'];
$nama_kucing = $_SESSION['nama_kucing'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pakar Diagnosa Penyakit Kucing</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(to right, #C9D6FF, #E2E2E2);
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="jumbotron">
            <h1 class="display-4">Selamat Datang, <?= htmlspecialchars($nama_user) ?>!</h1>
            <p class="lead">Sistem pakar ini membantu Anda mendiagnosa penyakit yang dialami oleh kucing berdasarkan
                gejala-gejala yang ditampilkan.</p>
            <hr class="my-4">
            <p><strong>Nama Kucing Anda:</strong> <?= htmlspecialchars($nama_kucing) ?></p>
            <p>Silakan melakukan diagnosa dengan mengklik tombol di bawah ini.</p>
            <a class="btn btn-primary btn-lg" href="index.php" role="button">Mulai Diagnosa</a>
        </div>
    </div>

    <footer class="footer bg-dark text-light">
        <div class="container py-4">
            <div class="row">
                <div class="col-md-6">
                    <h5>About Us</h5>
                    <p>Sistem pakar ini membantu Anda mendiagnosa penyakit yang dialami oleh anjing berdasarkan
                        gejala-gejala yang ditampilkan.</p>
                </div>
                <div class="col-md-6">
                    <h5>Contact Us</h5>
                    <ul class="list-unstyled">
                        <li>Alamat: Wonosobo, Jawa Tengah</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="bg-dark text-center py-3">
            <p class="mb-0">© 2024 Sistem Pakar Dempster Shaffer. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>