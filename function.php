<?php
include 'db.php';

// Tambah gejala
function tambahGejala($nama_gejala) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO gejala (nama_gejala) VALUES (?)");
    $stmt->bind_param("s", $nama_gejala);
    return $stmt->execute();
}

// Tambah penyakit
function tambahPenyakit($nama_penyakit) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO penyakit (nama_penyakit) VALUES (?)");
    $stmt->bind_param("s", $nama_penyakit);
    return $stmt->execute();
}

// Tambah aturan
function tambahAturan($id_penyakit, $id_gejala, $belief) {
    global $conn;
    $plausibility = 1 - $belief;
    $stmt = $conn->prepare("INSERT INTO aturan (id_penyakit, id_gejala, belief, plausibility) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iidd", $id_penyakit, $id_gejala, $belief, $plausibility);
    return $stmt->execute();
}

function registrasi($data)
{
    global $conn;
    $nama_user = strtolower(stripcslashes($data["nama_user"]));
    $nama_kucing = strtolower(stripcslashes($data["nama_kucing"]));
    $alamat = strtolower(stripcslashes($data["alamat"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    //cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT nama_user FROM user WHERE nama_user = '$nama_user'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>alert('Terimakasih username anda sudah terdaftar');</script>";
        return false;
    }

    //cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>alert('konfirmasi password tidak sesuai');</script>";
        return false;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //tambahkan userbaru ke database
    mysqli_query($conn, "INSERT INTO user(nama_user, nama_kucing, alamat, password) VALUES('$nama_user', '$nama_kucing', '$alamat', '$password')");

    return mysqli_affected_rows($conn);
}
?>
