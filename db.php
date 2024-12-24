<?php
// Konfigurasi database
$host = "localhost";
$user = "root";
$password = "";
$database = "sistem_pakar_db";

// Koneksi ke database
$conn = new mysqli($host, $user, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
