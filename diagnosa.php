<?php
include 'header.php'; // Header dengan Bootstrap
include 'db.php'; // Koneksi database

// Fungsi hitung Dempster-Shafer
function hitungDempsterShafer($gejala_terpilih) {
    global $conn;

    $query = "SELECT p.nama_penyakit, a.belief 
              FROM aturan a 
              JOIN penyakit p ON a.id_penyakit = p.id_penyakit 
              WHERE a.id_gejala IN (" . implode(',', $gejala_terpilih) . ")";
    $result = $conn->query($query);

    $penyakit_belief = [];
    while ($row = $result->fetch_assoc()) {
        if (!isset($penyakit_belief[$row['nama_penyakit']])) {
            $penyakit_belief[$row['nama_penyakit']] = $row['belief'];
        } else {
            // Kombinasi belief dengan metode Dempster-Shafer
            $penyakit_belief[$row['nama_penyakit']] *= $row['belief'];
        }
    }

    // Normalisasi hasil belief
    $total_belief = array_sum($penyakit_belief);
    foreach ($penyakit_belief as $penyakit => $belief) {
        $penyakit_belief[$penyakit] = $belief / $total_belief;
    }

    // Ambil penyakit dengan nilai belief tertinggi
    arsort($penyakit_belief);
    $penyakit_terdiagnosa = array_keys($penyakit_belief)[0];
    $belief_tertinggi = $penyakit_belief[$penyakit_terdiagnosa];

    return [$penyakit_terdiagnosa, $belief_tertinggi];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $gejala_terpilih = $_POST['gejala']; // Array ID gejala yang dipilih

    if (!empty($gejala_terpilih)) {
        list($hasil_diagnosa, $belief) = hitungDempsterShafer($gejala_terpilih);

        // Ambil solusi dari database berdasarkan penyakit hasil diagnosa
        $stmt = $conn->prepare("SELECT solusi FROM solusi WHERE id_penyakit = (SELECT id_penyakit FROM penyakit WHERE nama_penyakit = ?)");
        $stmt->bind_param('s', $hasil_diagnosa);
        $stmt->execute();
        $result = $stmt->get_result();
        $solusi = $result->fetch_assoc()['solusi'];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Diagnosa</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white text-center">
                <h2>Hasil Diagnosa</h2>
            </div>
            <div class="card-body">
                <?php if (isset($hasil_diagnosa)): ?>
                    <p><strong>Penyakit:</strong> <span class="text-danger"><?= htmlspecialchars($hasil_diagnosa) ?></span></p>
                    <p><strong>Presentase Keyakinan (Belief):</strong> <span class="text-info"><?= round($belief * 100, 2) ?>%</span></p>
                    <p><strong>Solusi:</strong></p>
                    <div class="alert alert-success" role="alert">
                        <?= nl2br(htmlspecialchars($solusi)) ?>
                    </div>
                <?php else: ?>
                    <div class="alert alert-warning" role="alert">
                        Silakan pilih gejala terlebih dahulu.
                    </div>
                <?php endif; ?>
            </div>
            <div class="card-footer text-center">
                <a href="index.php" class="btn btn-secondary">Kembali ke Halaman Utama</a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
