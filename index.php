<?php 
include 'header.php'; // Header dengan Bootstrap 
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit;
}
?>
<div class="container mt-5">
    <h2 class="text-center">Diagnosa Penyakit</h2>
    <form method="POST" action="diagnosa.php" class="p-4 border rounded shadow-sm bg-light">
        <h5>Pilih Gejala:</h5>
        <?php
        include 'db.php'; // Koneksi ke database
        $result = $conn->query("SELECT * FROM gejala");
        while ($row = $result->fetch_assoc()) {
            echo '<div class="form-check">
                    <input class="form-check-input" type="checkbox" name="gejala[]" value="' . $row['id_gejala'] . '" id="gejala' . $row['id_gejala'] . '">
                    <label class="form-check-label" for="gejala' . $row['id_gejala'] . '">' . $row['nama_gejala'] . '</label>
                  </div>';
        }
        ?>
        <button type="submit" class="btn btn-success w-100 mt-3">Diagnosa</button>
    </form>
</div>
