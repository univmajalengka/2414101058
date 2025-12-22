<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: pemesanan.php');
    exit;
}

require_once 'koneksi.php';

$nama = $_POST['nama'] ?? '';
$email = $_POST['email'] ?? '';
$telepon = $_POST['telepon'] ?? '';
$destinasi = $_POST['destinasi'] ?? '';
$tanggal = $_POST['tanggal'] ?? '';
$jumlah = (int) ($_POST['jumlah_orang'] ?? 0);
$catatan = $_POST['catatan'] ?? '';

if (!$nama || !$telepon || !$destinasi || !$tanggal || $jumlah < 1) {
    header('Location: pemesanan.php?status=gagal');
    exit;
}

$stmt = $conn->prepare('INSERT INTO pesanan (nama, email, telepon, destinasi, tanggal, jumlah_orang, catatan) VALUES (?, ?, ?, ?, ?, ?, ?)');
if (!$stmt) {
    header('Location: pemesanan.php?status=gagal');
    exit;
}

$stmt->bind_param('sssssis', $nama, $email, $telepon, $destinasi, $tanggal, $jumlah, $catatan);
$ok = $stmt->execute();
$stmt->close();
$conn->close();

if ($ok) {
    header('Location: modifikasi_pesanan.php?status=sukses');
} else {
    header('Location: pemesanan.php?status=gagal');
}
exit;
